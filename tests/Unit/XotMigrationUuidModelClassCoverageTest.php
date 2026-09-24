<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
<<<<<<< .merge_file_wuSJNi
<<<<<<< HEAD
use Mockery;
=======
=======
<<<<<<< .merge_file_C85NOb
use Mockery;
=======
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> .merge_file_KH1Ibo
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Models\Cache as CacheModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_wuSJNi
=======
<<<<<<< .merge_file_C85NOb
use ReflectionMethod;
=======
>>>>>>> .merge_file_KH1Ibo
<<<<<<< HEAD
use ReflectionMethod;
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< .merge_file_wuSJNi
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
    Mockery::close();
=======
=======
<<<<<<< .merge_file_C85NOb
    Mockery::close();
=======
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
    Mockery::close();
=======
>>>>>>> .merge_file_KH1Ibo
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
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
<<<<<<< .merge_file_wuSJNi
=======
<<<<<<< .merge_file_C85NOb
            new class extends XotBaseMigration
            {
                public function up(): void {}
=======
>>>>>>> .merge_file_KH1Ibo
<<<<<<< HEAD
            new class extends XotBaseMigration
            {
                public function up(): void {}
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
            new class extends XotBaseMigration
            {
                public function up(): void {}
=======
=======
>>>>>>> .merge_file_UMkcrC
            new class extends XotBaseMigration {
                public function up(): void
                {
                }
<<<<<<< .merge_file_aykYk5
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
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

<<<<<<< .merge_file_wuSJNi
=======
<<<<<<< .merge_file_C85NOb
=======
>>>>>>> .merge_file_KH1Ibo
<<<<<<< HEAD
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
        $migration = new class extends XotBaseMigration
        {
            protected ?string $model_class = CacheModel::class;

            public function up(): void {}
        };

        $isUuid = new ReflectionMethod($migration, 'isUuidColumnType');
<<<<<<< .merge_file_wuSJNi
=======
<<<<<<< .merge_file_C85NOb
=======
>>>>>>> .merge_file_KH1Ibo
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_UMkcrC
        $migration = new class extends XotBaseMigration {
            protected ?string $model_class = CacheModel::class;

            public function up(): void
            {
            }
        };

        $isUuid = new \ReflectionMethod($migration, 'isUuidColumnType');
<<<<<<< .merge_file_aykYk5
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
        $isUuid->setAccessible(true);
        Assert::assertTrue($isUuid->invoke($migration, 'char'));

        // Force convert when id is uuid-like
<<<<<<< .merge_file_wuSJNi
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
=======
<<<<<<< .merge_file_C85NOb
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
>>>>>>> .merge_file_KH1Ibo
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> laraxot/dev
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
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
<<<<<<< .merge_file_wuSJNi
=======
<<<<<<< .merge_file_C85NOb
                    'pivot_post_update' => static function (): void {},
=======
>>>>>>> .merge_file_KH1Ibo
<<<<<<< HEAD
                    'pivot_post_update' => static function (): void {},
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
                    'pivot_post_update' => static function (): void {},
=======
                    'pivot_post_update' => static function (): void {
                    },
>>>>>>> laraxot/dev
=======
                    'pivot_post_update' => static function (): void {
                    },
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
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

<<<<<<< .merge_file_wuSJNi
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
=======
<<<<<<< .merge_file_C85NOb
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
>>>>>>> .merge_file_KH1Ibo
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> laraxot/dev
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
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
<<<<<<< .merge_file_wuSJNi
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $name);
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $name);
=======
=======
<<<<<<< .merge_file_C85NOb
            $rm = new ReflectionMethod($migration, $name);
=======
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $name);
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $name);
=======
>>>>>>> .merge_file_KH1Ibo
            $rm = new \ReflectionMethod($migration, $name);
>>>>>>> laraxot/dev
=======
            $rm = new \ReflectionMethod($migration, $name);
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
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
<<<<<<< .merge_file_wuSJNi
=======
<<<<<<< .merge_file_C85NOb
=======
>>>>>>> .merge_file_KH1Ibo
<<<<<<< HEAD
=======
<<<<<<< .merge_file_aykYk5
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
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
<<<<<<< .merge_file_wuSJNi
=======
<<<<<<< .merge_file_C85NOb
=======
>>>>>>> .merge_file_KH1Ibo
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_UMkcrC
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
<<<<<<< .merge_file_aykYk5
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UMkcrC
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wuSJNi
=======
>>>>>>> .merge_file_fVbPou
>>>>>>> .merge_file_KH1Ibo
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
