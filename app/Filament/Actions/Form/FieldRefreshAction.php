<?php

<<<<<<< .merge_file_VsvjgM
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_k6tM6B
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< .merge_file_VsvjgM
=======
<<<<<<< HEAD
>>>>>>> .merge_file_k6tM6B
namespace Modules\Xot\Filament\Actions\Form;

use Filament\Notifications\Notification;
use Filament\Schemas\Components\Utilities\Set;
use Modules\Xot\Filament\Actions\XotBaseAction;

class FieldRefreshAction extends XotBaseAction
=======
declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Form;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Utilities\Set;

class FieldRefreshAction extends Action
>>>>>>> laraxot/dev
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel();
        $this->icon('heroicon-o-arrow-path')
            ->label('')
            ->tooltip('Ricalcola valore')
<<<<<<< HEAD
            ->action(function (mixed $record, Set $set): void {
                $name = $this->getName();
                if ($name === null) {
=======
            ->action(function ($record, Set $set): void {
                $name = $this->getName();
                if (null === $name) {
>>>>>>> laraxot/dev
                    return;
                }

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
                    ->success()
                    ->send();
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'field_refresh';
    }
}
