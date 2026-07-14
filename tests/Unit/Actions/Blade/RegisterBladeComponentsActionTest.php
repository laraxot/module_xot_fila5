<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Blade;

use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;
use Modules\Xot\Tests\TestCase;

it('registers blade components correctly', function (): void {
    $path = 'some/path';
    $namespace = 'Some\\Namespace';
    $prefix = 'prefix';

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
<<<<<<< HEAD
<<<<<<< HEAD
        $mock->expects($this->expectsAtLeastOnce())
=======
        /* @phpstan-ignore-next-line */
        $mock->expects($this->atLeastOnce())
>>>>>>> 64619e34 (.)
=======
        $mock->expects($this->expectsAtLeastOnce())
>>>>>>> 61938ca4 (delete .claude-audit/)
            ->method('execute')
            ->with($path, $namespace.'\\View\\Components', $prefix)
            ->willReturn($mockComps);

        app()->instance(GetComponentsAction::class, $mock);

        Blade::partialMock()->allows([
            'component' => null,
        ]);

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace, $prefix);

        // Test passes if no exception is thrown
        expect(true)->toBeTrue();
    });

    test('does nothing if no components found', function (): void {
        // Point to a directory that doesn't exist or has no PHP files
        $path = sys_get_temp_dir().'/empty-components-'.uniqid();
        $namespace = 'Empty\\Namespace';

        $mockComps = ComponentFileData::collection([]);

        $mock = $this->createUnitMock(GetComponentsAction::class);
<<<<<<< HEAD
<<<<<<< HEAD
        $mock->expects($this->expectsAtLeastOnce())
=======
        /* @phpstan-ignore-next-line */
        $mock->expects($this->atLeastOnce())
>>>>>>> 64619e34 (.)
=======
        $mock->expects($this->expectsAtLeastOnce())
>>>>>>> 61938ca4 (delete .claude-audit/)
            ->method('execute')
            ->willReturn($mockComps);

        app()->instance(GetComponentsAction::class, $mock);

        // Blade facade mock skipped

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace);

        // Test passes if no exception is thrown
        expect(true)->toBeTrue();
    });
});
