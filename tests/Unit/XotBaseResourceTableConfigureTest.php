<?php

declare(strict_types=1);
<<<<<<< .merge_file_tzdbkB
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

use Filament\Tables\Table;
=======
<<<<<<< HEAD

use Filament\Tables\Table;
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> .merge_file_cwDst1
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> .merge_file_ItmbaA
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\XotBaseResourceTableConfigureFixture;
use Modules\Xot\Tests\Unit\Fixtures\XotTableConfigureLivewireHarness;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('XotBaseResourceTable configure applica colonne e filtri dalla classe table', function (): void {
<<<<<<< .merge_file_tzdbkB
<<<<<<< HEAD
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness;
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
    $livewire = new XotTableConfigureLivewireHarness();
=======
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness();
=======
    $livewire = new XotTableConfigureLivewireHarness;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    $livewire = new XotTableConfigureLivewireHarness();
>>>>>>> .merge_file_cwDst1
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
    $livewire = new XotTableConfigureLivewireHarness;
>>>>>>> .merge_file_ItmbaA
    $table = Table::make($livewire);

    $configured = XotBaseResourceTableConfigureFixture::configure($table);

    Assert::assertInstanceOf(Table::class, $configured);
});

test('XotBaseResourceTable configure su classe astratta solleva LogicException', function (): void {
<<<<<<< .merge_file_tzdbkB
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
    $livewire = new XotTableConfigureLivewireHarness();
    $table = Table::make($livewire);

    expect(fn (): Table => \Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable::configure($table))
        ->toThrow(\LogicException::class);
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ItmbaA
    $livewire = new XotTableConfigureLivewireHarness;
    $table = Table::make($livewire);

    expect(fn (): Table => XotBaseResourceTable::configure($table))
        ->toThrow(LogicException::class);
<<<<<<< .merge_file_tzdbkB
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
    $livewire = new XotTableConfigureLivewireHarness();
    $table = Table::make($livewire);

    expect(fn (): Table => XotBaseResourceTable::configure($table))
        ->toThrow(LogicException::class);
>>>>>>> .merge_file_cwDst1
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ItmbaA
});
