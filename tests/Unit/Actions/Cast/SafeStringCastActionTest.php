<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use PHPUnit\Framework\Assert;
>>>>>>> 3792da0d (Check & fix styling)

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
<<<<<<< .merge_file_AKtZ2L
<<<<<<< HEAD
<<<<<<< HEAD
    Assert::assertSame('', $action->execute(new stdClass));
=======
    Assert::assertSame('', $action->execute(new stdClass()));
>>>>>>> laraxot/dev
=======
    Assert::assertSame('', $action->execute(new stdClass()));
>>>>>>> 3792da0d (Check & fix styling)
=======
    Assert::assertSame('', $action->execute(new stdClass));
>>>>>>> .merge_file_Yq2Yr7
});

it('uses static string cast method correctly', function (): void {
    Assert::assertSame('456', SafeStringCastAction::cast(456));
});
