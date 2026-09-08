<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Nwidart\Modules\Facades\Module;
<<<<<<< HEAD
=======
use Nwidart\Modules\Laravel\Module as LaravelModule;
>>>>>>> c7fd73eb (.)
use Spatie\QueueableAction\QueueableAction;

class GetAllModelsAction
{
    use QueueableAction;

    /**
     * Execute the action.
<<<<<<< HEAD
     */
    public function execute(): array
    {
        $res = [];
        $modules = Module::all();
        foreach ($modules as $module) {
            $tmp = app(GetAllModelsByModuleNameAction::class)->execute($module->getName());
=======
     *
     * @return array<int, class-string>
     */
    public function execute(): array
    {
        /** @var array<int, class-string> $res */
        $res = [];

        /** @var array<string, LaravelModule> $modules */
        $modules = Module::all();

        foreach ($modules as $module) {
            $moduleNameValue = $module->getName();

            // Type narrowing per PHPStan Level 10
            if (! is_string($moduleNameValue)) {
                continue;
            }

            $tmp = app(GetAllModelsByModuleNameAction::class)->execute($moduleNameValue);
            /** @var array<int, class-string> $tmp */
>>>>>>> c7fd73eb (.)
            $res = array_merge($res, $tmp);
        }

        return $res;
    }
}
