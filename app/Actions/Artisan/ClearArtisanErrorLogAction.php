<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan;

use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

/**
 * Replaces Modules\Xot\Services\ArtisanService::errorClear().
 */
class ClearArtisanErrorLogAction
{
    use QueueableAction;

    public function execute(): string
    {
        $files = File::files(storage_path('logs'));

        foreach ($files as $file) {
<<<<<<< HEAD
            if ($file->getExtension() === 'log' && $file->getRealPath() !== false) {
<<<<<<< .merge_file_5x4FJE
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_zgEKOS
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            if ($file->getExtension() === 'log' && $file->getRealPath() !== false) {
=======
            if ('log' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            if ('log' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> .merge_file_a13PWE
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            if ('log' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_wg0MFs
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                File::delete($file->getRealPath());
            }
        }

        return '<pre>laravel.log cleared !</pre> ('.\count($files).' Files )';
    }
}
