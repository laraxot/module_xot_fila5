<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_3YXlOq
=======
use Filament\Tables\Columns\Column;
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD

=======
<<<<<<< HEAD
>>>>>>> .merge_file_mDkFqP

=======
use Filament\Tables\Columns\Column;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3YXlOq
=======
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\Column;
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mDkFqP
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Enums\RecordActionsPosition;
use Modules\Xot\Filament\Traits\HasXotTable;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
<<<<<<< .merge_file_3YXlOq
=======
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
/**
 * @param object $instance
 */
=======
<<<<<<< HEAD
>>>>>>> .merge_file_mDkFqP
/**
 * @param object $instance
 */
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3YXlOq
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mDkFqP
function invokeProtectedTableHook(object $instance, string $method): mixed
{
    $reflection = new ReflectionMethod($instance, $method);

    return $reflection->invoke($instance);
}

test('getTableFiltersLayout default e override', function (): void {
<<<<<<< .merge_file_3YXlOq
    $default = new class
    {
=======
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
>>>>>>> .merge_file_mDkFqP
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< HEAD
<<<<<<< .merge_file_3YXlOq
=======
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
>>>>>>> .merge_file_mDkFqP
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3YXlOq
=======
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mDkFqP
        {
            return [];
        }
    };

    Assert::assertSame(FiltersLayout::AboveContent, invokeProtectedTableHook($default, 'getTableFiltersLayout'));

<<<<<<< .merge_file_3YXlOq
    $custom = new class
    {
=======
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
>>>>>>> .merge_file_mDkFqP
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< HEAD
<<<<<<< .merge_file_3YXlOq
=======
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
>>>>>>> .merge_file_mDkFqP
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3YXlOq
=======
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mDkFqP
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
<<<<<<< .merge_file_3YXlOq
    $default = new class
    {
=======
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
>>>>>>> .merge_file_mDkFqP
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< HEAD
<<<<<<< .merge_file_3YXlOq
=======
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
>>>>>>> .merge_file_mDkFqP
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3YXlOq
=======
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
        public function getTableColumns(): array
>>>>>>> .merge_file_bnMTYc
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mDkFqP
        {
            return [];
        }
    };

    Assert::assertSame(RecordActionsPosition::BeforeColumns, invokeProtectedTableHook($default, 'getTableRecordActionsPosition'));

<<<<<<< .merge_file_3YXlOq
    $custom = new class
    {
=======
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
>>>>>>> .merge_file_mDkFqP
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< HEAD
<<<<<<< .merge_file_3YXlOq
=======
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< .merge_file_i2OK2y
<<<<<<< HEAD
>>>>>>> .merge_file_mDkFqP
        /** @return array<string, \Filament\Tables\Columns\Column> */
        /** @return array<string, \Filament\Tables\Columns\Column> */
    public function getTableColumns(): array
=======
<<<<<<< .merge_file_3YXlOq
        /** @return array<string, Column> */
        /** @return array<string, Column> */
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
>>>>>>> .merge_file_mDkFqP
>>>>>>> laraxot/dev
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
