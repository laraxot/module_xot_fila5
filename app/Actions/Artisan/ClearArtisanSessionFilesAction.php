<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan;

use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

/**
 * Replaces Modules\Xot\Services\ArtisanService::sessionClear().
 */
class ClearArtisanSessionFilesAction
{
    use QueueableAction;

    public function execute(): string
    {
        $files = File::files(storage_path('framework/sessions'));

        foreach ($files as $file) {
<<<<<<< HEAD
            if ($file->getExtension() === '' && $file->getRealPath() !== false) {
<<<<<<< .merge_file_PH4JUY
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_EYQlCp
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            if ($file->getExtension() === '' && $file->getRealPath() !== false) {
=======
            if ('' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            if ('' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> .merge_file_7u3lBJ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            if ('' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_8f1JeI
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                File::delete($file->getRealPath());
            }
        }

        return 'Session cleared! ('.\count($files).' Files )';
    }
}
