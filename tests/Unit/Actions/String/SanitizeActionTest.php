<?php

declare(strict_types=1);

use Modules\Xot\Actions\String\SanitizeAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

it('sanitizes strings correctly', function (): void {
    $action = app(SanitizeAction::class);

    $input = " <script>alert('xss')</script> <b>Hello</b> &amp; Welcome! ";
    $expected = "alert('xss') Hello & Welcome!";

    Assert::assertSame($expected, $action->execute($input));
});
