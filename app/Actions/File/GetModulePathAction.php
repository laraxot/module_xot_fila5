<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
<<<<<<< .merge_file_0l3dmf
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_KhR6UX
use Spatie\QueueableAction\QueueableAction;

use function Safe\scandir;

<<<<<<< .merge_file_0l3dmf
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)

use function Safe\scandir;

use Spatie\QueueableAction\QueueableAction;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_KhR6UX
class GetModulePathAction
{
    use QueueableAction;

    /**
     * Ottiene il percorso di un modulo.
     *
<<<<<<< .merge_file_0l3dmf
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $moduleName  Il nome del modulo
=======
     * @param string $moduleName Il nome del modulo
     *
>>>>>>> laraxot/dev
=======
     * @param string $moduleName Il nome del modulo
     *
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  string  $moduleName  Il nome del modulo
>>>>>>> .merge_file_KhR6UX
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

>>>>>>> 8d801bbe (Check & fix styling)
                return Str::lower($item) === $moduleNameLower;
            })->first();

            // Se non troviamo il modulo, restituiamo un percorso di fallback
<<<<<<< HEAD
            if (! is_string($foundModule)) {
=======
            if (null === $foundModule || ! is_string($foundModule)) {
>>>>>>> 8d801bbe (Check & fix styling)
                return base_path('Modules/'.$moduleName);
            }

            $module_path = base_path('Modules/'.$foundModule);
        }

        return $module_path;
    }
}
