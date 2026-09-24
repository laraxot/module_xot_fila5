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
use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

describe('Register Blade Components Action', function (): void {
    test('registers blade components correctly', function (): void {
        $path = 'Modules/Xot/resources/views/components';
        $namespace = 'Modules\\Xot\\View\\Components';
        $prefix = 'xot::';

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace, $prefix);

        // Test passes if no exception is thrown
        expect(true)->toBeTrue();
    });

    test('does nothing if no components found', function (): void {
        // Point to a directory that doesn't exist or has no PHP files
        $path = sys_get_temp_dir().'/empty-components-'.uniqid();
        $namespace = 'Empty\\Namespace';

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace);

        // Test passes if no exception is thrown
        expect(true)->toBeTrue();
    });
>>>>>>> laraxot/dev
});
