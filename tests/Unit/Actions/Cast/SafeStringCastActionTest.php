<?php

declare(strict_types=1);

use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

it('casts various values to string correctly', function (): void {
    $action = app(SafeStringCastAction::class);

    Assert::assertSame('test', $action->execute('test'));
    Assert::assertSame('', $action->execute(null));
    Assert::assertSame('1', $action->execute(true));
    Assert::assertSame('0', $action->execute(false));
    Assert::assertSame('123', $action->execute(123));
    Assert::assertSame('1.23', $action->execute(1.23));
    // Non-scalar
    Assert::assertSame('', $action->execute(['a']));
<<<<<<< HEAD
    Assert::assertSame('', $action->execute(new stdClass));
=======
    Assert::assertSame('', $action->execute(new stdClass()));
>>>>>>> 7f6cf6be (.)
});

it('uses static string cast method correctly', function (): void {
    Assert::assertSame('456', SafeStringCastAction::cast(456));
});
