<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_oClnKc
=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD

=======
<<<<<<< HEAD
>>>>>>> .merge_file_wx8wyY

=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_oClnKc
=======
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
>>>>>>> .merge_file_wx8wyY
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\LegacyTableNameFixture;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('un override di getTableFilters viene onorato', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_oClnKc
=======
    $fixture = new LegacyTableNameFixture;
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD
    $fixture = new LegacyTableNameFixture();
=======
<<<<<<< HEAD
>>>>>>> .merge_file_wx8wyY
    $fixture = new LegacyTableNameFixture();
=======
    $fixture = new LegacyTableNameFixture;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_oClnKc
=======
>>>>>>> laraxot/dev
=======
    $fixture = new LegacyTableNameFixture();
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
>>>>>>> .merge_file_wx8wyY

    Assert::assertSame(['legacy_filter'], array_keys($fixture->getTableFilters()));
});

test('senza override si ricade sul default vuoto', function (): void {
<<<<<<< .merge_file_oClnKc
    $fixture = new class
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
    $fixture = new class
    {
=======
<<<<<<< .merge_file_YyLP1Q
    $fixture = new class
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_wx8wyY
        use Modules\Xot\Filament\Traits\HasXotTable;

        public string $tableSearch = '';

        /** @return array<string, mixed> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
<<<<<<< .merge_file_oClnKc
=======
=======
<<<<<<< HEAD
=======
=======
=======
    $fixture = new class {
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
>>>>>>> .merge_file_wx8wyY
        use HasXotTable;

        public string $tableSearch = '';

        /** @return array<string, Column> */
        public function getTableColumns(): array
<<<<<<< .merge_file_oClnKc
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_YyLP1Q
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UqdrtH
>>>>>>> .merge_file_wx8wyY
>>>>>>> laraxot/dev
        {
            return [];
        }
    };

    Assert::assertSame([], $fixture->getTableFilters());
});
<<<<<<< HEAD
<<<<<<< .merge_file_oClnKc

=======
=======
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UqdrtH
>>>>>>> .merge_file_wx8wyY
>>>>>>> laraxot/dev
