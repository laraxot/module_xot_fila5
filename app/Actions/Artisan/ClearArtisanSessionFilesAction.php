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
=======
<<<<<<< .merge_file_EYQlCp
<<<<<<< HEAD
            if ($file->getExtension() === '' && $file->getRealPath() !== false) {
=======
            if ('' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
=======
            if ('' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> .merge_file_7u3lBJ
>>>>>>> laraxot/dev
                File::delete($file->getRealPath());
            }
        }

        return 'Session cleared! ('.\count($files).' Files )';
    }
}
