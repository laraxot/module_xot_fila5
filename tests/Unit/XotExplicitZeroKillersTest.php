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

<<<<<<< .merge_file_gVSfHs
<<<<<<< HEAD
    expect((new BuildActionUrlAction)->execute($paramsArray))->toBe('#edit');
=======
=======
<<<<<<< .merge_file_AKtFjk
    expect((new BuildActionUrlAction)->execute($paramsArray))->toBe('#edit');
=======
<<<<<<< HEAD
    expect((new BuildActionUrlAction)->execute($paramsArray))->toBe('#edit');
=======
>>>>>>> .merge_file_SkXkNa
<<<<<<< .merge_file_DqOtoL
<<<<<<< HEAD
    expect((new BuildActionUrlAction)->execute($paramsArray))->toBe('#edit');
=======
    expect((new BuildActionUrlAction())->execute($paramsArray))->toBe('#edit');
>>>>>>> laraxot/dev
=======
    expect((new BuildActionUrlAction())->execute($paramsArray))->toBe('#edit');
>>>>>>> .merge_file_39Ae58
>>>>>>> laraxot/dev
<<<<<<< .merge_file_gVSfHs
=======
>>>>>>> .merge_file_98dWbt
>>>>>>> .merge_file_SkXkNa
});

test('component analyzer exposes its supported filters', function (): void {
    $definition = app(AnalyzeComponentsCommand::class)->getDefinition();

    expect($definition->hasOption('module'))->toBeTrue()
        ->and($definition->hasOption('type'))->toBeTrue()
        ->and($definition->hasOption('prefix'))->toBeTrue()
        ->and($definition->hasOption('force'))->toBeTrue();
});
