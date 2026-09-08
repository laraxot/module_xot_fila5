<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD
use RuntimeException;
=======

>>>>>>> c7fd73eb (.)
use function Safe\shell_exec;

class ImportMdbToMySQL extends Command
{
    /**
     * Il nome e la firma del comando.
     *
     * @var string
     */
    protected $signature = 'xot:import-mdb-to-mysql';

    /**
     * La descrizione del comando.
     *
     * @var string
     */
    protected $description = 'Importa un file .mdb in MySQL';

    /**
     * Esegui il comando.
     */
    public function handle(): int
    {
        $mdbFile = $this->ask('Inserisci il percorso del file .mdb');
<<<<<<< HEAD
        if (!is_string($mdbFile)) {
            throw new RuntimeException('Il percorso del file deve essere una stringa');
        }

        $mysqlDb = $this->ask('Inserisci il nome del database MySQL');
        if (!is_string($mysqlDb)) {
            throw new RuntimeException('Il nome del database deve essere una stringa');
        }

        $this->info("File .mdb: $mdbFile");
        $this->info("Database MySQL: $mysqlDb");
=======
        if (! is_string($mdbFile)) {
            throw new \RuntimeException('Il percorso del file deve essere una stringa');
        }

        $mysqlDb = $this->ask('Inserisci il nome del database MySQL');
        if (! is_string($mysqlDb)) {
            throw new \RuntimeException('Il nome del database deve essere una stringa');
        }

        $this->info("File .mdb: {$mdbFile}");
        $this->info("Database MySQL: {$mysqlDb}");
>>>>>>> c7fd73eb (.)

        $this->info('Esportando tabelle dal file .mdb...');
        $tables = $this->exportTablesToSQL($mdbFile);
        if (empty($tables)) {
            $this->error('Nessuna tabella trovata nel file .mdb');
<<<<<<< HEAD
=======

>>>>>>> c7fd73eb (.)
            return Command::FAILURE;
        }

        $this->info('Importando le tabelle in MySQL...');
        $this->importTablesIntoMySQL($tables, $mysqlDb);

        $this->info('Importazione completata con successo!');
<<<<<<< HEAD
=======

>>>>>>> c7fd73eb (.)
        return Command::SUCCESS;
    }

    /**
     * Esporta tutte le tabelle dal file .mdb in formato SQL.
     *
     * @return array<int, string>
     */
    private function exportTablesToSQL(string $mdbFile): array
    {
        $tables = [];
<<<<<<< HEAD
        $tableList = shell_exec("mdb-tables $mdbFile");
        if (!$tableList) {
=======
        $tableList = shell_exec("mdb-tables {$mdbFile}");
        if (! $tableList) {
>>>>>>> c7fd73eb (.)
            return [];
        }

        // Esporta ogni tabella in un file SQL
        foreach (explode("\n", trim($tableList)) as $table) {
            if (empty($table)) {
                continue;
            }

            $tables[] = $table;
            $sqlFile = storage_path("app/{$table}.sql");
<<<<<<< HEAD
            shell_exec("mdb-schema $mdbFile mysql > $sqlFile");
            shell_exec("mdb-export -I mysql $mdbFile $table >> $sqlFile");
=======
            shell_exec("mdb-schema {$mdbFile} mysql > {$sqlFile}");
            shell_exec("mdb-export -I mysql {$mdbFile} {$table} >> {$sqlFile}");
>>>>>>> c7fd73eb (.)
        }

        return $tables;
    }

    /**
     * Importa le tabelle in MySQL.
     *
     * @param array<int, string> $tables
     */
    private function importTablesIntoMySQL(array $tables, string $mysqlDb): void
    {
        foreach ($tables as $table) {
            $sqlFile = storage_path("app/{$table}.sql");
<<<<<<< HEAD
            $command = "mysql -u root $mysqlDb < $sqlFile";
=======
            $command = "mysql -u root {$mysqlDb} < {$sqlFile}";
>>>>>>> c7fd73eb (.)
            shell_exec($command);
        }
    }
}
