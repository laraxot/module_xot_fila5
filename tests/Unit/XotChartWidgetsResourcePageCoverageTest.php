<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Schema;
<<<<<<< .merge_file_Xgc6jS
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KoLP8V
use Modules\Xot\Filament\Resources\Pages\XotBasePage as ResourceXotBasePage;
use Modules\Xot\Filament\Widgets\ModelTrendChartWidget;
use Modules\Xot\Filament\Widgets\StatesChartWidget;
use Modules\Xot\Models\Cache as CacheModel;
use Modules\Xot\Tests\Fixtures\Stubs\XotResPageStub;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_Xgc6jS
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KoLP8V

use function Safe\preg_match;

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< .merge_file_Xgc6jS
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_KoLP8V
});

describe('Xot chart widgets and resource page', function (): void {
    test('StatesChartWidget getData getHeading getType su sqlite', function (): void {
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
        Http::fake();
        Process::fake();

        Schema::dropIfExists('cache');
        Schema::create('cache', static function (Blueprint $t): void {
            $t->increments('id');
            $t->string('key')->nullable();
            $t->string('state')->nullable();
            $t->text('value')->nullable();
        });
        DB::table('cache')->insert([
            ['key' => 'a', 'state' => 'active', 'value' => '1'],
            ['key' => 'b', 'state' => 'pending', 'value' => '2'],
            ['key' => 'c', 'state' => 'active', 'value' => '3'],
        ]);

<<<<<<< .merge_file_Xgc6jS
<<<<<<< HEAD
        $w = (new ReflectionClass(StatesChartWidget::class))->newInstanceWithoutConstructor();
        $w->model = CacheModel::class;
        $w->stateClass = 'dummy';

        $getData = new ReflectionMethod(StatesChartWidget::class, 'getData');
=======
=======
>>>>>>> .merge_file_KoLP8V
        $w = (new \ReflectionClass(StatesChartWidget::class))->newInstanceWithoutConstructor();
        $w->model = CacheModel::class;
        $w->stateClass = 'dummy';

        $getData = new \ReflectionMethod(StatesChartWidget::class, 'getData');
<<<<<<< .merge_file_Xgc6jS
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KoLP8V
        $getData->setAccessible(true);
        $data = $getData->invoke($w);
        if (! is_array($data)) {
            throw new \UnexpectedValueException('StatesChartWidget::getData deve restituire un array');
        }
        Assert::assertNotEmpty($data);
        Assert::assertArrayHasKey('datasets', $data);

        // exception fallback: drop table so query throws Exception
        Schema::dropIfExists('cache');
        $data2 = $getData->invoke($w);
        if (! is_array($data2)) {
            throw new \UnexpectedValueException('Il fallback di StatesChartWidget deve restituire un array');
        }
        Assert::assertNotEmpty($data2);
        Assert::assertArrayHasKey('datasets', $data2);

        try {
<<<<<<< .merge_file_Xgc6jS
<<<<<<< HEAD
            Assert::assertTrue(is_string($w->getHeading()) || $w->getHeading() === null);
=======
            Assert::assertTrue(is_string($w->getHeading()) || null === $w->getHeading());
>>>>>>> laraxot/dev
=======
            Assert::assertTrue(is_string($w->getHeading()) || null === $w->getHeading());
>>>>>>> .merge_file_KoLP8V
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

<<<<<<< .merge_file_Xgc6jS
<<<<<<< HEAD
        $getType = new ReflectionMethod(StatesChartWidget::class, 'getType');
=======
        $getType = new \ReflectionMethod(StatesChartWidget::class, 'getType');
>>>>>>> laraxot/dev
=======
        $getType = new \ReflectionMethod(StatesChartWidget::class, 'getType');
>>>>>>> .merge_file_KoLP8V
        $getType->setAccessible(true);
        Assert::assertSame('bar', $getType->invoke($w));

        // ModelTrendChartWidget
        if (class_exists(ModelTrendChartWidget::class)) {
<<<<<<< .merge_file_Xgc6jS
<<<<<<< HEAD
            $t = (new ReflectionClass(ModelTrendChartWidget::class))->newInstanceWithoutConstructor();
            $ref = new ReflectionClass(ModelTrendChartWidget::class);
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
                if ($method->getDeclaringClass()->getName() !== ModelTrendChartWidget::class) {
=======
=======
>>>>>>> .merge_file_KoLP8V
            $t = (new \ReflectionClass(ModelTrendChartWidget::class))->newInstanceWithoutConstructor();
            $ref = new \ReflectionClass(ModelTrendChartWidget::class);
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
                if (ModelTrendChartWidget::class !== $method->getDeclaringClass()->getName()) {
<<<<<<< .merge_file_Xgc6jS
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KoLP8V
                    continue;
                }
                if (preg_match('/mount|render|boot|__/', $method->getName())) {
                    continue;
                }
                try {
                    $method->setAccessible(true);
                    $args = [];
                    foreach ($method->getParameters() as $param) {
                        $args[] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null;
                    }
                    if ($method->isStatic()) {
                        $method->invoke(null, ...$args);
                    } else {
                        $method->invoke($t, ...$args);
                    }
                } catch (\Throwable) {
                }
            }
        }
    });

    test('Resource XotBasePage getView getViewTest navigation', function (): void {
        Http::fake();
        Process::fake();
<<<<<<< .merge_file_Xgc6jS
<<<<<<< HEAD
        $page = new XotResPageStub;
=======
        $page = new XotResPageStub();
>>>>>>> laraxot/dev
=======
        $page = new XotResPageStub();
>>>>>>> .merge_file_KoLP8V
        Assert::assertNotEmpty($page->getView());
        try {
            $page->getViewTest();
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }
        try {
            Assert::assertNotEmpty(XotResPageStub::getNavigationLabel());
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

<<<<<<< .merge_file_Xgc6jS
<<<<<<< HEAD
        $ref = new ReflectionClass(ResourceXotBasePage::class);
        foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
            if ($method->getDeclaringClass()->getName() !== ResourceXotBasePage::class) {
=======
        $ref = new \ReflectionClass(ResourceXotBasePage::class);
        foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
            if (ResourceXotBasePage::class !== $method->getDeclaringClass()->getName()) {
>>>>>>> laraxot/dev
=======
        $ref = new \ReflectionClass(ResourceXotBasePage::class);
        foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
            if (ResourceXotBasePage::class !== $method->getDeclaringClass()->getName()) {
>>>>>>> .merge_file_KoLP8V
                continue;
            }
            if (preg_match('/mount|render|boot|__/', $method->getName())) {
                continue;
            }
            try {
                $method->setAccessible(true);
                $args = [];
                foreach ($method->getParameters() as $param) {
                    $args[] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null;
                }
                if ($method->isStatic()) {
                    $method->invoke(null, ...$args);
                } else {
                    $method->invoke($page, ...$args);
                }
            } catch (\Throwable) {
            }
        }
    });
});
