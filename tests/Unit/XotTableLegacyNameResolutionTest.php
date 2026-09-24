<?php

declare(strict_types=1);
<<<<<<< .merge_file_STwktN
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

=======
<<<<<<< HEAD

=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> .merge_file_jFBfty
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\LegacyTableNameFixture;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('un override di getTableFilters viene onorato', function (): void {
<<<<<<< .merge_file_STwktN
<<<<<<< HEAD
<<<<<<< HEAD
    $fixture = new LegacyTableNameFixture;
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
    $fixture = new LegacyTableNameFixture();
=======
<<<<<<< HEAD
    $fixture = new LegacyTableNameFixture();
=======
    $fixture = new LegacyTableNameFixture;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    $fixture = new LegacyTableNameFixture();
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
    $fixture = new LegacyTableNameFixture;
>>>>>>> .merge_file_jFBfty

    Assert::assertSame(['legacy_filter'], array_keys($fixture->getTableFilters()));
});

test('senza override si ricade sul default vuoto', function (): void {
<<<<<<< .merge_file_STwktN
<<<<<<< HEAD
<<<<<<< HEAD
    $fixture = new class
    {
=======
<<<<<<< .merge_file_YyLP1Q
=======
>>>>>>> 3792da0d (Check & fix styling)
    $fixture = new class
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
        use Modules\Xot\Filament\Traits\HasXotTable;

        public string $tableSearch = '';

        /** @return array<string, mixed> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
    $fixture = new class {
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
    $fixture = new class
    {
>>>>>>> .merge_file_jFBfty
        use HasXotTable;

        public string $tableSearch = '';

        /** @return array<string, Column> */
        public function getTableColumns(): array
<<<<<<< .merge_file_STwktN
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_YyLP1Q
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_jFBfty
        {
            return [];
        }
    };

    Assert::assertSame([], $fixture->getTableFilters());
});
<<<<<<< .merge_file_STwktN
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_jFBfty
