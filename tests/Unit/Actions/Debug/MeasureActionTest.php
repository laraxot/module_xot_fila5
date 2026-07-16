<?php

declare(strict_types=1);

uses(TestCase::class);
use Modules\Xot\Actions\Debug\MeasureAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

it('measures performance', function (): void {
    $action = app(MeasureAction::class);
    $result = $action->execute(function () {
        return 'done';
    }, 'Test Measurement');

    Assert::assertSame('done', $result);
});
