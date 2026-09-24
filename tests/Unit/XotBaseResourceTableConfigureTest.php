<?php

declare(strict_types=1);
<<<<<<< HEAD
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
<<<<<<< HEAD

use Filament\Tables\Table;
=======
<<<<<<< HEAD

use Filament\Tables\Table;
<<<<<<< .merge_file_oveDnW
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_hb6u0E
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\XotBaseResourceTableConfigureFixture;
use Modules\Xot\Tests\Unit\Fixtures\XotTableConfigureLivewireHarness;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('XotBaseResourceTable configure applica colonne e filtri dalla classe table', function (): void {
<<<<<<< .merge_file_oveDnW
    $livewire = new XotTableConfigureLivewireHarness;
=======
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness;
=======
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness();
=======
<<<<<<< HEAD
    $livewire = new XotTableConfigureLivewireHarness();
=======
    $livewire = new XotTableConfigureLivewireHarness;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_hb6u0E
    $table = Table::make($livewire);

    $configured = XotBaseResourceTableConfigureFixture::configure($table);

    Assert::assertInstanceOf(Table::class, $configured);
});

test('XotBaseResourceTable configure su classe astratta solleva LogicException', function (): void {
<<<<<<< .merge_file_oveDnW
    $livewire = new XotTableConfigureLivewireHarness;
    $table = Table::make($livewire);

    expect(fn (): Table => XotBaseResourceTable::configure($table))
        ->toThrow(LogicException::class);
=======
<<<<<<< HEAD
=======
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
>>>>>>> laraxot/dev
>>>>>>> .merge_file_hb6u0E
});
