<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Modules\Xot\Rules\DateTimeRule;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class)->group('no-xot-db');
=======
uses(\Modules\Xot\Tests\TestCase::class)->group('no-xot-db');
>>>>>>> 7f6cf6be (.)

test('DateTimeRule accepts the documented day month year format', function (): void {
    $validator = Validator::make(
        ['published_at' => '10/10/2019 13:43'],
<<<<<<< HEAD
        ['published_at' => [new DateTimeRule]],
=======
        ['published_at' => [new DateTimeRule()]],
>>>>>>> 7f6cf6be (.)
    );

    Assert::assertFalse($validator->fails());
});

$rejectsInvalidDateTime = function (mixed $value): void {
    $validator = Validator::make(
        ['published_at' => $value],
<<<<<<< HEAD
        ['published_at' => [new DateTimeRule]],
=======
        ['published_at' => [new DateTimeRule()]],
>>>>>>> 7f6cf6be (.)
    );

    Assert::assertTrue($validator->fails());

    $message = $validator->errors()->first('published_at');
    Assert::assertStringContainsString('not a valid datetime', $message);
};

test('DateTimeRule rejects a non-string value', function () use ($rejectsInvalidDateTime): void {
    $rejectsInvalidDateTime(123);
});

test('DateTimeRule rejects an invalid calendar date', function () use ($rejectsInvalidDateTime): void {
    $rejectsInvalidDateTime('2024-13-99 25:99');
});
