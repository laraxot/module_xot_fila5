<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Modules\Xot\Rules\DateTimeRule;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-xot-db');

test('DateTimeRule accepts the documented day month year format', function (): void {
    $validator = Validator::make(
        ['published_at' => '10/10/2019 13:43'],
<<<<<<< HEAD
<<<<<<< .merge_file_7WLFNr
<<<<<<< HEAD
<<<<<<< HEAD
        ['published_at' => [new DateTimeRule]],
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_IKZqnU
        ['published_at' => [new DateTimeRule]],
=======
        ['published_at' => [new DateTimeRule()]],
>>>>>>> .merge_file_zDvQAN
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        ['published_at' => [new DateTimeRule]],
>>>>>>> 3792da0d (Check & fix styling)
=======
        ['published_at' => [new DateTimeRule]],
>>>>>>> .merge_file_0amaZ2
=======
=======
        ['published_at' => [new DateTimeRule]],
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    );

    Assert::assertFalse($validator->fails());
});

<<<<<<< HEAD
<<<<<<< .merge_file_7WLFNr
=======
<<<<<<< HEAD
<<<<<<< .merge_file_IKZqnU
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< HEAD
$rejectsInvalidDateTime = function (int|string $value): void {
    $validator = Validator::make(
        ['published_at' => $value],
        ['published_at' => [new DateTimeRule]],
<<<<<<< HEAD
=======
<<<<<<< .merge_file_IKZqnU
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
$rejectsInvalidDateTime = function (mixed $value): void {
=======
<<<<<<< HEAD
$rejectsInvalidDateTime = function (mixed $value): void {
=======
=======
>>>>>>> .merge_file_0amaZ2
$rejectsInvalidDateTime = function (int|string $value): void {
    $validator = Validator::make(
        ['published_at' => $value],
        ['published_at' => [new DateTimeRule]],
<<<<<<< .merge_file_7WLFNr
<<<<<<< HEAD
=======
$rejectsInvalidDateTime = function (int|string $value): void {
    $validator = Validator::make(
        ['published_at' => $value],
        ['published_at' => [new DateTimeRule()]],
>>>>>>> .merge_file_zDvQAN
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0amaZ2
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
