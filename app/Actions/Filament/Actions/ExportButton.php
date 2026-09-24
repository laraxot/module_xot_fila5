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
            ->icon('heroicon-o-inbox-arrow-down')
=======
            ->icon('xot-files.xls')
>>>>>>> laraxot/dev
            // ->visible(null != $year)
            ->action(static fn () => dddx('WIP'));
    }
}
