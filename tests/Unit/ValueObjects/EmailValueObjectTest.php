<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use Modules\Xot\ValueObjects\EmailValueObject;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\ValueObjects\EmailValueObject;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
it('accepts valid email', function (): void {
    $email = 'test@example.com';
    $vo = new EmailValueObject($email);
    Assert::assertSame($email, $vo->email);
});

<<<<<<< HEAD
it('throws on invalid email')->todo();
=======
it('throws on invalid email', function (): void {
});
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
