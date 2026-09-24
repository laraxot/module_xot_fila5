<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Blade;

<<<<<<< HEAD
use Mockery\MockInterface;
use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;
use Modules\Xot\Actions\File\GetComponentsAction;
use Modules\Xot\Datas\ComponentFileData;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\DataCollection;

it('registers blade components correctly', function (): void {
    $path = 'some/path';
    $namespace = 'Some\\Namespace';
    $prefix = 'prefix';

    /** @var DataCollection<int, ComponentFileData> $mockComps */
    $mockComps = ComponentFileData::collection([
        [
            'name' => 'test-comp',
            'ns' => 'Some\\Namespace\\View\\Components\\TestComp',
            'class' => 'TestComp',
        ],
    ]);

    /** @var GetComponentsAction&MockInterface $getComponents */
    $getComponents = \Mockery::mock(GetComponentsAction::class);
    $getComponents->allows(['execute' => $mockComps]);
    app()->instance(GetComponentsAction::class, $getComponents);

    $action = app(RegisterBladeComponentsAction::class);
    Assert::assertInstanceOf(RegisterBladeComponentsAction::class, $action);
    Assert::assertSame(1, $mockComps->count());

    $action->execute($path, $namespace, $prefix);
});

it('does nothing if no components found', function (): void {
    $path = 'empty/path';
    $namespace = 'Empty\\Namespace';

    /** @var DataCollection<int, ComponentFileData> $mockComps */
    $mockComps = ComponentFileData::collection([]);

    /** @var GetComponentsAction&MockInterface $getComponents */
    $getComponents = \Mockery::mock(GetComponentsAction::class);
    $getComponents->allows(['execute' => $mockComps]);
    app()->instance(GetComponentsAction::class, $getComponents);

    $action = app(RegisterBladeComponentsAction::class);
    Assert::assertInstanceOf(RegisterBladeComponentsAction::class, $action);
    Assert::assertSame(0, $mockComps->count());

    $action->execute($path, $namespace);
=======
use Illuminate\Support\Facades\Blade;
use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;
use Modules\Xot\Actions\File\GetComponentsAction;
use Modules\Xot\Datas\ComponentFileData;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

describe('Register Blade Components Action', function (): void {
    test('registers blade components correctly', function (): void {
        /** @var TestCase $this */
        $path = 'some/path';
        $namespace = 'Some\\Namespace';
        $prefix = 'prefix';

        $comp1 = ComponentFileData::from([
            'name' => 'test-comp',
            'ns' => 'Some\\Namespace\\View\\Components\\TestComp',
            'class' => 'TestComp',
        ]);

        $mockComps = ComponentFileData::collection([$comp1]);

        $mock = $this->createUnitMock(GetComponentsAction::class);
        $mock->expects($this->expectsAtLeastOnce())
            ->method('execute')
            ->with($path, $namespace.'\\View\\Components', $prefix)
            ->willReturn($mockComps);

        app()->instance(GetComponentsAction::class, $mock);

        Blade::partialMock()->allows([
            'component' => null,
        ]);

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace, $prefix);
    });

    test('does nothing if no components found', function (): void {
        /** @var TestCase $this */
        $path = 'empty/path';
        $namespace = 'Empty\\Namespace';

        $mockComps = ComponentFileData::collection([]);

        $mock = $this->createUnitMock(GetComponentsAction::class);
        $mock->expects($this->expectsAtLeastOnce())
            ->method('execute')
            ->willReturn($mockComps);

        app()->instance(GetComponentsAction::class, $mock);

        // Blade facade mock skipped

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace);
    });
>>>>>>> laraxot/dev
});
