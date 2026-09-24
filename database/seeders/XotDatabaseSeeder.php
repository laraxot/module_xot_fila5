<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Orchestratore Xot — N modelli owner = N {Model}Seeder (regola Laraxot).
 */
class XotDatabaseSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        if (null !== $this->command) {
=======
        if ($this->command !== null) {
>>>>>>> laraxot/dev
            $this->command->info('XotDatabaseSeeder: entity seeders…');
        }

        $this->call([
            CacheSeeder::class,
            CacheLockSeeder::class,
            ExtraSeeder::class,
            FeedSeeder::class,
            HealthCheckResultHistoryItemSeeder::class,
            InformationSchemaTableSeeder::class,
            LogSeeder::class,
            ModuleSeeder::class,
            PulseAggregateSeeder::class,
            PulseEntrySeeder::class,
            PulseValueSeeder::class,
            SessionSeeder::class,
        ]);

<<<<<<< HEAD
        if (null !== $this->command) {
=======
        if ($this->command !== null) {
>>>>>>> laraxot/dev
            $this->command->info('XotDatabaseSeeder: completato.');
        }
    }
}
