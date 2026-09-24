<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Forms\Components\Builder;

use Filament\Forms\Components\Builder\Block as FilamentBuilderBlock;

/**
 * Base class for Builder\Block.
 *
 * Following Laraxot architectural pattern: never extend Filament classes directly.
 * This class wraps Filament's Builder\Block to provide a XotBase layer.
 *
 * Distinct from Modules\Xot\Filament\Blocks\XotBaseBlock, which follows a
 * different (static factory) pattern for CMS content blocks. Use this mirror
 * when a concrete class needs `extends Block` semantics, e.g. overriding
 * `make()`/`create()` while keeping the Filament\Forms\Components\Builder\Block API.
 */
<<<<<<< HEAD
<<<<<<< .merge_file_4V9pFK
=======
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock {}
=======
<<<<<<< .merge_file_jUaKYq
<<<<<<< HEAD
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock
{
}
=======
<<<<<<< HEAD
>>>>>>> .merge_file_rb9cod
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock
{
}
=======
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock {}
>>>>>>> laraxot/dev
<<<<<<< .merge_file_4V9pFK
=======
>>>>>>> laraxot/dev
=======
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock
{
}
>>>>>>> .merge_file_l80ixZ
>>>>>>> laraxot/dev
>>>>>>> .merge_file_rb9cod
