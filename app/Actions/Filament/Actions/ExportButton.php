<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Actions;

use Filament\Actions\Action;
use Spatie\QueueableAction\QueueableAction;

class ExportButton
{
    use QueueableAction;

    public function execute(): Action
    {
        return Action::make('export')
            ->tooltip('export XLS')
<<<<<<< .merge_file_P5NEw6
<<<<<<< HEAD
<<<<<<< HEAD
            ->icon('heroicon-o-inbox-arrow-down')
=======
            ->icon('xot-files.xls')
>>>>>>> laraxot/dev
=======
            ->icon('heroicon-o-inbox-arrow-down')
>>>>>>> 8d801bbe (Check & fix styling)
=======
            ->icon('xot-files.xls')
>>>>>>> .merge_file_JuzrAv
            // ->visible(null != $year)
            ->action(static fn () => dddx('WIP'));
    }
}
