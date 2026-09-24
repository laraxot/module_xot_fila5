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

<<<<<<< .merge_file_oenBeG
<<<<<<< HEAD
        if ($moduleName !== '') {
=======
        if ('' !== $moduleName) {
>>>>>>> laraxot/dev
=======
        if ('' !== $moduleName) {
>>>>>>> .merge_file_130BnN
            echo '<h3>Module '.$moduleName.'</h3>';

            // Dati sacri: mai --force (solo migrate additivo)
            return ArtisanService::exe('module:migrate', ['module' => $moduleName]);
        }

        return ArtisanService::exe('migrate');
    }

    public function supports(string $command): bool
    {
<<<<<<< .merge_file_oenBeG
<<<<<<< HEAD
        return $command === 'migrate';
=======
        return 'migrate' === $command;
>>>>>>> laraxot/dev
=======
        return 'migrate' === $command;
>>>>>>> .merge_file_130BnN
    }
}
