<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Actions;

use Modules\Xot\Actions\ModelClass\CopyFromLastYearAction as ModelCopyAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action for copying data from the previous year in Filament.
 */
class CopyFromLastYearAction extends XotBaseAction
{
    use QueueableAction;

    /**
     * Create a new instance of the action.
     */
    public static function make(?string $name = null): static
    {
        $action = parent::make($name ?? 'copy_from_last_year');

        return $action
            ->label('Copy from Last Year')
            ->icon('heroicon-o-arrow-path')
            ->requiresConfirmation()
            ->modalHeading('Copy Data from Last Year')
            ->modalDescription('Are you sure you want to copy data from the previous year?')
            ->action(function (array $arguments, array $data) use ($action): void {
                $action->execute(
                    self::normalizeStringKeyArray($arguments),
                    self::normalizeStringKeyArray($data),
                );
            });
    }

    /**
<<<<<<< .merge_file_ESpwnd
     * @param  array<array-key, mixed>  $input
=======
<<<<<<< HEAD
     * @param  array<array-key, mixed>  $input
=======
     * @param array<string|int, mixed> $input
     *
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xU9OsK
     * @return array<string, mixed>
     */
    private static function normalizeStringKeyArray(array $input): array
    {
        /** @var array<string, mixed> $normalized */
        $normalized = [];

        foreach ($input as $key => $value) {
            if (! is_string($key)) {
                continue;
            }

            $normalized[$key] = $value;
        }

        return $normalized;
    }

    /**
<<<<<<< .merge_file_ESpwnd
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
>>>>>>> .merge_file_xU9OsK
     */
    public function execute(array $arguments, array $data): void
    {
        $modelClass = $arguments['model_class'] ?? null;
        $fieldName = $arguments['field_name'] ?? null;
        $year = $arguments['year'] ?? null;

        if (! is_string($modelClass) || ! is_string($fieldName)) {
            return;
        }

<<<<<<< .merge_file_ESpwnd
        if (! is_string($year) && $year !== null) {
=======
<<<<<<< HEAD
        if (! is_string($year) && $year !== null) {
=======
        if (! is_string($year) && null !== $year) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xU9OsK
            return;
        }

        app(ModelCopyAction::class)->execute($modelClass, $fieldName, $year);
    }
}
