<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_gp9MNg
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)

use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use PHPUnit\Framework\Assert;

uses(PHPUnit\Framework\TestCase::class);

/**
 * @param object $instance
 */
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======

>>>>>>> .merge_file_YmW2pL
>>>>>>> laraxot/dev
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_gp9MNg
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_YmW2pL
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
function invokeProtectedSortHook(object $instance, string $method): mixed
{
    $reflection = new ReflectionMethod($instance, $method);

    return $reflection->invoke($instance);
}

test('XotBaseResourceTable non dichiara hook di sort predefiniti', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
    $table = new class extends XotBaseResourceTable
    {
        /** @return array<string, Column> */
=======
<<<<<<< .merge_file_gp9MNg
=======
>>>>>>> 8d801bbe (Check & fix styling)
    $table = new class extends XotBaseResourceTable
    {
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
        /** @return array<string, Column> */
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
    $table = new class extends XotBaseResourceTable {
        /** @return array<string, Column> */
>>>>>>> .merge_file_YmW2pL
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
        public function getTableColumns(): array
        {
            return [];
        }

        public static function getModelClass(): string
        {
            return DummyTestModel::class;
        }
    };

    $reflection = new ReflectionClass($table);

    Assert::assertFalse($reflection->hasMethod('getTableSortColumn'));
    Assert::assertFalse($reflection->hasMethod('getTableSortDirection'));
});

test('getTableSortColumn override su XotBaseResourceTable', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
    $table = new class extends XotBaseResourceTable
    {
        /** @return array<string, Column> */
=======
<<<<<<< .merge_file_gp9MNg
=======
>>>>>>> 8d801bbe (Check & fix styling)
    $table = new class extends XotBaseResourceTable
    {
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
<<<<<<< HEAD
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
        /** @return array<string, Column> */
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
    $table = new class extends XotBaseResourceTable {
        /** @return array<string, Column> */
>>>>>>> .merge_file_YmW2pL
>>>>>>> laraxot/dev
=======
        /** @return array<string, Column> */
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
        public function getTableColumns(): array
        {
            return [];
        }

        public static function getModelClass(): string
        {
            return DummyTestModel::class;
        }

        public function getTableSortColumn(): string
        {
            return 'custom.id';
        }

        public function getTableSortDirection(): string
        {
            return 'asc';
        }
    };

    Assert::assertSame('custom.id', invokeProtectedSortHook($table, 'getTableSortColumn'));
    Assert::assertSame('asc', invokeProtectedSortHook($table, 'getTableSortDirection'));
});
