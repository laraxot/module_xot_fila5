<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use Spatie\QueueableAction\QueueableAction;

use function Safe\scandir;

class GetModulePathAction
{
    use QueueableAction;

    /**
     * Ottiene il percorso di un modulo.
     *
<<<<<<< HEAD
     * @param string $moduleName Il nome del modulo
     *
=======
     * @param  string  $moduleName  Il nome del modulo
>>>>>>> c7fd73eb (.)
     * @return string Il percorso completo del modulo
     */
    public function execute(string $moduleName): string
    {
        try {
            $module_path = Module::getModulePath($moduleName);
<<<<<<< HEAD
        } catch (Exception) {
            $modulesPath = base_path('Modules');
            if (!File::exists($modulesPath)) {
                return __DIR__ . '/../';
=======
        } catch (\Exception) {
            $modulesPath = base_path('Modules');
            if (! File::exists($modulesPath)) {
                return __DIR__.'/../';
>>>>>>> c7fd73eb (.)
            }

            $files = scandir($modulesPath);
            $moduleNameLower = Str::lower($moduleName);

<<<<<<< HEAD
            $foundModule = collect($files)->filter(static function ($item) use ($moduleNameLower): bool {
                if (!is_string($item)) {
                    return false;
                }
=======
            $foundModule = collect($files)->filter(static function (mixed $item) use ($moduleNameLower): bool {
                if (! is_string($item)) {
                    return false;
                }

>>>>>>> c7fd73eb (.)
                return Str::lower($item) === $moduleNameLower;
            })->first();

            // Se non troviamo il modulo, restituiamo un percorso di fallback
<<<<<<< HEAD
            if ($foundModule === null || !is_string($foundModule)) {
                return base_path('Modules/' . $moduleName);
            }

            $module_path = base_path('Modules/' . $foundModule);
=======
            if ($foundModule === null || ! is_string($foundModule)) {
                return base_path('Modules/'.$moduleName);
            }

            $module_path = base_path('Modules/'.$foundModule);
>>>>>>> c7fd73eb (.)
        }

        return $module_path;
    }
}
