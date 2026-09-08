<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Actions\Action;
<<<<<<< HEAD
use Filament\Resources\Pages\ListRecords as FilamentListRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\Xot\Actions\ModelClass\UpdateCountAction;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Traits\HasXotTable;
=======
use Filament\Actions\ActionGroup;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords as FilamentListRecords;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\XotBaseResource;
>>>>>>> c7fd73eb (.)
use Webmozart\Assert\Assert;

/**
 * Base class for list records pages.
 *
<<<<<<< HEAD
 * @property ?string $model
 * @property ?string $resource
 * @property ?string $slug
 * @property TableLayoutEnum $layoutView
 */
abstract class XotBaseListRecords extends FilamentListRecords
{
    use HasXotTable;

    /*
     * Get the table columns.
     *
     * @return array<string, Tables\Columns\Column>
     *
     * abstract public function getTableColumns(): array;
     */

    /**
     * Get the default sort column and direction.
     *
     * @return array{id: 'desc'|'asc'}
     */
    protected function getDefaultSort(): array
    {
        return ['id' => 'desc'];
    }

    /**
     * Get the header actions.
     *
     * @return array<string, Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            // \Filament\Actions\CreateAction::make(),
            // ExportXlsAction::make('export_xls'),
        ];
=======
 * La tabella NON si configura qui: la costruisce `XotBaseResource::table()` attraverso
 * `getTableClass()`, cioe' la `*Table` class della Resource. Per questo la pagina non usa
 * `HasXotTable` — un hook `getTableColumns()` scritto su una list page risolverebbe allo
 * stub deprecato di Filament e la tabella resterebbe vuota, senza errori ne' log.
 *
 * Guardie: `tests/Unit/ListPageHasTableClassTest.php` (ogni list page risolve la sua Table
 * class) e `tests/Unit/Filament/TableHooksDeclaredByUsTest.php` (nessun hook risolve allo
 * stub Filament). Regola: `laravel/docs/wiki/rules/xot-table-method-names.md`.
 *
 * @property ?string $model
 * @property ?string $resource
 * @property ?string $slug
 */
abstract class XotBaseListRecords extends FilamentListRecords
{
    /**
     * @param  array<string, bool|float|int|string|null>  $params
     */
    public static function trans(string $key, array $params = []): string
    {
        $resourceClass = static::getResource();

        return $resourceClass::trans($key, false, $params);
>>>>>>> c7fd73eb (.)
    }

    /**
     * Get the resource class name.
     *
<<<<<<< HEAD
     * @return class-string
=======
     * @return class-string<XotBaseResource>
>>>>>>> c7fd73eb (.)
     */
    public static function getResource(): string
    {
        $resource = Str::of(static::class)->before('\\Pages\\')->toString();
        Assert::classExists($resource);
<<<<<<< HEAD
=======
        Assert::subclassOf($resource, XotBaseResource::class);
>>>>>>> c7fd73eb (.)

        return $resource;
    }

<<<<<<< HEAD
    /**
     * Paginate the table query.
     */
    protected function paginateTableQuery(Builder $query): Paginator
    {
        $paginator = $query->fastPaginate(
            'all' === $this->getTableRecordsPerPage() ? $query->count() : $this->getTableRecordsPerPage(),
        );
        $count = $paginator->total();
        $modelClass = $this->getModel();
        //dddx($modelClass);
        app(UpdateCountAction::class)->execute($modelClass, $count);
        return $paginator;
=======
    public static function getModelClass(): string
    {
        $resource = static::getResource();
        $model = $resource::getModel();
        return $model;
    }

    /**
     * Get the header actions.
     *
     * @return array<string, Action|ActionGroup>
     */
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make()->icon('heroicon-o-plus'),
        ];
>>>>>>> c7fd73eb (.)
    }
}
