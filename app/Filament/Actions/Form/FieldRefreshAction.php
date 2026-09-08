<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Form;

<<<<<<< HEAD
use Filament\Actions\Action;

use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Webmozart\Assert\Assert;

class FieldRefreshAction extends Action
=======
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Utilities\Set;
use Modules\Xot\Filament\Actions\XotBaseAction;

class FieldRefreshAction extends XotBaseAction
>>>>>>> c7fd73eb (.)
{
    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
        $this->translateLabel();
        $this->icon('heroicon-o-arrow-path')
            ->tooltip('Ricalcola valore')
            ->action(function ($state, $set, $record) {
=======

        $this->translateLabel();
        $this->icon('heroicon-o-arrow-path')
            ->label('')
            ->tooltip('Ricalcola valore')
            ->action(function (mixed $record, Set $set): void {
>>>>>>> c7fd73eb (.)
                $name = $this->getName();
                if ($name === null) {
                    return;
                }

<<<<<<< HEAD
                $method = 'get' . Str::studly($name) . '';
                $value = $record->$method();
                $set($name, $value);
                Notification::make()
                    ->title('Ricalcolato ' . $name)
                    ->body('vecchio valore: ' . $state . ' nuovo valore: ' . $value)
=======
                if (! is_object($record) && ! is_string($record)) {
                    Notification::make()
                        ->title('Errore')
                        ->body('Record non valido')
                        ->danger()
                        ->send();

                    return;
                }

                Notification::make()
                    ->title('Valore ricalcolato')
                    ->body('Il valore del campo è stato ricalcolato con successo')
>>>>>>> c7fd73eb (.)
                    ->success()
                    ->send();
            });
    }

<<<<<<< HEAD
    public static function getDefaultName(): null|string
=======
    public static function getDefaultName(): ?string
>>>>>>> c7fd73eb (.)
    {
        return 'field_refresh';
    }
}
