<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_bViZ4d
=======
<<<<<<< .merge_file_oClnKc
=======
>>>>>>> .merge_file_VAOV8n
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< .merge_file_bViZ4d
=======
>>>>>>> .merge_file_wx8wyY
>>>>>>> .merge_file_VAOV8n

=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_bViZ4d
=======
<<<<<<< .merge_file_oClnKc
=======
>>>>>>> .merge_file_VAOV8n
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
<<<<<<< .merge_file_bViZ4d
=======
>>>>>>> .merge_file_wx8wyY
>>>>>>> .merge_file_VAOV8n
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\LegacyTableNameFixture;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('un override di getTableFilters viene onorato', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_bViZ4d
=======
<<<<<<< .merge_file_oClnKc
=======
>>>>>>> .merge_file_VAOV8n
    $fixture = new LegacyTableNameFixture;
=======
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD
    $fixture = new LegacyTableNameFixture();
=======
<<<<<<< HEAD
<<<<<<< .merge_file_bViZ4d
=======
>>>>>>> .merge_file_wx8wyY
>>>>>>> .merge_file_VAOV8n
    $fixture = new LegacyTableNameFixture();
=======
    $fixture = new LegacyTableNameFixture;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_bViZ4d
=======
<<<<<<< .merge_file_oClnKc
=======
>>>>>>> .merge_file_VAOV8n
>>>>>>> laraxot/dev
=======
    $fixture = new LegacyTableNameFixture();
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
<<<<<<< .merge_file_bViZ4d
=======
>>>>>>> .merge_file_wx8wyY
>>>>>>> .merge_file_VAOV8n

    Assert::assertSame(['legacy_filter'], array_keys($fixture->getTableFilters()));
});

test('senza override si ricade sul default vuoto', function (): void {
<<<<<<< .merge_file_bViZ4d
=======
<<<<<<< .merge_file_oClnKc
    $fixture = new class
    {
<<<<<<< HEAD
=======
>>>>>>> .merge_file_VAOV8n
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
<<<<<<< .merge_file_bViZ4d
=======
>>>>>>> .merge_file_wx8wyY
>>>>>>> .merge_file_VAOV8n
        use Modules\Xot\Filament\Traits\HasXotTable;

        public string $tableSearch = '';

        /** @return array<string, mixed> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
<<<<<<< .merge_file_bViZ4d
=======
<<<<<<< .merge_file_oClnKc
=======
=======
>>>>>>> .merge_file_VAOV8n
<<<<<<< HEAD
=======
=======
=======
    $fixture = new class {
>>>>>>> .merge_file_UqdrtH
>>>>>>> laraxot/dev
<<<<<<< .merge_file_bViZ4d
=======
>>>>>>> .merge_file_wx8wyY
>>>>>>> .merge_file_VAOV8n
        use HasXotTable;

        public string $tableSearch = '';

        /** @return array<string, Column> */
        public function getTableColumns(): array
<<<<<<< .merge_file_bViZ4d
=======
<<<<<<< .merge_file_oClnKc
=======
>>>>>>> .merge_file_VAOV8n
<<<<<<< HEAD
=======
<<<<<<< .merge_file_YyLP1Q
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UqdrtH
<<<<<<< .merge_file_bViZ4d
=======
>>>>>>> .merge_file_wx8wyY
>>>>>>> .merge_file_VAOV8n
>>>>>>> laraxot/dev
        {
            return [];
        }
    };

    Assert::assertSame([], $fixture->getTableFilters());
});
<<<<<<< HEAD
<<<<<<< .merge_file_bViZ4d
=======
<<<<<<< .merge_file_oClnKc

=======
=======
>>>>>>> .merge_file_VAOV8n
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
<<<<<<< .merge_file_bViZ4d
=======
>>>>>>> .merge_file_wx8wyY
>>>>>>> .merge_file_VAOV8n
>>>>>>> laraxot/dev
