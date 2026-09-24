<?php

declare(strict_types=1);
<<<<<<< HEAD
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD

use Filament\Tables\Table;
=======
<<<<<<< HEAD

use Filament\Tables\Table;
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> .merge_file_cwDst1
>>>>>>> laraxot/dev
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\XotBaseResourceTableConfigureFixture;
use Modules\Xot\Tests\Unit\Fixtures\XotTableConfigureLivewireHarness;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('XotBaseResourceTable configure applica colonne e filtri dalla classe table', function (): void {
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness;
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness();
=======
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness();
=======
    $livewire = new XotTableConfigureLivewireHarness;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
    $livewire = new XotTableConfigureLivewireHarness();
>>>>>>> .merge_file_cwDst1
>>>>>>> laraxot/dev
    $table = Table::make($livewire);

    $configured = XotBaseResourceTableConfigureFixture::configure($table);

    Assert::assertInstanceOf(Table::class, $configured);
});

test('XotBaseResourceTable configure su classe astratta solleva LogicException', function (): void {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
    $livewire = new XotTableConfigureLivewireHarness();
    $table = Table::make($livewire);

    expect(fn (): Table => \Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable::configure($table))
        ->toThrow(\LogicException::class);
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
    $livewire = new XotTableConfigureLivewireHarness;
    $table = Table::make($livewire);

    expect(fn (): Table => XotBaseResourceTable::configure($table))
        ->toThrow(LogicException::class);
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
});
