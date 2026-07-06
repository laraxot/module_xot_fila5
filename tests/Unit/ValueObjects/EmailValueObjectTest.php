<?php

declare(strict_types=1);

use Modules\Xot\ValueObjects\EmailValueObject;
use PHPUnit\Framework\Assert;
uses(Modules\Xot\Tests\TestCase::class);

it('accepts valid email', function (): void {
    $email = 'test@example.com';
    $vo = new EmailValueObject($email);
    expect($vo->email)->toBe($email);
});

it('throws on invalid email', function (): void {
    expect(fn () => new EmailValueObject('invalid-email'))
        ->toThrow(\InvalidArgumentException::class, 'Email address invalid-email is NOT valid.');
});
