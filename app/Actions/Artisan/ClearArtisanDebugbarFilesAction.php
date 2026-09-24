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
<<<<<<< .merge_file_ZbyAkI
<<<<<<< HEAD
            if ($file->getExtension() === 'json' && $file->getRealPath() !== false) {
=======
            if ('json' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
=======
            if ('json' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> .merge_file_0YxRzI
                File::delete($file->getRealPath());
            }
        }

        return 'Debugbar Storage cleared! ('.\count($files).' Files )';
    }
}
