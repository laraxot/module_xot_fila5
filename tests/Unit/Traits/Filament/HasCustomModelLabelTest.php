<?php

declare(strict_types=1);
<<<<<<< .merge_file_Bmm0c1
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
>>>>>>> .merge_file_GKqUIX
=======
=======
uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Tests\Fixtures\Traits\BreadcrumbProbe;
use Modules\Xot\Tests\Fixtures\Traits\ModelLabelFromModelNameProbe;
use Modules\Xot\Tests\Fixtures\Traits\ModelLabelFromPropertyProbe;
use Modules\Xot\Tests\Fixtures\Traits\NavigationLabelFromPluralProbe;
use Modules\Xot\Tests\Fixtures\Traits\NavigationLabelFromPropertyProbe;
use Modules\Xot\Tests\Fixtures\Traits\PluralModelLabelFromPropertyProbe;
use Modules\Xot\Tests\Fixtures\Traits\PluralModelLabelFromSingularProbe;
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
