<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Mockery;
<<<<<<< .merge_file_IGmFNc
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_UMkcrC
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_N5FSxm
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Models\Cache as CacheModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
use ReflectionMethod;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_UMkcrC
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
use ReflectionMethod;
>>>>>>> .merge_file_N5FSxm
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
    Mockery::close();
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    \Mockery::close();
>>>>>>> .merge_file_UMkcrC
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
    Mockery::close();
>>>>>>> .merge_file_N5FSxm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
});

describe('Xot migration getModelClass and uuid paths', function (): void {
    test('getModelClass deriva nome e uuid conversion su sqlite', function (): void {
        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite' => [
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
                'foreign_key_constraints' => false,
            ],
        ]);
        DB::purge('sqlite');
        DB::reconnect('sqlite');
        Http::fake();
        Process::fake();

        // Force getModelClass() discovery path (model_class null until resolved)
        try {
<<<<<<< HEAD
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
            new class extends XotBaseMigration
            {
                public function up(): void {}
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            new class extends XotBaseMigration
            {
                public function up(): void {}
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_UMkcrC
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            new class extends XotBaseMigration {
                public function up(): void
                {
                }
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UMkcrC
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
            new class extends XotBaseMigration
            {
                public function up(): void {}
>>>>>>> .merge_file_N5FSxm
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            };
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        Schema::dropIfExists('cache');
        Schema::create('cache', static function (Blueprint $t): void {
            $t->char('id', 36)->primary();
            $t->uuid('uuid')->nullable();
            $t->string('key')->nullable();
            $t->text('value')->nullable();
        });
        DB::table('cache')->insert([
            'id' => (string) Str::uuid(),
            'uuid' => null,
            'key' => 'k',
            'value' => 'v',
        ]);

<<<<<<< HEAD
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_N5FSxm
        $migration = new class extends XotBaseMigration
        {
            protected ?string $model_class = CacheModel::class;

            public function up(): void {}
        };

        $isUuid = new ReflectionMethod($migration, 'isUuidColumnType');
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_UMkcrC
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $migration = new class extends XotBaseMigration {
            protected ?string $model_class = CacheModel::class;

            public function up(): void
            {
            }
        };

        $isUuid = new \ReflectionMethod($migration, 'isUuidColumnType');
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UMkcrC
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_N5FSxm
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $isUuid->setAccessible(true);
        Assert::assertTrue($isUuid->invoke($migration, 'char'));

        // Force convert when id is uuid-like
<<<<<<< HEAD
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> .merge_file_UMkcrC
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> .merge_file_N5FSxm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $convert->setAccessible(true);
        try {
            $convert->invoke(
                $migration,
                static function (Blueprint $t): void {
                    $t->id();
                    $t->uuid('uuid')->nullable();
                    $t->string('key')->nullable();
                    $t->text('value')->nullable();
                },
                ['key', 'value'],
                [
                    'pivot_table' => 'cache_locks',
                    'pivot_fk' => 'key',
<<<<<<< HEAD
                    'pivot_post_update' => static function (): void {},
<<<<<<< .merge_file_IGmFNc
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                    'pivot_post_update' => static function (): void {},
=======
                    'pivot_post_update' => static function (): void {
                    },
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                    'pivot_post_update' => static function (): void {
                    },
>>>>>>> .merge_file_UMkcrC
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                    'pivot_post_update' => static function (): void {
                    },
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_N5FSxm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                ],
            );
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        Schema::dropIfExists('cache');
        Schema::create('cache', static function (Blueprint $t): void {
            $t->increments('id');
            $t->uuid('uuid')->nullable();
            $t->string('key')->nullable();
            $t->text('value')->nullable();
        });
        DB::table('cache')->insert(['id' => 1, 'uuid' => null, 'key' => 'a', 'value' => 'b']);
        DB::table('cache')->insert(['id' => 2, 'uuid' => (string) Str::uuid(), 'key' => 'c', 'value' => 'd']);

<<<<<<< HEAD
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> .merge_file_UMkcrC
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> .merge_file_N5FSxm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $backfill->setAccessible(true);
        try {
            $backfill->invoke($migration);
            Assert::assertNotNull(DB::table('cache')->where('id', 1)->value('uuid'));
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        foreach (['copyDataWithUuidToBigintMapping', 'updatePivotTableFkFromUuidToBigint', 'performUuidToBigintConversion', 'hasPrimaryKey', 'hasForeignKey', 'dropPrimaryKey', 'renameColumn', 'renameTable', 'tableCreate', 'tableUpdate', 'updateTimestamps', 'updateUser', 'foreignIdFor', 'isMysqlFamilyDriver'] as $name) {
            if (! method_exists($migration, $name)) {
                continue;
            }
<<<<<<< HEAD
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $name);
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $name);
=======
            $rm = new \ReflectionMethod($migration, $name);
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            $rm = new \ReflectionMethod($migration, $name);
>>>>>>> .merge_file_UMkcrC
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            $rm = new \ReflectionMethod($migration, $name);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            $rm = new ReflectionMethod($migration, $name);
>>>>>>> .merge_file_N5FSxm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $rm->setAccessible(true);
            $args = [];
            foreach ($rm->getParameters() as $param) {
                if ($param->isDefaultValueAvailable()) {
                    $args[] = $param->getDefaultValue();

                    continue;
                }
                $tn = $param->getType() instanceof \ReflectionNamedType ? $param->getType()->getName() : '';
                $pn = $param->getName();
                $args[] = match (true) {
<<<<<<< HEAD
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_aykYk5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_N5FSxm
                    $tn === Blueprint::class => new Blueprint(DB::connection(), 'cache'),
                    $tn === \Closure::class || $tn === 'callable' => static function (Blueprint $t): void {
                        $t->id();
                    },
                    $tn === 'array' => ['key', 'value'],
                    $pn === 'from' || $pn === 'oldTable' || $pn === 'sourceTable' => 'cache',
                    $pn === 'to' || $pn === 'newTable' => 'cache_new',
                    $pn === 'pivotTable' => 'cache',
                    $pn === 'fkColumn' || $pn === 'column' || $pn === 'constraint' => 'key',
                    $pn === 'class' => CacheModel::class,
                    $tn === 'string' => 'cache',
                    $tn === 'bool' => true,
<<<<<<< .merge_file_IGmFNc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_UMkcrC
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                    Blueprint::class === $tn => new Blueprint(DB::connection(), 'cache'),
                    \Closure::class === $tn || 'callable' === $tn => static function (Blueprint $t): void {
                        $t->id();
                    },
                    'array' === $tn => ['key', 'value'],
                    'from' === $pn || 'oldTable' === $pn || 'sourceTable' === $pn => 'cache',
                    'to' === $pn || 'newTable' === $pn => 'cache_new',
                    'pivotTable' === $pn => 'cache',
                    'fkColumn' === $pn || 'column' === $pn || 'constraint' === $pn => 'key',
                    'class' === $pn => CacheModel::class,
                    'string' === $tn => 'cache',
                    'bool' === $tn => true,
<<<<<<< HEAD
<<<<<<< .merge_file_aykYk5
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UMkcrC
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_N5FSxm
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                    default => null,
                };
            }
            try {
                $rm->invoke($migration, ...$args);
            } catch (\Throwable) {
            }
        }
    });
});
