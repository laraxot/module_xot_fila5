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
<<<<<<< .merge_file_PFfrBg
<<<<<<< HEAD
<<<<<<< HEAD
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock {}
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_jUaKYq
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock
{
}
=======
<<<<<<< HEAD
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock
{
}
=======
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock {}
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock
{
}
>>>>>>> .merge_file_l80ixZ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
abstract class XotBaseBuilderBlock extends FilamentBuilderBlock {}
>>>>>>> .merge_file_B9byTL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
