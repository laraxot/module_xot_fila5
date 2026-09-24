<?php

declare(strict_types=1);
<<<<<<< .merge_file_LTHIlI
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)

=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> .merge_file_modfMV
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\LegacyTableNameFixture;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('un override di getTableFilters viene onorato', function (): void {
<<<<<<< .merge_file_LTHIlI
<<<<<<< HEAD
<<<<<<< HEAD
    $fixture = new LegacyTableNameFixture;
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD
    $fixture = new LegacyTableNameFixture();
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
    $fixture = new LegacyTableNameFixture();
=======
    $fixture = new LegacyTableNameFixture;
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    $fixture = new LegacyTableNameFixture();
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $fixture = new LegacyTableNameFixture;
>>>>>>> .merge_file_modfMV

    Assert::assertSame(['legacy_filter'], array_keys($fixture->getTableFilters()));
});

test('senza override si ricade sul default vuoto', function (): void {
<<<<<<< .merge_file_LTHIlI
<<<<<<< HEAD
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
=======
    $fixture = new class
    {
<<<<<<< HEAD
>>>>>>> 8d801bbe (Check & fix styling)
        use Modules\Xot\Filament\Traits\HasXotTable;

        public string $tableSearch = '';

        /** @return array<string, mixed> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
    $fixture = new class {
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $fixture = new class
    {
>>>>>>> .merge_file_modfMV
        use HasXotTable;

        public string $tableSearch = '';

        /** @return array<string, Column> */
        public function getTableColumns(): array
<<<<<<< .merge_file_LTHIlI
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_YyLP1Q
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UqdrtH
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_modfMV
        {
            return [];
        }
    };

    Assert::assertSame([], $fixture->getTableFilters());
});
<<<<<<< .merge_file_LTHIlI
<<<<<<< HEAD
<<<<<<< HEAD
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
>>>>>>> laraxot/dev
=======

=======
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_modfMV
