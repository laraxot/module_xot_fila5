<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_NanyB1
<<<<<<< HEAD
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_gp9MNg
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev

use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use PHPUnit\Framework\Assert;

uses(PHPUnit\Framework\TestCase::class);

/**
 * @param object $instance
 */
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======

>>>>>>> .merge_file_YmW2pL
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_wXxexd
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< .merge_file_NanyB1
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_gp9MNg
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_YmW2pL
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_wXxexd
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
function invokeProtectedSortHook(object $instance, string $method): mixed
{
    $reflection = new ReflectionMethod($instance, $method);

    return $reflection->invoke($instance);
}

test('XotBaseResourceTable non dichiara hook di sort predefiniti', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_NanyB1
<<<<<<< HEAD
<<<<<<< HEAD
    $table = new class extends XotBaseResourceTable
    {
        /** @return array<string, Column> */
=======
<<<<<<< .merge_file_gp9MNg
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
<<<<<<< .merge_file_gp9MNg
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    $table = new class extends XotBaseResourceTable
    {
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
        /** @return array<string, Column> */
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    $table = new class extends XotBaseResourceTable {
        /** @return array<string, Column> */
>>>>>>> .merge_file_YmW2pL
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
    $table = new class extends XotBaseResourceTable
    {
        /** @return array<string, Column> */
>>>>>>> .merge_file_wXxexd
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_NanyB1
<<<<<<< HEAD
<<<<<<< HEAD
    $table = new class extends XotBaseResourceTable
    {
        /** @return array<string, Column> */
=======
<<<<<<< .merge_file_gp9MNg
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
<<<<<<< .merge_file_gp9MNg
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    $table = new class extends XotBaseResourceTable
    {
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
        /** @return array<string, Column> */
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    $table = new class extends XotBaseResourceTable {
        /** @return array<string, Column> */
>>>>>>> .merge_file_YmW2pL
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
    $table = new class extends XotBaseResourceTable
    {
        /** @return array<string, Column> */
>>>>>>> .merge_file_wXxexd
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
