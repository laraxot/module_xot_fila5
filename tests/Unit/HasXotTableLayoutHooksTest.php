<?php

declare(strict_types=1);
<<<<<<< .merge_file_6RMsp6
use Filament\Tables\Columns\Column;
=======
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
=======
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
use Filament\Tables\Columns\Column;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_cDTqzS
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Enums\RecordActionsPosition;
use Modules\Xot\Filament\Traits\HasXotTable;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
=======
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
>>>>>>> laraxot/dev
function invokeProtectedTableHook(object $instance, string $method): mixed
{
    $reflection = new ReflectionMethod($instance, $method);

    return $reflection->invoke($instance);
}

test('getTableFiltersLayout default e override', function (): void {
    $default = new class
    {
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_6RMsp6
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
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
>>>>>>> laraxot/dev
>>>>>>> .merge_file_cDTqzS
        {
            return [];
        }
    };

    Assert::assertSame(FiltersLayout::AboveContent, invokeProtectedTableHook($default, 'getTableFiltersLayout'));

    $custom = new class
    {
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_6RMsp6
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
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
>>>>>>> laraxot/dev
>>>>>>> .merge_file_cDTqzS
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
    $default = new class
    {
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_6RMsp6
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
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
>>>>>>> laraxot/dev
>>>>>>> .merge_file_cDTqzS
        {
            return [];
        }
    };

    Assert::assertSame(RecordActionsPosition::BeforeColumns, invokeProtectedTableHook($default, 'getTableRecordActionsPosition'));

    $custom = new class
    {
        use HasXotTable;

        public string $tableSearch = '';

<<<<<<< .merge_file_6RMsp6
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
<<<<<<< HEAD
        /** @return array<string, Column> */
        /** @return array<string, Column> */
        public function getTableColumns(): array
=======
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
>>>>>>> laraxot/dev
>>>>>>> .merge_file_cDTqzS
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
