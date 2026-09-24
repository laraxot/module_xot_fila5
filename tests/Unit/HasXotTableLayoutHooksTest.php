<?php

declare(strict_types=1);
<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)

=======
use Filament\Tables\Columns\Column;
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\Column;
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
use Filament\Tables\Columns\Column;
>>>>>>> .merge_file_fkze7t
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Enums\RecordActionsPosition;
use Modules\Xot\Filament\Traits\HasXotTable;
use PHPUnit\Framework\Assert;

<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
/**
 * @param object $instance
 */
=======
<<<<<<< HEAD
<<<<<<< HEAD
/**
 * @param object $instance
 */
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_bnMTYc
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_fkze7t
function invokeProtectedTableHook(object $instance, string $method): mixed
{
    $reflection = new ReflectionMethod($instance, $method);

    return $reflection->invoke($instance);
}

test('getTableFiltersLayout default e override', function (): void {
<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
    $default = new class
    {
=======
<<<<<<< .merge_file_i2OK2y
    $default = new class
    {
=======
    $default = new class {
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
    $default = new class
    {
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $default = new class
    {
>>>>>>> .merge_file_fkze7t
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_fkze7t
        {
            return [];
        }
    };

    Assert::assertSame(FiltersLayout::AboveContent, invokeProtectedTableHook($default, 'getTableFiltersLayout'));

<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
    $custom = new class
    {
=======
<<<<<<< .merge_file_i2OK2y
    $custom = new class
    {
=======
    $custom = new class {
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
    $custom = new class
    {
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $custom = new class
    {
>>>>>>> .merge_file_fkze7t
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_fkze7t
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
<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
    $default = new class
    {
=======
<<<<<<< .merge_file_i2OK2y
    $default = new class
    {
=======
    $default = new class {
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
    $default = new class
    {
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $default = new class
    {
>>>>>>> .merge_file_fkze7t
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_fkze7t
        {
            return [];
        }
    };

    Assert::assertSame(RecordActionsPosition::BeforeColumns, invokeProtectedTableHook($default, 'getTableRecordActionsPosition'));

<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
    $custom = new class
    {
=======
<<<<<<< .merge_file_i2OK2y
    $custom = new class
    {
=======
    $custom = new class {
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
    $custom = new class
    {
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $custom = new class
    {
>>>>>>> .merge_file_fkze7t
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_wax9oN
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_fkze7t
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
