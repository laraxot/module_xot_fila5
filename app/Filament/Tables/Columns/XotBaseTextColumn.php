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
<<<<<<< .merge_file_LiDWal
<<<<<<< HEAD
<<<<<<< HEAD
abstract class XotBaseTextColumn extends FilamentTextColumn {}
=======
<<<<<<< .merge_file_5NDJtI
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
abstract class XotBaseTextColumn extends FilamentTextColumn
{
}
=======
<<<<<<< HEAD
abstract class XotBaseTextColumn extends FilamentTextColumn
{
}
=======
abstract class XotBaseTextColumn extends FilamentTextColumn {}
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
abstract class XotBaseTextColumn extends FilamentTextColumn
{
}
>>>>>>> .merge_file_QXf828
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
abstract class XotBaseTextColumn extends FilamentTextColumn {}
>>>>>>> .merge_file_x8kbuu
