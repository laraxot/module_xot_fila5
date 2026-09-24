<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeNullableStringCastAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\Cast\SafeNullableStringCastAction;
use PHPUnit\Framework\Assert;
>>>>>>> 3792da0d (Check & fix styling)

it('casts nullable string values consistently', function (): void {
    $action = app(SafeNullableStringCastAction::class);

    Assert::assertSame('test', $action->execute('test'));
    Assert::assertSame('123', $action->execute(123));
    Assert::assertSame('1', $action->execute(true));
    Assert::assertNull($action->execute(null));
    Assert::assertNull($action->execute([]));
<<<<<<< .merge_file_TxfcH6
<<<<<<< HEAD
<<<<<<< HEAD
    Assert::assertNull($action->execute(new stdClass));
=======
    Assert::assertNull($action->execute(new stdClass()));
>>>>>>> laraxot/dev
=======
    Assert::assertNull($action->execute(new stdClass()));
>>>>>>> 3792da0d (Check & fix styling)
=======
    Assert::assertNull($action->execute(new stdClass));
>>>>>>> .merge_file_Yqv6dZ
});

it('uses static nullable string cast method correctly', function (): void {
    Assert::assertSame('456', SafeNullableStringCastAction::cast(456));
    Assert::assertNull(SafeNullableStringCastAction::cast(null));
});
