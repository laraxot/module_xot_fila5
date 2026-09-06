<?php

declare(strict_types=1);

use Modules\Xot\Tests\TestCase;
use Modules\Xot\ValueObjects\EmailValueObject;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

it('accepts valid email', function (): void {
    $email = 'test@example.com';
    $vo = new EmailValueObject($email);
    Assert::assertSame($email, $vo->email);
});

it('throws on invalid email')->todo();
