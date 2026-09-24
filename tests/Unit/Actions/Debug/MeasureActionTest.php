<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\Debug\MeasureAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\Debug\MeasureAction;
use PHPUnit\Framework\Assert;
>>>>>>> 8d801bbe (Check & fix styling)

it('measures performance', function (): void {
    $action = app(MeasureAction::class);
    $result = $action->execute(function () {
        return 'done';
    }, 'Test Measurement');

    Assert::assertSame('done', $result);
});
