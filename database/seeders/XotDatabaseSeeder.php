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
<<<<<<< .merge_file_o9NjDm
        if ($this->command !== null) {
=======
<<<<<<< HEAD
        if ($this->command !== null) {
=======
        if (null !== $this->command) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_B1MVtA
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

<<<<<<< .merge_file_o9NjDm
        if ($this->command !== null) {
=======
<<<<<<< HEAD
        if ($this->command !== null) {
=======
        if (null !== $this->command) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_B1MVtA
            $this->command->info('XotDatabaseSeeder: completato.');
        }
    }
}
