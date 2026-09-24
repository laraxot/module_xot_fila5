<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Lang\Actions\TransArrayAction;
use Modules\Xot\Actions\GetTransKeyAction;

/**
 * Exporter Filament 5 che riusa il contratto `getXlsFields()` dei Resource.
 *
 * Stesso formato misto di `CollectionExport`: chiave intera => percorso `data_get`
 * (label = traduzione via `transKey`), chiave stringa => percorso con valore =
 * intestazione esplicita non tradotta (es. `title` del rating).
 *
 * Percorso dei filtri:
 * - al dispatch `getColumns()` (statico) legge `tableFilters` dal componente
 *   Livewire corrente (`app('livewire')->current()`);
 * - nel job di export `getCachedColumns()` (istanza) legge gli stessi filtri da
 *   `$options['tableFilters']`, serializzati da `XotBaseExportAction` — il job
 *   non ha un componente Livewire attivo.
 *
 * I nomi colonna non possono contenere `.` (romperebbe il `columnMap` via
 * `data_get` in `CanExportRecords`): i punti del percorso diventano `_` e lo
 * stato viene risolto con `data_get($record, $percorso)`.
 */
abstract class XotBaseExporter extends Exporter
{
    /**
     * @return array<int, ExportColumn>
     */
    #[\Override]
    public static function getColumns(): array
    {
        $livewire = app('livewire')->current();

        if (! $livewire instanceof ListRecords) {
            return [];
        }

        return static::resolveColumns(
            $livewire->getResource(),
            $livewire->tableFilters ?? [],
        );
    }

    /**
     * Nel job: ricostruisce le colonne dagli `options` serializzati.
     *
     * @return array<ExportColumn>
     */
    #[\Override]
    public function getCachedColumns(): array
    {
        if (! isset($this->cachedColumns)) {
            $resource = Arr::get($this->options, 'resource');
            $resource = \is_string($resource) && class_exists($resource) ? $resource : null;
            $filters = Arr::get($this->options, 'tableFilters', []);
            /** @var array<string, mixed> $filters */

            $this->cachedColumns = [];
            foreach (static::resolveColumns($resource, \is_array($filters) ? $filters : []) as $column) {
                $this->cachedColumns[$column->getName()] = $column->exporter($this);
            }
        }

        return $this->cachedColumns;
    }

    /**
     * @param  class-string|null  $resource
     * @param  array<array-key, mixed>  $filters
     * @return array<int, ExportColumn>
     */
    protected static function resolveColumns(?string $resource, array $filters): array
    {
        if ($resource === null || ! method_exists($resource, 'getXlsFields')) {
            return [];
        }

        /** @var array<int|string, string> $fields */
        $fields = $resource::getXlsFields($filters);

        $transKey = app(GetTransKeyAction::class)->execute($resource).'.fields';

        $columns = [];
        foreach ($fields as $key => $value) {
            $path = \is_string($key) ? $key : $value;
            $label = \is_string($key)
                ? $value
                : app(TransArrayAction::class)->execute([$path], $transKey)[0] ?? $path;

            $columns[] = ExportColumn::make(static::columnName($path))
                ->label($label)
                ->state(static fn (Model $record): mixed => data_get($record, $path))
                ->preventFormulaInjection();
        }

        return $columns;
    }

    /**
     * Il modello arriva dal Resource della pagina corrente, non da `static::$model`:
     * lo stesso exporter serve tutte le liste scheda (Dip/Po/Dirigente/...).
     *
     * @return class-string<Model>
     */
    #[\Override]
    public static function getModel(): string
    {
        $livewire = app('livewire')->current();

        if ($livewire instanceof ListRecords) {
            /** @var class-string<Model> */
            return $livewire->getResource()::getModel();
        }

        /** @var class-string<Model> */
        return parent::getModel();
    }

    /**
     * `data_get` sul columnMap usa `.` come separatore: il nome colonna non puo'
     * contenerlo. Il percorso reale resta nella closure `state`.
     */
    protected static function columnName(string $path): string
    {
        return (string) Str::of($path)->replace('.', '_');
    }
}
