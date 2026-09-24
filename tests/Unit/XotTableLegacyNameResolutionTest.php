<?php

declare(strict_types=1);
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> .merge_file_UqdrtH
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\LegacyTableNameFixture;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('un override di getTableFilters viene onorato', function (): void {
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD
    $fixture = new LegacyTableNameFixture();
=======
<<<<<<< HEAD
    $fixture = new LegacyTableNameFixture();
=======
    $fixture = new LegacyTableNameFixture;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
    $fixture = new LegacyTableNameFixture();
>>>>>>> .merge_file_UqdrtH

    Assert::assertSame(['legacy_filter'], array_keys($fixture->getTableFilters()));
});

test('senza override si ricade sul default vuoto', function (): void {
<<<<<<< .merge_file_YyLP1Q
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
=======
    $fixture = new class {
>>>>>>> .merge_file_UqdrtH
        use HasXotTable;

        public string $tableSearch = '';

        /** @return array<string, Column> */
        public function getTableColumns(): array
<<<<<<< .merge_file_YyLP1Q
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UqdrtH
        {
            return [];
        }
    };

    Assert::assertSame([], $fixture->getTableFilters());
});
<<<<<<< .merge_file_YyLP1Q
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_UqdrtH
