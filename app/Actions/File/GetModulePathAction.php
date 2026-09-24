<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;

use function Safe\scandir;

=======

use function Safe\scandir;

use Spatie\QueueableAction\QueueableAction;

>>>>>>> laraxot/dev
class GetModulePathAction
{
    use QueueableAction;

    /**
     * Ottiene il percorso di un modulo.
     *
<<<<<<< HEAD
     * @param  string  $moduleName  Il nome del modulo
=======
     * @param string $moduleName Il nome del modulo
     *
>>>>>>> laraxot/dev
     * @return string Il percorso completo del modulo
     */
    public function execute(string $moduleName): string
    {
        try {
            $module_path = Module::getModulePath($moduleName);
        } catch (\Exception) {
            $modulesPath = base_path('Modules');
            if (! File::exists($modulesPath)) {
                return __DIR__.'/../';
            }

<<<<<<< HEAD
            /** @var array<int, string> $files */
            $files = scandir($modulesPath);
            $moduleNameLower = Str::lower($moduleName);

            $foundModule = collect($files)->filter(static function (string $item) use ($moduleNameLower): bool {
=======
            $files = scandir($modulesPath);
            $moduleNameLower = Str::lower($moduleName);

            $foundModule = collect($files)->filter(static function ($item) use ($moduleNameLower): bool {
                if (! is_string($item)) {
                    return false;
                }

>>>>>>> laraxot/dev
                return Str::lower($item) === $moduleNameLower;
            })->first();

            // Se non troviamo il modulo, restituiamo un percorso di fallback
<<<<<<< HEAD
            if (! is_string($foundModule)) {
=======
            if (null === $foundModule || ! is_string($foundModule)) {
>>>>>>> laraxot/dev
                return base_path('Modules/'.$moduleName);
            }

            $module_path = base_path('Modules/'.$foundModule);
        }

        return $module_path;
    }
}
