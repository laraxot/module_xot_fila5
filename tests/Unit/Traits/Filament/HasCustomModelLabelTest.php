<?php

declare(strict_types=1);
use Tests\Modules\Xot\Fixtures\Traits\BreadcrumbProbe;
use Tests\Modules\Xot\Fixtures\Traits\ModelLabelFromModelNameProbe;
use Tests\Modules\Xot\Fixtures\Traits\ModelLabelFromPropertyProbe;
use Tests\Modules\Xot\Fixtures\Traits\NavigationLabelFromPluralProbe;
use Tests\Modules\Xot\Fixtures\Traits\NavigationLabelFromPropertyProbe;
use Tests\Modules\Xot\Fixtures\Traits\PluralModelLabelFromPropertyProbe;
use Tests\Modules\Xot\Fixtures\Traits\PluralModelLabelFromSingularProbe;
use Tests\Modules\Xot\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('gets model label from property', function (): void {
    Assert::assertSame('Custom Label', ModelLabelFromPropertyProbe::getModelLabel());
});

it('gets model label from model name', function (): void {
    Assert::assertSame('User Invitation', ModelLabelFromModelNameProbe::getModelLabel());
});

it('gets plural model label from property', function (): void {
    Assert::assertSame('Plural Labels', PluralModelLabelFromPropertyProbe::getPluralModelLabel());
});

it('gets plural model label from singular label', function (): void {
    Assert::assertSame('Categories', PluralModelLabelFromSingularProbe::getPluralModelLabel());
});

it('gets navigation label', function (): void {
    Assert::assertSame('Nav Label', NavigationLabelFromPropertyProbe::getNavigationLabel());
    Assert::assertSame('Plurals', NavigationLabelFromPluralProbe::getNavigationLabel());
});

it('gets breadcrumb', function (): void {
    Assert::assertSame('Bread', BreadcrumbProbe::getBreadcrumb());
});
