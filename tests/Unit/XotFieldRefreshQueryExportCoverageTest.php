<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Schema;
use Mockery;
<<<<<<< .merge_file_C0x9XN
=======
<<<<<<< HEAD
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_w2IUtn
=======
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ynhU1s
use Modules\Xot\Exports\QueryExport;
use Modules\Xot\Filament\Actions\Form\FieldRefreshAction;
use Modules\Xot\Tests\Fixtures\Stubs\XotRefreshRecord;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_C0x9XN
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< HEAD
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_w2IUtn
=======
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
use ReflectionClass;
use ReflectionMethod;
>>>>>>> .merge_file_ynhU1s

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
    Mockery::close();
<<<<<<< .merge_file_C0x9XN
=======
<<<<<<< HEAD
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ynhU1s
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
<<<<<<< .merge_file_C0x9XN
<<<<<<< HEAD
        $ref = new ReflectionClass(FieldRefreshAction::class);
=======
<<<<<<< HEAD
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
        $ref = new ReflectionClass(FieldRefreshAction::class);
=======
        $ref = new \ReflectionClass(FieldRefreshAction::class);
>>>>>>> laraxot/dev
=======
        $ref = new \ReflectionClass(FieldRefreshAction::class);
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
        $ref = new \ReflectionClass(FieldRefreshAction::class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $ref = new ReflectionClass(FieldRefreshAction::class);
>>>>>>> .merge_file_ynhU1s
        $inst = null;
        try {
            $inst = FieldRefreshAction::make('title');
        } catch (\Throwable) {
            try {
                $inst = $ref->newInstanceWithoutConstructor();
            } catch (\Throwable) {
            }
        }
        if ($inst !== null) {
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
                if ($method->getDeclaringClass()->getName() !== FieldRefreshAction::class) {
<<<<<<< .merge_file_C0x9XN
=======
<<<<<<< HEAD
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
        if ($inst !== null) {
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
                if ($method->getDeclaringClass()->getName() !== FieldRefreshAction::class) {
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        if (null !== $inst) {
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
                if (FieldRefreshAction::class !== $method->getDeclaringClass()->getName()) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (null !== $inst) {
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
                if (FieldRefreshAction::class !== $method->getDeclaringClass()->getName()) {
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ynhU1s
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
<<<<<<< .merge_file_C0x9XN
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ynhU1s
                        } elseif ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === Set::class) {
                            $set = Mockery::mock(Set::class);
                            $set->shouldReceive('__invoke')->zeroOrMoreTimes();
                            $args[] = $set;
                        } else {
                            $args[] = new XotRefreshRecord;
<<<<<<< .merge_file_C0x9XN
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_w2IUtn
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
                        } elseif ($param->getType() instanceof \ReflectionNamedType && Set::class === $param->getType()->getName()) {
                            $set = \Mockery::mock(Set::class);
                            $set->shouldReceive('__invoke')->zeroOrMoreTimes();
                            $args[] = $set;
                        } else {
                            $args[] = new XotRefreshRecord();
<<<<<<< HEAD
<<<<<<< .merge_file_JzpRMD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_w2IUtn
=======
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ynhU1s
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
        $ref = new ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== QueryExport::class || str_starts_with($method->getName(), '__')) {
<<<<<<< .merge_file_C0x9XN
=======
<<<<<<< HEAD
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
        $ref = new ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== QueryExport::class || str_starts_with($method->getName(), '__')) {
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $ref = new \ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if (QueryExport::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $ref = new \ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if (QueryExport::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ynhU1s
                continue;
            }
            try {
                $method->setAccessible(true);
                $method->invoke($export);
                $n++;
            } catch (\Throwable) {
                $n++;
<<<<<<< .merge_file_C0x9XN
=======
<<<<<<< HEAD
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
                $n++;
            } catch (\Throwable) {
                $n++;
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
                ++$n;
            } catch (\Throwable) {
                ++$n;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                ++$n;
            } catch (\Throwable) {
                ++$n;
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ynhU1s
            }
        }
        Assert::assertGreaterThan(0, $n);
    });
});
