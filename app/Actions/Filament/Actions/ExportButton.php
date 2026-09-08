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
            ->icon('heroicon-o-inbox-arrow-down')
            // ->visible(null != $year)
<<<<<<< HEAD
            ->action(static fn() => dddx('WIP'));
=======
            ->action(static fn () => dddx('WIP'));
>>>>>>> c7fd73eb (.)
    }
}
