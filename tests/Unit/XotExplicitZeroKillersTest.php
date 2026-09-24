<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Actions\Route\BuildActionUrlAction;
use Modules\Xot\Console\Commands\AnalyzeComponentsCommand;
use Modules\Xot\Datas\RouteParamsData;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class)->group('no-xot-db');

test('action URLs fall back to an explicit fragment outside a route', function (): void {
    $params = RouteParamsData::from(['act' => 'edit']);

    /** @var array<string, mixed> $paramsArray */
    $paramsArray = $params->toArray();

<<<<<<< HEAD
    expect((new BuildActionUrlAction)->execute($paramsArray))->toBe('#edit');
<<<<<<< .merge_file_1fdEVl
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_DqOtoL
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    expect((new BuildActionUrlAction)->execute($paramsArray))->toBe('#edit');
=======
    expect((new BuildActionUrlAction())->execute($paramsArray))->toBe('#edit');
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    expect((new BuildActionUrlAction())->execute($paramsArray))->toBe('#edit');
>>>>>>> .merge_file_39Ae58
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    expect((new BuildActionUrlAction())->execute($paramsArray))->toBe('#edit');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Zj17qi
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
});

test('component analyzer exposes its supported filters', function (): void {
    $definition = app(AnalyzeComponentsCommand::class)->getDefinition();

    expect($definition->hasOption('module'))->toBeTrue()
        ->and($definition->hasOption('type'))->toBeTrue()
        ->and($definition->hasOption('prefix'))->toBeTrue()
        ->and($definition->hasOption('force'))->toBeTrue();
});
