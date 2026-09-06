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

        if ($moduleName !== '') {
            echo '<h3>Module '.$moduleName.'</h3>';

<<<<<<< HEAD
            return ArtisanService::exe('module:migrate '.$moduleName.' --force');
        }

        return ArtisanService::exe('migrate --force');
=======
            // Dati sacri: mai --force (solo migrate additivo)
            return ArtisanService::exe('module:migrate', ['module' => $moduleName]);
        }

        return ArtisanService::exe('migrate');
>>>>>>> 7f6cf6be (.)
    }

    public function supports(string $command): bool
    {
        return $command === 'migrate';
    }
}
