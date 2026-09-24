<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_OBMAqS
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD

use Filament\Tables\Table;
=======
<<<<<<< HEAD
>>>>>>> .merge_file_vZEt8A

use Filament\Tables\Table;
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_OBMAqS
=======
>>>>>>> laraxot/dev
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> .merge_file_cwDst1
>>>>>>> laraxot/dev
>>>>>>> .merge_file_vZEt8A
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\XotBaseResourceTableConfigureFixture;
use Modules\Xot\Tests\Unit\Fixtures\XotTableConfigureLivewireHarness;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('XotBaseResourceTable configure applica colonne e filtri dalla classe table', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_OBMAqS
=======
    $livewire = new XotTableConfigureLivewireHarness;
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness();
=======
<<<<<<< HEAD
>>>>>>> .merge_file_vZEt8A
    $livewire = new XotTableConfigureLivewireHarness();
=======
    $livewire = new XotTableConfigureLivewireHarness;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_OBMAqS
=======
>>>>>>> laraxot/dev
=======
    $livewire = new XotTableConfigureLivewireHarness();
>>>>>>> .merge_file_cwDst1
>>>>>>> laraxot/dev
>>>>>>> .merge_file_vZEt8A
    $table = Table::make($livewire);

    $configured = XotBaseResourceTableConfigureFixture::configure($table);

    Assert::assertInstanceOf(Table::class, $configured);
});

test('XotBaseResourceTable configure su classe astratta solleva LogicException', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_OBMAqS
=======
=======
<<<<<<< .merge_file_ToSP23
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_vZEt8A
    $livewire = new XotTableConfigureLivewireHarness();
    $table = Table::make($livewire);

    expect(fn (): Table => \Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable::configure($table))
        ->toThrow(\LogicException::class);
<<<<<<< .merge_file_OBMAqS
=======
=======
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_vZEt8A
    $livewire = new XotTableConfigureLivewireHarness;
    $table = Table::make($livewire);

    expect(fn (): Table => XotBaseResourceTable::configure($table))
        ->toThrow(LogicException::class);
<<<<<<< .merge_file_OBMAqS
=======
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
>>>>>>> .merge_file_vZEt8A
>>>>>>> laraxot/dev
});
