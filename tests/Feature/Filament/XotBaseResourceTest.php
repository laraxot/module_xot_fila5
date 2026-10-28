<?php

declare(strict_types=1);
use Filament\Resources\Resource;
use Modules\Xot\Tests\Fixtures\Filament\Resources\NavigationProbeResource;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('xot base resource extends filament resource', function (): void {
    Assert::assertTrue((new ReflectionClass(NavigationProbeResource::class))->isSubclassOf(Resource::class));
});

test('xot base resource reads navigation icon from translations', function (): void {
    Assert::assertSame('heroicon-o-beaker', NavigationProbeResource::getNavigationIcon());
});

test('xot base resource reads navigation group from translations', function (): void {
    Assert::assertSame('Sistema', NavigationProbeResource::getNavigationGroup());
});

test('xot base resource reads navigation sort from translations', function (): void {
    Assert::assertSame(59, NavigationProbeResource::getNavigationSort());
});

test('xot base resource can be instantiated', function (): void {
    Assert::assertSame('Xot', NavigationProbeResource::getModuleName());
});
