<?php

declare(strict_types=1);

/**
 * @see https://github.com/paulvl/backup/blob/master/src/Console/Commands/MysqlDump.php
 */

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Webmozart\Assert\Assert;

use function Safe\exec;

=======

use function Safe\exec;

use Webmozart\Assert\Assert;

>>>>>>> c7fd73eb (.)
class DatabaseBackUpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump your Mysql database to a file';

    /**
<<<<<<< HEAD
     * Create a new command instance.
     *
     * @return void
     */
    

    /**
=======
>>>>>>> c7fd73eb (.)
     * Execute the console command.
     */
    public function handle(): void
    {
<<<<<<< HEAD
        $filename = 'backup-' . Carbon::now()->format('Y-m-d') . '.gz';
        $backup_path = storage_path('app/backup/' . $filename);
        Assert::string(
            $backup_path = Str::replace(['/', '\\'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $backup_path),
=======
        $filename = 'backup-'.Carbon::now()->format('Y-m-d').'.gz';
        $backupPath = storage_path('app/backup/'.$filename);
        Assert::string(
            $backupPath = Str::replace(['/', '\\'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $backupPath),
>>>>>>> c7fd73eb (.)
            'wip',
        );
        Assert::string($user = config('database.connections.mysql.username'));
        Assert::string($password = config('database.connections.mysql.password'));
        Assert::string($host = config('database.connections.mysql.host'));
        Assert::string($database = config('database.connections.mysql.database'));
        $command =
<<<<<<< HEAD
            'mysqldump --user=' .
            $user .
            ' --password=' .
            $password .
            ' --host=' .
            $host .
            ' ' .
            $database .
            '  | gzip > ' .
            $backup_path;
=======
            'mysqldump --user='.
            $user.
            ' --password='.
            $password.
            ' --host='.
            $host.
            ' '.
            $database.
            '  | gzip > '.
            $backupPath;
>>>>>>> c7fd73eb (.)

        $returnVar = null;
        $output = null;
        // echo $command;
        exec($command, $output, $returnVar);
    }
}
