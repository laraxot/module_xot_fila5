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
=======
<<<<<<< HEAD
            if ($file->getExtension() === 'log' && $file->getRealPath() !== false) {
=======
            if ('log' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                File::delete($file->getRealPath());
            }
        }

        return '<pre>laravel.log cleared !</pre> ('.\count($files).' Files )';
    }
}
