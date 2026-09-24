<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
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
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
=======
            ->action(function ($record, Set $set): void {
>>>>>>> 930f8146 (Check & fix styling)
                $name = $this->getName();
                if ($name === null) {
<<<<<<< .merge_file_Hf2A3D
=======
                if (null === $name) {
>>>>>>> laraxot/dev
=======
            ->action(function ($record, Set $set): void {
                $name = $this->getName();
                if (null === $name) {
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_nY8ana
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
