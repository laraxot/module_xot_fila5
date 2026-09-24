<?php

declare(strict_types=1);
<<<<<<< .merge_file_SFlmWD
<<<<<<< HEAD
<<<<<<< HEAD
=======

<<<<<<< HEAD
uses(TestCase::class);
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_A42Fcx
=======
=======
uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Actions\String\GetPronounceablePasswordAction;
use Modules\Xot\Actions\String\GetStrBetweenStartsWithAction;
use Modules\Xot\Actions\String\NormalizeDriverNameAction;
use Modules\Xot\Actions\String\SanitizeAction;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
test('get pronounceable password action works', function () {
    $action = app(GetPronounceablePasswordAction::class);
    $password = $action->execute(12);

    Assert::assertGreaterThanOrEqual(8, strlen($password)); // min length logic inside
    // Should contain at least one digit and some characters from the special set
    Assert::assertMatchesRegularExpression('/[0-9]/', (string) $password);
});

test('get str between starts with action works', function () {
    $action = app(GetStrBetweenStartsWithAction::class);
    $body = 'prefix { content { inner } } suffix';
    $result = $action->execute($body, 'content', '{', '}');

    Assert::assertStringContainsString((string) 'content { inner }', (string) $result);
});

test('normalize driver name action works', function () {
    $action = app(NormalizeDriverNameAction::class);
    Assert::assertSame('360dialog', $action->execute('360-Dialog'));
    Assert::assertSame('mydriver', $action->execute('My_Driver'));
});

test('sanitize action works', function () {
    $action = app(SanitizeAction::class);
    $input = '  <p>Hello &amp; World</p>  ';
    Assert::assertSame('Hello & World', $action->execute($input));
});
