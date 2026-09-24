<?php

declare(strict_types=1);
<<<<<<< .merge_file_BEztr5
<<<<<<< HEAD
<<<<<<< HEAD
=======

uses(TestCase::class);
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_azd6F0
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Tests\Fixtures\Traits\HasTableFunctionsCustomSlugProbe;
use Modules\Xot\Tests\Fixtures\Traits\HasTableFunctionsTraitProbe;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('gets table columns', function (): void {
    $probe = new HasTableFunctionsTraitProbe;
<<<<<<< .merge_file_BEztr5
=======
    $probe = new HasTableFunctionsTraitProbe();
>>>>>>> laraxot/dev
=======
use PHPUnit\Framework\Assert;

it('gets table columns', function (): void {
    $probe = new HasTableFunctionsTraitProbe();
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_azd6F0

    $columns = $probe->getTableColumns();
    Assert::assertInstanceOf(TextColumn::class, $columns['name']);
    Assert::assertArrayHasKey('id', $columns);
});

it('gets table actions', function (): void {
<<<<<<< .merge_file_BEztr5
<<<<<<< HEAD
<<<<<<< HEAD
    $probe = new HasTableFunctionsCustomSlugProbe;
=======
    $probe = new HasTableFunctionsCustomSlugProbe();
>>>>>>> laraxot/dev
=======
    $probe = new HasTableFunctionsCustomSlugProbe();
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $probe = new HasTableFunctionsCustomSlugProbe;
>>>>>>> .merge_file_azd6F0

    $actions = $probe->getTableActions();
    Assert::assertInstanceOf(Action::class, $actions['delete']);
    Assert::assertArrayHasKey('edit', $actions);
});

it('gets table bulk actions', function (): void {
<<<<<<< .merge_file_BEztr5
<<<<<<< HEAD
<<<<<<< HEAD
    $probe = new HasTableFunctionsTraitProbe;
=======
    $probe = new HasTableFunctionsTraitProbe();
>>>>>>> laraxot/dev
=======
    $probe = new HasTableFunctionsTraitProbe();
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $probe = new HasTableFunctionsTraitProbe;
>>>>>>> .merge_file_azd6F0

    $bulkActions = $probe->getTableBulkActions();
    Assert::assertInstanceOf(BulkAction::class, $bulkActions['delete']);
});

it('has default resource slug', function (): void {
<<<<<<< .merge_file_BEztr5
<<<<<<< HEAD
<<<<<<< HEAD
    $probe = new HasTableFunctionsTraitProbe;
=======
    $probe = new HasTableFunctionsTraitProbe();
>>>>>>> laraxot/dev
=======
    $probe = new HasTableFunctionsTraitProbe();
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $probe = new HasTableFunctionsTraitProbe;
>>>>>>> .merge_file_azd6F0

    Assert::assertSame('default', $probe->exposeResourceSlug());
});
