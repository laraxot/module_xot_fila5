<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Actions;

use Modules\Xot\Filament\Actions\XotBaseAction;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action for copying views in Filament.
 */
class ViewCopyAction extends XotBaseAction
{
    use QueueableAction;

    /**
     * Create a new instance of the action.
     */
    public static function make(?string $name = null): static
    {
        $action = parent::make($name ?? 'view_copy');
        $actionClass = static::class;

        return $action
            ->label('Copy View')
            ->icon('heroicon-o-document-duplicate')
            ->requiresConfirmation()
            ->modalHeading('Copy View')
            ->modalDescription('Are you sure you want to copy this view?')
            ->action(static function (array $arguments, array $data) use ($actionClass): void {
<<<<<<< HEAD
                /** @var self $service */
                $service = app($actionClass);
                $service->execute(
                    array_filter($arguments, 'is_string', ARRAY_FILTER_USE_KEY),
                    array_filter($data, 'is_string', ARRAY_FILTER_USE_KEY),
                );
=======
                /** @var array<string, mixed> $arguments */
                /** @var array<string, mixed> $data */
                /** @var self $service */
                $service = app($actionClass);
                $service->execute($arguments, $data);
>>>>>>> laraxot/dev
            });
    }

    /**
<<<<<<< .merge_file_bNyh2J
     * @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
>>>>>>> laraxot/dev
>>>>>>> .merge_file_HphlEo
     */
    public function execute(array $arguments, array $data): void
    {
        // TODO: Implement view copying logic
        // This should copy the view file and any related assets
    }
}
