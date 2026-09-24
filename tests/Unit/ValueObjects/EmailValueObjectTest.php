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

>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev
