<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;
use Modules\Xot\Filament\Traits\HasXotTable;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
<<<<<<< HEAD
use Filament\Forms\Concerns\InteractsWithForms;
=======
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;
>>>>>>> 2253954 (.)
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Modules\Xot\Filament\Traits\HasXotForm;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> 2253954 (.)
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Override;

/**
 * ---
 */
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{
    use HasXotForm;
    use HasXotTable;
    use NavigationLabelTrait;

    // protected static string $resource;
    protected static string $recordTitleAttribute = 'name';

    /**
     * Restituisce il gruppo di navigazione (override opzionale).
     */
    public static function getNavigationGroup(): string
    {
        return '';
    }

    /**
     * Restituisce il titolo della pagina.
     */
    public function getTitle(): string
    {
        return static::transFunc(__FUNCTION__).' - '.$this->getRecordTitle();
    }

    public function getRecordTitle(): string
    {
        $value = $this->record->{static::$recordTitleAttribute};

        return (string) $value;
    }

    /**
     * Restituisce lo schema del form per i record correlati.
     *
     * @return array<\Filament\Schemas\Components\Component>
     */
    // abstract public static function getFormSchema(): array;

    /**
     * Configura lo schema per i record correlati.
     */
    public function schema(Schema $schema): Schema
    {
        // getFormSchema() sempre ritorna array per definizione
        $formSchema = $this->getFormSchema();

        return $schema->components($formSchema);
    }

    /**
     * Restituisce lo schema del form per i record correlati.
     *
     * @return array<Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

    /**
     * Restituisce l'heading della tabella.
     * Override esplicito per compatibilità con Filament 5.2 (Htmlable|string|null).
     */
    protected function getTableHeading(): \Illuminate\Contracts\Support\Htmlable|string|null
    {
        return $this->getTableHeadingFromTrait();
    }

    /**
     * Chiamata interna per getTableHeading (evita ricorsione con HasXotTable).
     */
    private function getTableHeadingFromTrait(): ?string
    {
        $key = static::getKeyTrans('table.heading');
        $trans = trans($key);

        return is_string($trans) && $trans !== $key ? $trans : null;
    }

    /**
     * Definisce le colonne della tabella per la visualizzazione dei record correlati.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, TextColumn>
     */
    #[Override]
    protected function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->label('ID')->sortable(),
            'name' => TextColumn::make('name')
                ->label('Nome')
                ->searchable()
                ->sortable(),
            'created_at' => TextColumn::make('created_at')
                ->label('Data Creazione')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /**
     * Definisce le azioni dell'intestazione della tabella.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, Action>
     */
    protected function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make()->label('Crea Nuovo')->disableCreateAnother(),
        ];
    }

<<<<<<< HEAD
    public static function getNavigationLabel(): string
=======
    /**
     * Definisce le azioni per ogni riga della tabella.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, Action>
     */
    protected function getTableActions(): array
>>>>>>> 2253954 (.)
    {
        return static::transFunc(__FUNCTION__);
    }
}
