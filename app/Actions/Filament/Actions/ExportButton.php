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
            ->icon('xot-files.xls')
=======
            ->icon('heroicon-o-inbox-arrow-down')
>>>>>>> laraxot/dev
            // ->visible(null != $year)
            ->action(static fn () => dddx('WIP'));
    }
}
