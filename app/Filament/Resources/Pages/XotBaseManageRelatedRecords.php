<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\HasRelationshipModelClass;
use Modules\Xot\Filament\Traits\HasXotForm;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;

/**
 * Base page for Filament related-record managers.
 */
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{
    use HasRelationshipModelClass;
    use HasXotForm;
    use HasXotTable {
        HasRelationshipModelClass::getModelClass insteadof HasXotTable;
    }
    use NavigationLabelTrait;

    protected static string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): string
    {
        return '';
    }

    public function getRecordTitle(): string
    {
        $value = $this->record->{static::$recordTitleAttribute};

        return SafeStringCastAction::cast($value);
    }

    public function schema(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema());
    }

    /**
     * @return array<Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

    /**
     * @return array<string, TextColumn>
     */
    #[\Override]
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
     * @return array<string, Action>
     */
    protected function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make()->label('Crea Nuovo')->disableCreateAnother(),
        ];
    }

    /**
     * @return array<string, Action>
     */
    public function getTableActions(): array
    {
        $resource = static::$relatedResource ?? static::getResource();
        $hasView = $resource::hasPage('view');

        return [
            'view' => Action::make('view')
                ->label('Visualizza')
                ->icon('heroicon-o-eye')
                ->visible(static fn (): bool => (bool) $hasView)
                ->url(function (Model $record) use ($resource): string {
                    $url = $resource::getUrl('view', ['record' => $record], shouldGuessMissingParameters: true);
                    if ('' === $url) {
                        $url = $resource::getUrl('view', ['record' => $record], shouldGuessMissingParameters: false);
                    }

                    return SafeStringCastAction::cast($url);
                }),
            'edit' => Action::make('edit')
                ->label('Modifica')
                ->icon('heroicon-o-pencil')
                ->url(function (Model $record) use ($resource): string {
                    $url = $resource::getUrl('edit', ['record' => $record], shouldGuessMissingParameters: true);
                    if ('' === $url) {
                        $url = $resource::getUrl('edit', ['record' => $record], shouldGuessMissingParameters: false);
                    }

                    return SafeStringCastAction::cast($url);
                }),
        ];
    }

    public function getTitle(): string
    {
        $resource = static::getResource();
        $recordTitle = $this->getRecordTitle();
        $relationship = static::getRelationshipName();

        $titleString = (string) $recordTitle;

        return Str::of($relationship)
            ->title()
            ->prepend($titleString.' - ')
            ->toString();
    }

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }
}
