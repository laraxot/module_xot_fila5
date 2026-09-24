<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_XoVgQ3
=======
<<<<<<< .merge_file_S511wy
=======
>>>>>>> .merge_file_GAhQ1F
=======
<<<<<<< .merge_file_gp9MNg
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_XoVgQ3
=======
>>>>>>> .merge_file_Ih37XW
>>>>>>> .merge_file_GAhQ1F

use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use PHPUnit\Framework\Assert;

uses(PHPUnit\Framework\TestCase::class);

/**
 * @param object $instance
 */
<<<<<<< .merge_file_XoVgQ3
=======
<<<<<<< .merge_file_S511wy
=======
=======
>>>>>>> .merge_file_GAhQ1F
<<<<<<< HEAD
=======
=======
=======

>>>>>>> .merge_file_YmW2pL
>>>>>>> laraxot/dev
<<<<<<< .merge_file_XoVgQ3
=======
>>>>>>> .merge_file_Ih37XW
>>>>>>> .merge_file_GAhQ1F
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

uses(TestCase::class);

<<<<<<< .merge_file_XoVgQ3
=======
<<<<<<< .merge_file_S511wy
=======
>>>>>>> .merge_file_GAhQ1F
<<<<<<< HEAD
=======
<<<<<<< .merge_file_gp9MNg
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_YmW2pL
<<<<<<< .merge_file_XoVgQ3
=======
>>>>>>> .merge_file_Ih37XW
>>>>>>> .merge_file_GAhQ1F
>>>>>>> laraxot/dev
function invokeProtectedSortHook(object $instance, string $method): mixed
{
    $reflection = new ReflectionMethod($instance, $method);

    return $reflection->invoke($instance);
}

test('XotBaseResourceTable non dichiara hook di sort predefiniti', function (): void {
<<<<<<< .merge_file_XoVgQ3
<<<<<<< HEAD
=======
<<<<<<< .merge_file_S511wy
=======
<<<<<<< HEAD
    $table = new class extends XotBaseResourceTable
    {
        /** @return array<string, Column> */
=======
<<<<<<< .merge_file_gp9MNg
>>>>>>> .merge_file_Ih37XW
>>>>>>> .merge_file_GAhQ1F
    $table = new class extends XotBaseResourceTable
    {
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
<<<<<<< .merge_file_S511wy
        /** @return array<string, Column> */
=======
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
        /** @return array<string, Column> */
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
    $table = new class extends XotBaseResourceTable {
        /** @return array<string, Column> */
<<<<<<< .merge_file_XoVgQ3
=======
<<<<<<< .merge_file_gp9MNg
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
=======
    $table = new class extends XotBaseResourceTable {
        /** @return array<string, Column> */
>>>>>>> .merge_file_YmW2pL
=======
>>>>>>> .merge_file_YmW2pL
>>>>>>> .merge_file_Ih37XW
>>>>>>> .merge_file_GAhQ1F
>>>>>>> laraxot/dev
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
<<<<<<< .merge_file_XoVgQ3
=======
<<<<<<< .merge_file_S511wy
    $table = new class extends XotBaseResourceTable
    {
=======
>>>>>>> .merge_file_GAhQ1F
<<<<<<< HEAD
    $table = new class extends XotBaseResourceTable
    {
        /** @return array<string, Column> */
=======
<<<<<<< .merge_file_gp9MNg
    $table = new class extends XotBaseResourceTable
    {
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
<<<<<<< .merge_file_XoVgQ3
=======
>>>>>>> .merge_file_Ih37XW
>>>>>>> .merge_file_GAhQ1F
<<<<<<< HEAD
        /** @return array<string, \Filament\Tables\Columns\Column> */
=======
        /** @return array<string, Column> */
>>>>>>> laraxot/dev
<<<<<<< .merge_file_XoVgQ3
=======
<<<<<<< .merge_file_S511wy
=======
>>>>>>> .merge_file_GAhQ1F
>>>>>>> laraxot/dev
=======
    $table = new class extends XotBaseResourceTable {
        /** @return array<string, Column> */
>>>>>>> .merge_file_YmW2pL
>>>>>>> laraxot/dev
<<<<<<< .merge_file_XoVgQ3
=======
>>>>>>> .merge_file_Ih37XW
>>>>>>> .merge_file_GAhQ1F
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
