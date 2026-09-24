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
<<<<<<< .merge_file_IbwRiL
<<<<<<< HEAD
<<<<<<< HEAD
            if ($file->getExtension() === 'log' && $file->getRealPath() !== false) {
=======
<<<<<<< .merge_file_zgEKOS
<<<<<<< HEAD
            if ($file->getExtension() === 'log' && $file->getRealPath() !== false) {
=======
            if ('log' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> laraxot/dev
=======
            if ('log' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> .merge_file_a13PWE
>>>>>>> laraxot/dev
=======
            if ('log' === $file->getExtension() && false !== $file->getRealPath()) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
            if ($file->getExtension() === 'log' && $file->getRealPath() !== false) {
>>>>>>> .merge_file_6BLvif
                File::delete($file->getRealPath());
            }
        }

        return '<pre>laravel.log cleared !</pre> ('.\count($files).' Files )';
    }
}
