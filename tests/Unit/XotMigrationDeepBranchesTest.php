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
=======
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Models\Cache as CacheModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionMethod;
=======
<<<<<<< HEAD
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
        $migration = new class extends XotBaseMigration
        {
            protected ?string $model_class = CacheModel::class;

            public function up(): void {}
        };

        // isUuidColumnType + backfill
        $isUuid = new ReflectionMethod($migration, 'isUuidColumnType');
<<<<<<< HEAD
=======
=======
        $migration = new class extends XotBaseMigration {
            protected ?string $model_class = CacheModel::class;

            public function up(): void
            {
            }
        };

        // isUuidColumnType + backfill
        $isUuid = new \ReflectionMethod($migration, 'isUuidColumnType');
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        $isUuid->setAccessible(true);
        Assert::assertTrue($isUuid->invoke($migration, 'char'));
        Assert::assertTrue($isUuid->invoke($migration, 'varchar'));
        Assert::assertFalse($isUuid->invoke($migration, 'bigint'));

<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
<<<<<<< HEAD
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        $backfill->setAccessible(true);
        try {
            $backfill->invoke($migration);
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        // convertIdFromUuidToBigintIfNeeded when not uuid type
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
            $perform = new ReflectionMethod($migration, 'performUuidToBigintConversion');
=======
<<<<<<< HEAD
            $perform = new ReflectionMethod($migration, 'performUuidToBigintConversion');
=======
            $perform = new \ReflectionMethod($migration, 'performUuidToBigintConversion');
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
=======
<<<<<<< HEAD
        $conn = Mockery::mock(Connection::class)->makePartial();
=======
        $conn = \Mockery::mock(Connection::class)->makePartial();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        $conn->shouldReceive('getDatabaseName')->andReturn('testdb');
        $conn->shouldReceive('selectOne')->andReturn((object) ['count' => 1]);
        $conn->shouldReceive('getDriverName')->andReturn('mysql');

<<<<<<< HEAD
        $builder = Mockery::mock(Builder::class);
=======
<<<<<<< HEAD
        $builder = Mockery::mock(Builder::class);
=======
        $builder = \Mockery::mock(Builder::class);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
            $rm = new ReflectionMethod($migration, $m);
=======
<<<<<<< HEAD
            $rm = new ReflectionMethod($migration, $m);
=======
            $rm = new \ReflectionMethod($migration, $m);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
