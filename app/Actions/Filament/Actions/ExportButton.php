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
<<<<<<< HEAD
<<<<<<< .merge_file_WOgU3z
<<<<<<< HEAD
<<<<<<< HEAD
            ->icon('heroicon-o-inbox-arrow-down')
=======
            ->icon('xot-files.xls')
>>>>>>> laraxot/dev
=======
            ->icon('heroicon-o-inbox-arrow-down')
>>>>>>> 3792da0d (Check & fix styling)
=======
            ->icon('xot-files.xls')
>>>>>>> .merge_file_6871sj
=======
<<<<<<< HEAD
            ->icon('xot-files.xls')
=======
            ->icon('heroicon-o-inbox-arrow-down')
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            // ->visible(null != $year)
            ->action(static fn () => dddx('WIP'));
    }
}
