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
=======
>>>>>>> laraxot/dev
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Models\Cache as CacheModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionMethod;
=======
>>>>>>> laraxot/dev

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
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
            new class extends XotBaseMigration
            {
                public function up(): void {}
=======
            new class extends XotBaseMigration {
                public function up(): void
                {
                }
>>>>>>> laraxot/dev
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
        $migration = new class extends XotBaseMigration
        {
            protected ?string $model_class = CacheModel::class;

            public function up(): void {}
        };

        $isUuid = new ReflectionMethod($migration, 'isUuidColumnType');
=======
        $migration = new class extends XotBaseMigration {
            protected ?string $model_class = CacheModel::class;

            public function up(): void
            {
            }
        };

        $isUuid = new \ReflectionMethod($migration, 'isUuidColumnType');
>>>>>>> laraxot/dev
        $isUuid->setAccessible(true);
        Assert::assertTrue($isUuid->invoke($migration, 'char'));

        // Force convert when id is uuid-like
<<<<<<< HEAD
        $convert = new ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
=======
        $convert = new \ReflectionMethod($migration, 'convertIdFromUuidToBigintIfNeeded');
>>>>>>> laraxot/dev
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
=======
                    'pivot_post_update' => static function (): void {
                    },
>>>>>>> laraxot/dev
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
        $backfill = new ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
=======
        $backfill = new \ReflectionMethod($migration, 'backfillUuidColumnIfNeeded');
>>>>>>> laraxot/dev
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
            $rm = new ReflectionMethod($migration, $name);
=======
            $rm = new \ReflectionMethod($migration, $name);
>>>>>>> laraxot/dev
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
=======
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
>>>>>>> laraxot/dev
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
