<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan\Handlers;

use Illuminate\Support\Facades\DB;
use Modules\Xot\Actions\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Actions\Artisan\RunArtisanCommandAction;

/**
 * Handles migration-related artisan commands.
 */
class MigrationCommandHandler implements CommandHandlerInterface
{
    public function handle(string $moduleName = ''): string
    {
        DB::purge('mysql');
        DB::reconnect('mysql');

<<<<<<< HEAD
        if ($moduleName !== '') {
<<<<<<< .merge_file_HHz3u4
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_GbknKG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($moduleName !== '') {
=======
        if ('' !== $moduleName) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('' !== $moduleName) {
>>>>>>> .merge_file_eEtC5V
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' !== $moduleName) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_5zQZoj
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            echo '<h3>Module '.$moduleName.'</h3>';

            // Dati sacri: mai --force (solo migrate additivo)
            return app(RunArtisanCommandAction::class)->execute('module:migrate', ['module' => $moduleName]);
        }

        return app(RunArtisanCommandAction::class)->execute('migrate');
    }

    public function supports(string $command): bool
    {
<<<<<<< HEAD
<<<<<<< .merge_file_HHz3u4
<<<<<<< HEAD
        return $command === 'migrate';
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_GbknKG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        return $command === 'migrate';
=======
        return 'migrate' === $command;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        return 'migrate' === $command;
>>>>>>> .merge_file_eEtC5V
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return 'migrate' === $command;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        return $command === 'migrate';
>>>>>>> .merge_file_5zQZoj
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
