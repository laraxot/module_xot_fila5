<?php

declare(strict_types=1);
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
use Filament\Tables\Columns\Column;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\Column;
>>>>>>> .merge_file_bnMTYc
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Enums\RecordActionsPosition;
use Modules\Xot\Filament\Traits\HasXotTable;
use PHPUnit\Framework\Assert;

<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
/**
 * @param object $instance
 */
=======
<<<<<<< HEAD
/**
 * @param object $instance
 */
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_bnMTYc
function invokeProtectedTableHook(object $instance, string $method): mixed
{
    $reflection = new ReflectionMethod($instance, $method);

    return $reflection->invoke($instance);
}

test('getTableFiltersLayout default e override', function (): void {
<<<<<<< .merge_file_i2OK2y
    $default = new class
    {
=======
    $default = new class {
>>>>>>> .merge_file_bnMTYc
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
        {
            return [];
        }
    };

    Assert::assertSame(FiltersLayout::AboveContent, invokeProtectedTableHook($default, 'getTableFiltersLayout'));

<<<<<<< .merge_file_i2OK2y
    $custom = new class
    {
=======
    $custom = new class {
>>>>>>> .merge_file_bnMTYc
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
        {
            return [];
        }

        protected function getTableFiltersLayout(): FiltersLayout
        {
            return FiltersLayout::Dropdown;
        }
    };

    Assert::assertSame(FiltersLayout::Dropdown, invokeProtectedTableHook($custom, 'getTableFiltersLayout'));
});

test('getTableRecordActionsPosition default e override', function (): void {
<<<<<<< .merge_file_i2OK2y
    $default = new class
    {
=======
    $default = new class {
>>>>>>> .merge_file_bnMTYc
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
        {
            return [];
        }
    };

    Assert::assertSame(RecordActionsPosition::BeforeColumns, invokeProtectedTableHook($default, 'getTableRecordActionsPosition'));

<<<<<<< .merge_file_i2OK2y
    $custom = new class
    {
=======
    $custom = new class {
>>>>>>> .merge_file_bnMTYc
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
        {
            return [];
        }

        protected function getTableRecordActionsPosition(): RecordActionsPosition
        {
            return RecordActionsPosition::AfterColumns;
        }
    };

    Assert::assertSame(RecordActionsPosition::AfterColumns, invokeProtectedTableHook($custom, 'getTableRecordActionsPosition'));
});
