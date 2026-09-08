<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\XotBaseResource\Pages;

<<<<<<< HEAD
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Component;
use Override;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Webmozart\Assert\Assert;
=======
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\HasRelationshipModelClass;
use Modules\Xot\Filament\Traits\HasXotTable;
use Override;
>>>>>>> c7fd73eb (.)

/**
 * Classe base per la gestione delle relazioni nelle risorse Filament.
 * Estende la classe ManageRelatedRecords di Filament e fornisce funzionalità aggiuntive
 * specifiche per il framework Laraxot.
 *
 * @template TModel of Model
 */
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{
<<<<<<< HEAD
    use HasXotTable;
    use InteractsWithForms;
    use NavigationLabelTrait;

=======
    use HasRelationshipModelClass;
    use HasXotTable {
        HasRelationshipModelClass::getModelClass insteadof HasXotTable;
    }
    use InteractsWithForms;
>>>>>>> c7fd73eb (.)
    // protected static string $resource;

    /**
     * Restituisce il gruppo di navigazione (override opzionale).
     */
    public static function getNavigationGroup(): string
    {
        return '';
    }

<<<<<<< HEAD
    /*
     * @return array<\Filament\Schemas\Components\Component>
     */
    // abstract public static function getFormSchema(): array;

    public function form(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema());
=======
    /**
     * Restituisce lo schema del form per i record correlati.
     *
     * @return array<Component>
     */
    // abstract public function getFormSchema(): array;

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
    protected function getFormSchema(): array
    {
        return [];
>>>>>>> c7fd73eb (.)
    }

    /**
     * Definisce le colonne della tabella per la visualizzazione dei record correlati.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, TextColumn>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> c7fd73eb (.)
    public function getTableColumns(): array
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
    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make()->label('Crea Nuovo')->disableCreateAnother(),
        ];
    }

    /**
     * Definisce le azioni per ogni riga della tabella.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, Action>
     */
    public function getTableActions(): array
    {
<<<<<<< HEAD
        return [
            'edit' => Action::make('edit')
                ->label('Modifica')
                ->icon('heroicon-o-pencil')
                ->url(fn(Model $record): string => static::getResource()::getUrl('edit', ['record' => $record])),
=======
        // Preferisci la risorsa correlata per i record nested; altrimenti usa la risorsa della pagina.
        $resource = static::$relatedResource ?? static::getResource();
        // Mostra "view" solo se la risorsa correlata espone quella pagina.
        $hasView = $resource::hasPage('view');

        return [
            'view' => Action::make('view')
                ->label('Visualizza')
                ->icon('heroicon-o-eye')
                ->visible(static fn (): bool => (bool) $hasView)
                ->url(function (Model $record) use ($resource): string {
                    // Prova il guessing degli URL nested di Filament (funziona con nesting multi-livello in richieste normali).
                    $url = $resource::getUrl('view', ['record' => $record], shouldGuessMissingParameters: true);
                    // Fallback per contesti senza dati di request (es. test Livewire).
                    if ('' === $url) {
                        $url = $resource::getUrl('view', ['record' => $record], shouldGuessMissingParameters: false);
                    }

                    return SafeStringCastAction::cast($url);
                }),
            'edit' => Action::make('edit')
                ->label('Modifica')
                ->icon('heroicon-o-pencil')
                ->url(function (Model $record) use ($resource): string {
                    // Prova il guessing degli URL nested di Filament (funziona con nesting multi-livello in richieste normali).
                    $url = $resource::getUrl('edit', ['record' => $record], shouldGuessMissingParameters: true);
                    // Fallback per contesti senza dati di request (es. test Livewire).
                    if ('' === $url) {
                        $url = $resource::getUrl('edit', ['record' => $record], shouldGuessMissingParameters: false);
                    }

                    return SafeStringCastAction::cast($url);
                }),
>>>>>>> c7fd73eb (.)
            // 'view' => Action::make('view')
            //     ->label('Visualizza')
            //     ->icon('heroicon-o-eye')
            //     ->url(fn (Model $record): string => static::getResource()::getUrl('view', ['record' => $record])),
        ];
    }

    /*
     * Configura la tabella per la visualizzazione dei record correlati.
     * public function table(Table $table): Table
     * {
     * return $table
     * ->columns($this->getTableColumns())
     * ->headerActions($this->getTableHeaderActions())
     * ->actions($this->getTableActions())
     * ->bulkActions([])
     * ->emptyStateActions([
     * 'create' => CreateAction::make()
     * ->label('Crea Nuovo')
     * ->disableCreateAnother(),
     * ]);
     * }.
     *
     * public function table(Table $table): Table
     * {
     * return $table
     * ->columns($this->getTableColumns())
     * ->headerActions($this->getTableHeaderActions())
     * ->actions($this->getTableActions())
     * ->bulkActions([])
     * ->emptyStateActions([
     * 'create' => CreateAction::make()
     * ->label('Crea Nuovo')
     * ->disableCreateAnother(),
<<<<<<< HEAD
    /**
     * Configura il form per la creazione/modifica dei record correlati.
     */
=======
>>>>>>> c7fd73eb (.)

    /**
     * Restituisce il titolo della pagina.
     */
    public function getTitle(): string
    {
        $resource = static::getResource();
        $recordTitle = $this->getRecordTitle();
        $relationship = static::getRelationshipName();

        $titleString = '';
        if ($recordTitle instanceof Htmlable) {
            $titleString = $recordTitle->toHtml();
        } else {
            $titleString = (string) $recordTitle;
        }

        return Str::of($relationship)
            ->title()
<<<<<<< HEAD
            ->prepend($titleString . ' - ')
=======
            ->prepend($titleString.' - ')
>>>>>>> c7fd73eb (.)
            ->toString();
    }
}
