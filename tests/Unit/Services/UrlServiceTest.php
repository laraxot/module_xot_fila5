<?php

declare(strict_types=1);

uses(Modules\Xot\Tests\TestCase::class);
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
use PHPUnit\Framework\Assert;

it('can be instantiated', function (): void {
    $service = new UrlService();
    Assert::assertInstanceOf(UrlService::class, $service);
});

it('can get instance via getInstance', function (): void {
    $service = UrlService::getInstance();
    Assert::assertInstanceOf(UrlService::class, $service);
});

it('can get instance via make', function (): void {
    $service = UrlService::make();
    Assert::assertInstanceOf(UrlService::class, $service);
});

it('validates correct urls', function (): void {
    $service = UrlService::make();
    Assert::assertTrue($service->checkValidUrl('https://google.com'));
    Assert::assertTrue($service->checkValidUrl('http://localhost'));
    Assert::assertTrue($service->checkValidUrl('ftp://server.com'));
});

it('invalidates incorrect urls', function (): void {
    $service = UrlService::make();
    Assert::assertFalse($service->checkValidUrl('not-a-url'));
    Assert::assertFalse($service->checkValidUrl('http:///double-slash'));
    Assert::assertFalse($service->checkValidUrl(''));
>>>>>>> 64619e34 (.)
});
