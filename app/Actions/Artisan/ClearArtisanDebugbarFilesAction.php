<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan;

use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

/**
 * Replaces Modules\Xot\Services\ArtisanService::debugbarClear().
 */
class ClearArtisanDebugbarFilesAction
{
    use QueueableAction;

    public function execute(): string
    {
        $files = File::files(storage_path('debugbar'));

        foreach ($files as $file) {
<<<<<<< HEAD
            if ($file->getExtension() === 'json' && $file->getRealPath() !== false) {
<<<<<<< .merge_file_hCaaws
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_ZbyAkI
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            if ($file->getExtension() === 'json' && $file->getRealPath() !== false) {
=======
            if ('json' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            if ('json' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> .merge_file_0YxRzI
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            if ('json' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_2NQ0Ix
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                File::delete($file->getRealPath());
            }
        }

        return 'Debugbar Storage cleared! ('.\count($files).' Files )';
    }
}
