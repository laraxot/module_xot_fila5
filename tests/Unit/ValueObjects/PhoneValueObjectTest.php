<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use Modules\Xot\ValueObjects\PhoneValueObject;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\ValueObjects\PhoneValueObject;
use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
it('accepts valid phone', function (): void {
    $phone = '+11234567890';
    $vo = PhoneValueObject::fromString($phone);
    Assert::assertSame($phone, $vo->toString());
});

<<<<<<< HEAD
it('throws on invalid phone')->todo();
=======
it('throws on invalid phone', function (): void {
});
>>>>>>> laraxot/dev
