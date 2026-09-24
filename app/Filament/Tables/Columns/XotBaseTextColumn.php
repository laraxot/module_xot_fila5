<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn as FilamentTextColumn;

/**
 * Base class for text columns.
 *
 * Following Laraxot architectural pattern: never extend Filament classes directly.
 * This class wraps Filament's TextColumn to provide a XotBase layer.
 *
 * @method static static make(string $name) Create a new instance of the column
 */
<<<<<<< HEAD
<<<<<<< .merge_file_YWnpUP
=======
abstract class XotBaseTextColumn extends FilamentTextColumn {}
=======
<<<<<<< .merge_file_5NDJtI
<<<<<<< HEAD
abstract class XotBaseTextColumn extends FilamentTextColumn
{
}
=======
<<<<<<< HEAD
>>>>>>> .merge_file_r8RhKY
abstract class XotBaseTextColumn extends FilamentTextColumn
{
}
=======
abstract class XotBaseTextColumn extends FilamentTextColumn {}
>>>>>>> laraxot/dev
<<<<<<< .merge_file_YWnpUP
=======
>>>>>>> laraxot/dev
=======
abstract class XotBaseTextColumn extends FilamentTextColumn
{
}
>>>>>>> .merge_file_QXf828
>>>>>>> laraxot/dev
>>>>>>> .merge_file_r8RhKY
