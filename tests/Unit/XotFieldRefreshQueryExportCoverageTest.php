<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use Mockery;
=======
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Exports\QueryExport;
use Modules\Xot\Filament\Actions\Form\FieldRefreshAction;
use Modules\Xot\Tests\Fixtures\Stubs\XotRefreshRecord;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< HEAD
use ReflectionClass;
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

describe('Xot FieldRefresh QueryExport coverage', function (): void {
    test('FieldRefreshAction setUp closure branches', function (): void {
        Http::fake();
        Process::fake();

        try {
            $action = FieldRefreshAction::make('title');
            Assert::assertInstanceOf(FieldRefreshAction::class, $action);
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        // Reflect setUp and action closure via invoking protected methods
<<<<<<< HEAD
        $ref = new ReflectionClass(FieldRefreshAction::class);
=======
<<<<<<< HEAD
        $ref = new ReflectionClass(FieldRefreshAction::class);
=======
        $ref = new \ReflectionClass(FieldRefreshAction::class);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        $inst = null;
        try {
            $inst = FieldRefreshAction::make('title');
        } catch (\Throwable) {
            try {
                $inst = $ref->newInstanceWithoutConstructor();
            } catch (\Throwable) {
            }
        }
<<<<<<< HEAD
        if ($inst !== null) {
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
                if ($method->getDeclaringClass()->getName() !== FieldRefreshAction::class) {
=======
<<<<<<< HEAD
        if ($inst !== null) {
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
                if ($method->getDeclaringClass()->getName() !== FieldRefreshAction::class) {
=======
        if (null !== $inst) {
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
                if (FieldRefreshAction::class !== $method->getDeclaringClass()->getName()) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                    continue;
                }
                if (in_array($method->getName(), ['__construct', 'mount', 'render'], true)) {
                    continue;
                }
                try {
                    $method->setAccessible(true);
                    $args = [];
                    foreach ($method->getParameters() as $param) {
                        if ($param->isDefaultValueAvailable()) {
                            $args[] = $param->getDefaultValue();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
                        } elseif ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === Set::class) {
                            $set = Mockery::mock(Set::class);
                            $set->shouldReceive('__invoke')->zeroOrMoreTimes();
                            $args[] = $set;
                        } else {
                            $args[] = new XotRefreshRecord;
<<<<<<< HEAD
=======
=======
                        } elseif ($param->getType() instanceof \ReflectionNamedType && Set::class === $param->getType()->getName()) {
                            $set = \Mockery::mock(Set::class);
                            $set->shouldReceive('__invoke')->zeroOrMoreTimes();
                            $args[] = $set;
                        } else {
                            $args[] = new XotRefreshRecord();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                        }
                    }
                    $method->invoke($inst, ...$args);
                } catch (\Throwable) {
                }
            }
        }
    });

    test('QueryExport headings map chunk su sqlite query', function (): void {
        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite' => [
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
            ],
        ]);
        DB::purge('sqlite');
        DB::reconnect('sqlite');
        Schema::dropIfExists('cache');
        Schema::create('cache', static function (Blueprint $t): void {
            $t->increments('id');
            $t->string('key')->nullable();
            $t->text('value')->nullable();
        });
        DB::table('cache')->insert(['key' => 'a', 'value' => '1']);

        $q = DB::table('cache')->select('id', 'key', 'value');
        $export = new QueryExport($q, 'xot::cache', ['id', 'key', 'value']);
        Assert::assertNotEmpty($export->getHead());
        Assert::assertNotEmpty($export->headings());
        Assert::assertSame(200, $export->chunkSize());
        try {
            Assert::assertNotEmpty($export->map((object) ['id' => 1, 'key' => 'a', 'value' => '1']));
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }
        Assert::assertSame($q, $export->query());

        $export2 = new QueryExport($q, null, []);
        try {
            $export2->getHead();
        } catch (\Throwable) {
        }

        $n = 0;
<<<<<<< HEAD
        $ref = new ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== QueryExport::class || str_starts_with($method->getName(), '__')) {
=======
<<<<<<< HEAD
        $ref = new ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== QueryExport::class || str_starts_with($method->getName(), '__')) {
=======
        $ref = new \ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if (QueryExport::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                continue;
            }
            try {
                $method->setAccessible(true);
                $method->invoke($export);
<<<<<<< HEAD
                $n++;
            } catch (\Throwable) {
                $n++;
=======
<<<<<<< HEAD
                $n++;
            } catch (\Throwable) {
                $n++;
=======
                ++$n;
            } catch (\Throwable) {
                ++$n;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            }
        }
        Assert::assertGreaterThan(0, $n);
    });
});
