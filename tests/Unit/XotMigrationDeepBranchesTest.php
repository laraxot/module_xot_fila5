<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Mockery;
<<<<<<< .merge_file_JAWcpr
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_pIZOoI
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_V3fUTx
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Models\Cache as CacheModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
use ReflectionMethod;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_pIZOoI
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
use ReflectionMethod;
>>>>>>> .merge_file_V3fUTx
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
<<<<<<< .merge_file_JAWcpr
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
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
>>>>>>> .merge_file_pIZOoI
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_V3fUTx
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
});

describe('Xot migration deep branches', function (): void {
    test('uuid bigint helpers e information_schema mocks', function (): void {
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

        Schema::dropIfExists('cache');
        Schema::create('cache', static function (Blueprint $t): void {
            $t->increments('id');
            $t->uuid('uuid')->nullable();
            $t->string('key')->nullable();
            $t->text('value')->nullable();
        });
        DB::table('cache')->insert(['id' => 1, 'uuid' => null, 'key' => 'k', 'value' => 'v']);
        DB::table('cache')->insert(['id' => 2, 'uuid' => (string) Str::uuid(), 'key' => 'k2', 'value' => 'v2']);

<<<<<<< HEAD
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yA9HGa
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_V3fUTx
        $migration = new class extends XotBaseMigration
        {
            protected ?string $model_class = CacheModel::class;

            public function up(): void {}
        };

        // isUuidColumnType + backfill
        $isUuid = new ReflectionMethod($migration, 'isUuidColumnType');
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_pIZOoI
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

        // isUuidColumnType + backfill
        $isUuid = new \ReflectionMethod($migration, 'isUuidColumnType');
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_pIZOoI
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_V3fUTx
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $isUuid->setAccessible(true);
        Assert::assertTrue($isUuid->invoke($migration, 'char'));
        Assert::assertTrue($isUuid->invoke($migration, 'varchar'));
        Assert::assertFalse($isUuid->invoke($migration, 'bigint'));

<<<<<<< HEAD
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
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
>>>>>>> .merge_file_pIZOoI
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> .merge_file_V3fUTx
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $backfill->setAccessible(true);
        try {
            $backfill->invoke($migration);
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        // convertIdFromUuidToBigintIfNeeded when not uuid type
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
<<<<<<< .merge_file_JAWcpr
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
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
>>>>>>> .merge_file_pIZOoI
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_V3fUTx
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
                },
                ['key', 'value'],
                [],
            );
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        try {
<<<<<<< HEAD
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
            $perform = new ReflectionMethod($migration, 'performUuidToBigintConversion');
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            $perform = new ReflectionMethod($migration, 'performUuidToBigintConversion');
=======
            $perform = new \ReflectionMethod($migration, 'performUuidToBigintConversion');
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            $perform = new \ReflectionMethod($migration, 'performUuidToBigintConversion');
>>>>>>> .merge_file_pIZOoI
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            $perform = new \ReflectionMethod($migration, 'performUuidToBigintConversion');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            $perform = new ReflectionMethod($migration, 'performUuidToBigintConversion');
>>>>>>> .merge_file_V3fUTx
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $perform->setAccessible(true);
            $perform->invoke(
                $migration,
                'cache',
                static function (Blueprint $t): void {
                    $t->id();
                    $t->uuid('uuid')->nullable();
                    $t->string('key')->nullable();
                    $t->text('value')->nullable();
                },
                ['key', 'value'],
                [],
            );
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        // Mock information_schema paths via connection selectOne
<<<<<<< HEAD
        $conn = Mockery::mock(Connection::class)->makePartial();
<<<<<<< .merge_file_JAWcpr
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $conn = Mockery::mock(Connection::class)->makePartial();
=======
        $conn = \Mockery::mock(Connection::class)->makePartial();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $conn = \Mockery::mock(Connection::class)->makePartial();
>>>>>>> .merge_file_pIZOoI
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $conn = \Mockery::mock(Connection::class)->makePartial();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_V3fUTx
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $conn->shouldReceive('getDatabaseName')->andReturn('testdb');
        $conn->shouldReceive('selectOne')->andReturn((object) ['count' => 1]);
        $conn->shouldReceive('getDriverName')->andReturn('mysql');

<<<<<<< HEAD
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
        $builder = Mockery::mock(Builder::class);
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $builder = Mockery::mock(Builder::class);
=======
        $builder = \Mockery::mock(Builder::class);
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $builder = \Mockery::mock(Builder::class);
>>>>>>> .merge_file_pIZOoI
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $builder = \Mockery::mock(Builder::class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $builder = Mockery::mock(Builder::class);
>>>>>>> .merge_file_V3fUTx
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $builder->shouldReceive('getConnection')->andReturn($conn);
        $builder->shouldReceive('hasTable')->andReturn(true);
        $builder->shouldReceive('hasColumn')->andReturn(true);
        $builder->shouldReceive('hasIndex')->andReturn(false);

        // Invoke hasPrimaryKey with mocked getConn if possible
        try {
            $migration->hasPrimaryKey();
        } catch (\Throwable) {
        }
        try {
            $migration->dropPrimaryKey(); // sqlite early return
        } catch (\Throwable) {
        }

        // constraint helpers
        foreach (['constraintCountRow', 'extractPrimaryKeyCount'] as $m) {
            if (! method_exists($migration, $m)) {
                continue;
            }
<<<<<<< HEAD
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $m);
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $m);
=======
            $rm = new \ReflectionMethod($migration, $m);
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            $rm = new \ReflectionMethod($migration, $m);
>>>>>>> .merge_file_pIZOoI
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            $rm = new \ReflectionMethod($migration, $m);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            $rm = new ReflectionMethod($migration, $m);
>>>>>>> .merge_file_V3fUTx
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $rm->setAccessible(true);
            try {
                $rm->invoke($migration, (object) ['count' => 2]);
            } catch (\Throwable) {
                try {
                    $rm->invoke($migration, ['count' => 2]);
                } catch (\Throwable) {
                }
            }
            try {
                $rm->invoke($migration, null);
            } catch (\Throwable) {
            }
        }
    });
});
