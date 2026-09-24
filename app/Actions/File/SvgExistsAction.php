<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use BladeUI\Icons\Factory as IconFactory;
use Illuminate\Support\Facades\App;

/**
 * Verifica l'esistenza di un SVG registrato utilizzando BladeUI Icons.
 *
 * @method bool execute(string $svgName)
 */
class SvgExistsAction
{
    /**
     * Verifica se l'SVG esiste nei set di icone registrati.
     *
<<<<<<< .merge_file_2B8P1U
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $svgName  Il nome dell'SVG da verificare (es: 'heroicon-o-user')
=======
     * @param string $svgName Il nome dell'SVG da verificare (es: 'heroicon-o-user')
     *
>>>>>>> laraxot/dev
=======
     * @param string $svgName Il nome dell'SVG da verificare (es: 'heroicon-o-user')
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  string  $svgName  Il nome dell'SVG da verificare (es: 'heroicon-o-user')
>>>>>>> .merge_file_CwecQR
     * @return bool true se l'SVG esiste, false altrimenti
     */
    public function execute(string $svgName): bool
    {
        if (empty($svgName)) {
            return false;
        }

<<<<<<< .merge_file_2B8P1U
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        // BladeUI Kit icon check: only for standard sets (heroicon-*, etc.)
        // Geo SVGs use "geo-" prefix (e.g., "geo-magnifying-glass") — served via <img> or Lit JS, not BladeUI Kit
        if (str_starts_with($svgName, 'geo-')) {
            // Geo SVGs are in Modules/Geo/resources/svg/ — check file existence directly
            $relativePath = str_replace('geo-', '', $svgName);
            $svgPath = base_path('Modules/Geo/resources/svg/'.$relativePath.'.svg');

            return file_exists($svgPath);
        }

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_CwecQR
        /** @var IconFactory $iconsFactory */
        $iconsFactory = App::make(IconFactory::class);
        try {
            $iconsFactory->svg($svgName);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
