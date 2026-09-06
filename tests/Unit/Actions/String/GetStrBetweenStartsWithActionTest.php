<?php

declare(strict_types=1);

use Modules\Xot\Actions\String\GetStrBetweenStartsWithAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

it('extracts string between markers correctly', function (): void {
    $action = app(GetStrBetweenStartsWithAction::class);

    $body = 'prefix { content { inner } } suffix';
    $result = $action->execute($body, 'content', '{', '}');

    Assert::assertSame('content { inner }', $result);
});

it('throws exception when start marker is missing', function (): void {
    $action = app(GetStrBetweenStartsWithAction::class);
});
