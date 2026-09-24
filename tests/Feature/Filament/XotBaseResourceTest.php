<?php

declare(strict_types=1);
<<<<<<< HEAD
use Filament\Resources\Resource;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Tests\Fixtures\Filament\Resources\NavigationProbeResource;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('xot base resource extends filament resource', function (): void {
    Assert::assertInstanceOf(Resource::class, new NavigationProbeResource);
<<<<<<< .merge_file_b3RMZq
=======
    Assert::assertInstanceOf(Resource::class, new NavigationProbeResource());
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
use Filament\Resources\Resource;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Tests\Fixtures\Filament\Resources\NavigationProbeResource;
use PHPUnit\Framework\Assert;

test('xot base resource extends filament resource', function (): void {
    Assert::assertInstanceOf(Resource::class, new NavigationProbeResource());
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_SB9bEt
});

test('xot base resource has navigation icon', function (): void {
    Assert::assertSame('heroicon-o-rectangle-stack', NavigationProbeResource::getNavigationIcon());
});

test('xot base resource has navigation group', function (): void {
    Assert::assertSame('Test Group', NavigationProbeResource::getNavigationGroup());
});

test('xot base resource has navigation sort', function (): void {
    Assert::assertSame(1, NavigationProbeResource::getNavigationSort());
});

test('xot base resource can be instantiated', function (): void {
<<<<<<< .merge_file_b3RMZq
<<<<<<< HEAD
<<<<<<< HEAD
    Assert::assertInstanceOf(XotBaseResource::class, new NavigationProbeResource);
=======
    Assert::assertInstanceOf(XotBaseResource::class, new NavigationProbeResource());
>>>>>>> laraxot/dev
=======
    Assert::assertInstanceOf(XotBaseResource::class, new NavigationProbeResource());
>>>>>>> 3792da0d (Check & fix styling)
=======
    Assert::assertInstanceOf(XotBaseResource::class, new NavigationProbeResource);
>>>>>>> .merge_file_SB9bEt
});
