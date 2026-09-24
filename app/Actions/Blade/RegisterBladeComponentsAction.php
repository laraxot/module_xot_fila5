<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Blade;

use Illuminate\Support\Facades\Blade;
use Modules\Xot\Actions\File\GetComponentsAction;
use Modules\Xot\Datas\ComponentFileData;
use Spatie\QueueableAction\QueueableAction;

class RegisterBladeComponentsAction
{
    use QueueableAction;

    public function execute(string $path, string $namespace, string $prefix = ''): void
    {
        $comps = app(GetComponentsAction::class)->execute($path, $namespace.'\View\Components', $prefix);

<<<<<<< .merge_file_uN868i
<<<<<<< HEAD
<<<<<<< HEAD
        if ($comps->count() === 0) {
=======
        if (0 === $comps->count()) {
>>>>>>> laraxot/dev
=======
        if (0 === $comps->count()) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($comps->count() === 0) {
>>>>>>> .merge_file_vLgV0p
            return;
        }

        foreach ($comps->items() as $comp) {
            if (! $comp instanceof ComponentFileData) {
                continue;
            }
            Blade::component($comp->name, $comp->ns);
        }
    }
}
