<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Exceptions\Handlers\HandlersRepository;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class)->group('no-xot-db');

test('exception handlers are selected by their declared throwable type', function (): void {
<<<<<<< HEAD
    $repository = new HandlersRepository;
<<<<<<< .merge_file_R07bSe
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_8561Zw
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    $repository = new HandlersRepository;
=======
    $repository = new HandlersRepository();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    $repository = new HandlersRepository();
>>>>>>> .merge_file_hf5SNa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    $repository = new HandlersRepository();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_rLIZQp
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    $runtimeHandler = static fn (\RuntimeException $exception): string => $exception->getMessage();
    $logicHandler = static fn (\LogicException $exception): string => $exception->getMessage();
    $repository->addRenderer($runtimeHandler);
    $repository->addRenderer($logicHandler);

    $handlers = $repository->getRenderersByException(new \RuntimeException('boom'));

    expect($handlers)->toHaveCount(1)
        ->and(array_values($handlers)[0])->toBe($runtimeHandler);
});
