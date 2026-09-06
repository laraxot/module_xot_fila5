<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Actions\Route\BuildActionUrlAction;
use Modules\Xot\Console\Commands\AnalyzeComponentsCommand;
use Modules\Xot\Datas\RouteParamsData;
use Modules\Xot\Tests\TestCase;

<<<<<<< HEAD
uses(TestCase::class)->group('no-xot-db');
=======
uses(\Modules\Xot\Tests\TestCase::class)->group('no-xot-db');
>>>>>>> 7f6cf6be (.)

test('action URLs fall back to an explicit fragment outside a route', function (): void {
    $params = RouteParamsData::from(['act' => 'edit']);

    /** @var array<string, mixed> $paramsArray */
    $paramsArray = $params->toArray();

<<<<<<< HEAD
    expect((new BuildActionUrlAction)->execute($paramsArray))->toBe('#edit');
=======
    expect((new BuildActionUrlAction())->execute($paramsArray))->toBe('#edit');
>>>>>>> 7f6cf6be (.)
});

test('component analyzer exposes its supported filters', function (): void {
    $definition = app(AnalyzeComponentsCommand::class)->getDefinition();

    expect($definition->hasOption('module'))->toBeTrue()
        ->and($definition->hasOption('type'))->toBeTrue()
        ->and($definition->hasOption('prefix'))->toBeTrue()
        ->and($definition->hasOption('force'))->toBeTrue();
});
