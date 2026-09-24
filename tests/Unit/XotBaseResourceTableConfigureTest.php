<?php

declare(strict_types=1);
<<<<<<< .merge_file_1sqFWj
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD

use Filament\Tables\Table;
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)

use Filament\Tables\Table;
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> .merge_file_cwDst1
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> .merge_file_5nqMJk
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\XotBaseResourceTableConfigureFixture;
use Modules\Xot\Tests\Unit\Fixtures\XotTableConfigureLivewireHarness;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('XotBaseResourceTable configure applica colonne e filtri dalla classe table', function (): void {
<<<<<<< .merge_file_1sqFWj
<<<<<<< HEAD
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness;
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness();
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
    $livewire = new XotTableConfigureLivewireHarness();
=======
    $livewire = new XotTableConfigureLivewireHarness;
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    $livewire = new XotTableConfigureLivewireHarness();
>>>>>>> .merge_file_cwDst1
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $livewire = new XotTableConfigureLivewireHarness;
>>>>>>> .merge_file_5nqMJk
    $table = Table::make($livewire);

    $configured = XotBaseResourceTableConfigureFixture::configure($table);

    Assert::assertInstanceOf(Table::class, $configured);
});

test('XotBaseResourceTable configure su classe astratta solleva LogicException', function (): void {
<<<<<<< .merge_file_1sqFWj
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    $livewire = new XotTableConfigureLivewireHarness();
    $table = Table::make($livewire);

    expect(fn (): Table => \Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable::configure($table))
        ->toThrow(\LogicException::class);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_5nqMJk
    $livewire = new XotTableConfigureLivewireHarness;
    $table = Table::make($livewire);

    expect(fn (): Table => XotBaseResourceTable::configure($table))
        ->toThrow(LogicException::class);
<<<<<<< .merge_file_1sqFWj
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
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_5nqMJk
});
