<?php

declare(strict_types=1);
<<<<<<< .merge_file_WgbP8N
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

=======
<<<<<<< HEAD

=======
use Filament\Tables\Columns\Column;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
use Filament\Tables\Columns\Column;
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
use Filament\Tables\Columns\Column;
>>>>>>> .merge_file_PzYj0e
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Enums\RecordActionsPosition;
use Modules\Xot\Filament\Traits\HasXotTable;
use PHPUnit\Framework\Assert;

<<<<<<< .merge_file_WgbP8N
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
=======
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_PzYj0e
function invokeProtectedTableHook(object $instance, string $method): mixed
{
    $reflection = new ReflectionMethod($instance, $method);

    return $reflection->invoke($instance);
}

test('getTableFiltersLayout default e override', function (): void {
<<<<<<< .merge_file_WgbP8N
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
>>>>>>> 3792da0d (Check & fix styling)
=======
    $default = new class
    {
>>>>>>> .merge_file_PzYj0e
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_WgbP8N
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_PzYj0e
        {
            return [];
        }
    };

    Assert::assertSame(FiltersLayout::AboveContent, invokeProtectedTableHook($default, 'getTableFiltersLayout'));

<<<<<<< .merge_file_WgbP8N
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
>>>>>>> 3792da0d (Check & fix styling)
=======
    $custom = new class
    {
>>>>>>> .merge_file_PzYj0e
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_WgbP8N
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_PzYj0e
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
<<<<<<< .merge_file_WgbP8N
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
>>>>>>> 3792da0d (Check & fix styling)
=======
    $default = new class
    {
>>>>>>> .merge_file_PzYj0e
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_WgbP8N
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_PzYj0e
        {
            return [];
        }
    };

    Assert::assertSame(RecordActionsPosition::BeforeColumns, invokeProtectedTableHook($default, 'getTableRecordActionsPosition'));

<<<<<<< .merge_file_WgbP8N
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
>>>>>>> 3792da0d (Check & fix styling)
=======
    $custom = new class
    {
>>>>>>> .merge_file_PzYj0e
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_WgbP8N
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_PzYj0e
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
