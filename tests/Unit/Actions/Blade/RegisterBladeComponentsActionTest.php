<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Blade;

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
    });

    test('does nothing if no components found', function (): void {
        /** @var TestCase $this */
        $path = 'empty/path';
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
    });
});
