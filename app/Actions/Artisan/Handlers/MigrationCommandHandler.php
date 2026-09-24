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
=======
<<<<<<< HEAD
        if ($moduleName !== '') {
=======
        if ('' !== $moduleName) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            echo '<h3>Module '.$moduleName.'</h3>';

            // Dati sacri: mai --force (solo migrate additivo)
            return app(RunArtisanCommandAction::class)->execute('module:migrate', ['module' => $moduleName]);
        }

        return app(RunArtisanCommandAction::class)->execute('migrate');
    }

    public function supports(string $command): bool
    {
<<<<<<< HEAD
        return $command === 'migrate';
=======
<<<<<<< HEAD
        return $command === 'migrate';
=======
        return 'migrate' === $command;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    }
}
