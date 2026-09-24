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
<<<<<<< .merge_file_QWltwn
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->command !== null) {
=======
        if (null !== $this->command) {
>>>>>>> laraxot/dev
=======
        if (null !== $this->command) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($this->command !== null) {
>>>>>>> .merge_file_4Pi3ar
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

<<<<<<< .merge_file_QWltwn
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->command !== null) {
=======
        if (null !== $this->command) {
>>>>>>> laraxot/dev
=======
        if (null !== $this->command) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($this->command !== null) {
>>>>>>> .merge_file_4Pi3ar
            $this->command->info('XotDatabaseSeeder: completato.');
        }
    }
}
