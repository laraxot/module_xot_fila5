<?php

declare(strict_types=1);

uses(Modules\Xot\Tests\TestCase::class);
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Actions\Url\IsValidUrlAction;
use PHPUnit\Framework\Assert;

it('validates correct urls', function (): void {
    $action = app(IsValidUrlAction::class);
    Assert::assertTrue($action->execute('https://google.com'));
    Assert::assertTrue($action->execute('http://localhost'));
    Assert::assertTrue($action->execute('ftp://server.com'));
});

it('invalidates incorrect urls', function (): void {
    $action = app(IsValidUrlAction::class);
    Assert::assertFalse($action->execute('not-a-url'));
    Assert::assertFalse($action->execute('http:///double-slash'));
    Assert::assertFalse($action->execute(''));
=======
use Modules\Xot\Services\UrlService;
=======
use Modules\Xot\Actions\Url\IsValidUrlAction;
>>>>>>> 61938ca4 (delete .claude-audit/)
use PHPUnit\Framework\Assert;

it('validates correct urls', function (): void {
    $action = app(IsValidUrlAction::class);
    Assert::assertTrue($action->execute('https://google.com'));
    Assert::assertTrue($action->execute('http://localhost'));
    Assert::assertTrue($action->execute('ftp://server.com'));
});

it('invalidates incorrect urls', function (): void {
<<<<<<< HEAD
    $service = UrlService::make();
    Assert::assertFalse($service->checkValidUrl('not-a-url'));
    Assert::assertFalse($service->checkValidUrl('http:///double-slash'));
    Assert::assertFalse($service->checkValidUrl(''));
>>>>>>> 64619e34 (.)
=======
    $action = app(IsValidUrlAction::class);
    Assert::assertFalse($action->execute('not-a-url'));
    Assert::assertFalse($action->execute('http:///double-slash'));
    Assert::assertFalse($action->execute(''));
>>>>>>> 61938ca4 (delete .claude-audit/)
});
