<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Blade;

use Illuminate\Support\Facades\Blade;
use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;
use Modules\Xot\Actions\File\GetComponentsAction;
use Modules\Xot\Datas\ComponentFileData;
use Modules\Xot\Tests\TestCase;

class RegisterBladeComponentsActionTest extends TestCase
{
    public function testRegistersBladeComponentsCorrectly(): void
    {
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
        $mock->expects($this->once())
            ->method('execute')
            ->with($path, $namespace.'\\View\\Components', $prefix)
            ->willReturn($mockComps);

        app()->instance(GetComponentsAction::class, $mock);

        Blade::partialMock()->allows([
            'component' => null,
        ]);

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace, $prefix);
    }

    public function testDoesNothingIfNoComponentsFound(): void
    {
        $path = 'empty/path';
        $namespace = 'Empty\\Namespace';

        $mockComps = ComponentFileData::collection([]);

        $mock = $this->createUnitMock(GetComponentsAction::class);
        $mock->expects($this->once())
            ->method('execute')
            ->willReturn($mockComps);

        app()->instance(GetComponentsAction::class, $mock);

        // Blade facade mock skipped

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace);
    }
}
