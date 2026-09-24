<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\String\GetStrBetweenStartsWithAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\String\GetStrBetweenStartsWithAction;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

it('extracts string between markers correctly', function (): void {
    $action = app(GetStrBetweenStartsWithAction::class);

    $body = 'prefix { content { inner } } suffix';
    $result = $action->execute($body, 'content', '{', '}');

    Assert::assertSame('content { inner }', $result);
});

it('throws exception when start marker is missing', function (): void {
    $action = app(GetStrBetweenStartsWithAction::class);
});
