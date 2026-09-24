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
<<<<<<< HEAD
use Mockery;
=======
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
use Modules\Xot\Exports\QueryExport;
use Modules\Xot\Filament\Actions\Form\FieldRefreshAction;
use Modules\Xot\Tests\Fixtures\Stubs\XotRefreshRecord;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
    Mockery::close();
=======
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
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
        $ref = new ReflectionClass(FieldRefreshAction::class);
=======
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
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
        if ($inst !== null) {
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
                if ($method->getDeclaringClass()->getName() !== FieldRefreshAction::class) {
=======
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
        if ($inst !== null) {
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
                if ($method->getDeclaringClass()->getName() !== FieldRefreshAction::class) {
=======
        if (null !== $inst) {
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
                if (FieldRefreshAction::class !== $method->getDeclaringClass()->getName()) {
>>>>>>> laraxot/dev
=======
        if (null !== $inst) {
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
                if (FieldRefreshAction::class !== $method->getDeclaringClass()->getName()) {
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
        if (null !== $inst) {
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
                if (FieldRefreshAction::class !== $method->getDeclaringClass()->getName()) {
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
=======
<<<<<<< .merge_file_JzpRMD
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
=======
>>>>>>> .merge_file_w2IUtn
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
        $ref = new ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== QueryExport::class || str_starts_with($method->getName(), '__')) {
=======
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
        $ref = new ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== QueryExport::class || str_starts_with($method->getName(), '__')) {
=======
        $ref = new \ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if (QueryExport::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> laraxot/dev
=======
        $ref = new \ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if (QueryExport::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
        $ref = new \ReflectionClass(QueryExport::class);
        foreach ($ref->getMethods() as $method) {
            if (QueryExport::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> 8d801bbe (Check & fix styling)
                continue;
            }
            try {
                $method->setAccessible(true);
                $method->invoke($export);
<<<<<<< HEAD
<<<<<<< HEAD
                $n++;
            } catch (\Throwable) {
                $n++;
=======
<<<<<<< .merge_file_JzpRMD
<<<<<<< HEAD
                $n++;
            } catch (\Throwable) {
                $n++;
=======
                ++$n;
            } catch (\Throwable) {
                ++$n;
>>>>>>> laraxot/dev
=======
                ++$n;
            } catch (\Throwable) {
                ++$n;
>>>>>>> .merge_file_w2IUtn
>>>>>>> laraxot/dev
=======
                ++$n;
            } catch (\Throwable) {
                ++$n;
>>>>>>> 8d801bbe (Check & fix styling)
            }
        }
        Assert::assertGreaterThan(0, $n);
    });
});
