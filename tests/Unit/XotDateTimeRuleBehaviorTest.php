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
<<<<<<< .merge_file_RYr0XJ
<<<<<<< HEAD
        ['published_at' => [new DateTimeRule]],
=======
=======
<<<<<<< .merge_file_KnreQa
        ['published_at' => [new DateTimeRule]],
=======
<<<<<<< HEAD
        ['published_at' => [new DateTimeRule]],
=======
>>>>>>> .merge_file_9PrJZz
<<<<<<< .merge_file_IKZqnU
        ['published_at' => [new DateTimeRule]],
=======
        ['published_at' => [new DateTimeRule()]],
>>>>>>> .merge_file_zDvQAN
>>>>>>> laraxot/dev
<<<<<<< .merge_file_RYr0XJ
=======
>>>>>>> .merge_file_sU922O
>>>>>>> .merge_file_9PrJZz
    );

    Assert::assertFalse($validator->fails());
});

<<<<<<< HEAD
<<<<<<< .merge_file_RYr0XJ
=======
<<<<<<< .merge_file_KnreQa
=======
>>>>>>> .merge_file_9PrJZz
$rejectsInvalidDateTime = function (int|string $value): void {
    $validator = Validator::make(
        ['published_at' => $value],
        ['published_at' => [new DateTimeRule]],
=======
<<<<<<< .merge_file_IKZqnU
<<<<<<< HEAD
$rejectsInvalidDateTime = function (mixed $value): void {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_RYr0XJ
=======
>>>>>>> .merge_file_sU922O
>>>>>>> .merge_file_9PrJZz
$rejectsInvalidDateTime = function (mixed $value): void {
=======
$rejectsInvalidDateTime = function (int|string $value): void {
>>>>>>> laraxot/dev
<<<<<<< .merge_file_RYr0XJ
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_KnreQa
>>>>>>> .merge_file_9PrJZz
    $validator = Validator::make(
        ['published_at' => $value],
        ['published_at' => [new DateTimeRule]],
=======
<<<<<<< .merge_file_RYr0XJ
=======
>>>>>>> laraxot/dev
    $validator = Validator::make(
        ['published_at' => $value],
        ['published_at' => [new DateTimeRule]],
=======
>>>>>>> .merge_file_9PrJZz
$rejectsInvalidDateTime = function (int|string $value): void {
    $validator = Validator::make(
        ['published_at' => $value],
        ['published_at' => [new DateTimeRule()]],
>>>>>>> .merge_file_zDvQAN
>>>>>>> laraxot/dev
<<<<<<< .merge_file_RYr0XJ
=======
>>>>>>> .merge_file_sU922O
>>>>>>> .merge_file_9PrJZz
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
