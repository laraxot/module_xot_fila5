<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Illuminate\Support\Facades\DB;
use Modules\Xot\Services\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Services\ArtisanService;

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
<<<<<<< .merge_file_DwYWlP
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_oenBeG
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
>>>>>>> .merge_file_130BnN
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' !== $moduleName) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_m1ISBt
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            echo '<h3>Module '.$moduleName.'</h3>';

            // Dati sacri: mai --force (solo migrate additivo)
            return ArtisanService::exe('module:migrate', ['module' => $moduleName]);
        }

        return ArtisanService::exe('migrate');
    }

    public function supports(string $command): bool
    {
<<<<<<< HEAD
<<<<<<< .merge_file_DwYWlP
<<<<<<< HEAD
        return $command === 'migrate';
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_oenBeG
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
>>>>>>> .merge_file_130BnN
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return 'migrate' === $command;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        return $command === 'migrate';
>>>>>>> .merge_file_m1ISBt
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
