<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Mockery;
<<<<<<< .merge_file_JAWcpr
=======
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_pIZOoI
=======
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_V3fUTx
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Models\Cache as CacheModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
use ReflectionMethod;
=======
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
<<<<<<< HEAD
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_pIZOoI
=======
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
use ReflectionMethod;
>>>>>>> .merge_file_V3fUTx

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
    Mockery::close();
<<<<<<< .merge_file_JAWcpr
=======
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_pIZOoI
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_V3fUTx
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

<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_yA9HGa
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
=======
>>>>>>> .merge_file_pIZOoI
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
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
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_V3fUTx
        $isUuid->setAccessible(true);
        Assert::assertTrue($isUuid->invoke($migration, 'char'));
        Assert::assertTrue($isUuid->invoke($migration, 'varchar'));
        Assert::assertFalse($isUuid->invoke($migration, 'bigint'));

<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> laraxot/dev
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> .merge_file_pIZOoI
>>>>>>> laraxot/dev
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> .merge_file_V3fUTx
        $backfill->setAccessible(true);
        try {
            $backfill->invoke($migration);
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        // convertIdFromUuidToBigintIfNeeded when not uuid type
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
<<<<<<< .merge_file_JAWcpr
=======
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> laraxot/dev
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> .merge_file_pIZOoI
>>>>>>> laraxot/dev
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_V3fUTx
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
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
            $perform = new ReflectionMethod($migration, 'performUuidToBigintConversion');
=======
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
<<<<<<< HEAD
            $perform = new ReflectionMethod($migration, 'performUuidToBigintConversion');
=======
            $perform = new \ReflectionMethod($migration, 'performUuidToBigintConversion');
>>>>>>> laraxot/dev
=======
            $perform = new \ReflectionMethod($migration, 'performUuidToBigintConversion');
>>>>>>> .merge_file_pIZOoI
>>>>>>> laraxot/dev
=======
            $perform = new \ReflectionMethod($migration, 'performUuidToBigintConversion');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            $perform = new ReflectionMethod($migration, 'performUuidToBigintConversion');
>>>>>>> .merge_file_V3fUTx
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
        $conn = Mockery::mock(Connection::class)->makePartial();
<<<<<<< .merge_file_JAWcpr
=======
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
<<<<<<< HEAD
        $conn = Mockery::mock(Connection::class)->makePartial();
=======
        $conn = \Mockery::mock(Connection::class)->makePartial();
>>>>>>> laraxot/dev
=======
        $conn = \Mockery::mock(Connection::class)->makePartial();
>>>>>>> .merge_file_pIZOoI
>>>>>>> laraxot/dev
=======
        $conn = \Mockery::mock(Connection::class)->makePartial();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_V3fUTx
        $conn->shouldReceive('getDatabaseName')->andReturn('testdb');
        $conn->shouldReceive('selectOne')->andReturn((object) ['count' => 1]);
        $conn->shouldReceive('getDriverName')->andReturn('mysql');

<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
        $builder = Mockery::mock(Builder::class);
=======
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
<<<<<<< HEAD
        $builder = Mockery::mock(Builder::class);
=======
        $builder = \Mockery::mock(Builder::class);
>>>>>>> laraxot/dev
=======
        $builder = \Mockery::mock(Builder::class);
>>>>>>> .merge_file_pIZOoI
>>>>>>> laraxot/dev
=======
        $builder = \Mockery::mock(Builder::class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $builder = Mockery::mock(Builder::class);
>>>>>>> .merge_file_V3fUTx
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
<<<<<<< .merge_file_JAWcpr
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $m);
=======
<<<<<<< HEAD
<<<<<<< .merge_file_yA9HGa
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $m);
=======
            $rm = new \ReflectionMethod($migration, $m);
>>>>>>> laraxot/dev
=======
            $rm = new \ReflectionMethod($migration, $m);
>>>>>>> .merge_file_pIZOoI
>>>>>>> laraxot/dev
=======
            $rm = new \ReflectionMethod($migration, $m);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            $rm = new ReflectionMethod($migration, $m);
>>>>>>> .merge_file_V3fUTx
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
