<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Actions;

use Filament\Actions\Action;
use Modules\Xot\Actions\ModelClass\CopyFromLastYearAction;
use Spatie\QueueableAction\QueueableAction;

class CopyFromLastYearButton
{
    use QueueableAction;

    public function execute(string $modelClass, string $fieldName, ?string $year): Action
    {
        return Action::make('copy_from_last_year')
            ->tooltip('copy from last year')
            ->icon('heroicon-o-document-duplicate')
<<<<<<< .merge_file_T9rgz2
<<<<<<< HEAD
<<<<<<< HEAD
            ->visible($year !== null)
=======
            ->visible(null !== $year)
>>>>>>> laraxot/dev
=======
            ->visible(null !== $year)
>>>>>>> 8d801bbe (Check & fix styling)
=======
            ->visible($year !== null)
>>>>>>> .merge_file_fSTTeK
            ->action(static fn () => app(CopyFromLastYearAction::class)->execute($modelClass, $fieldName, $year));
    }
}
