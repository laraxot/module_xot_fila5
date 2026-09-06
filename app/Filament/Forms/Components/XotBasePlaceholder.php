<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Forms\Components;

<<<<<<< HEAD
use Filament\Infolists\Components\TextEntry;

/**
 * Base class for read-only form display components.
 *
 * Filament v5: {@see Placeholder} è deprecato — usiamo {@see TextEntry} con `state()`.
 *
 * @method static static make(string $name)
 */
class XotBasePlaceholder extends TextEntry
=======
use Filament\Forms\Components\Placeholder;

/**
 * Base class for placeholder form components.
 *
 * Extends Filament Placeholder to provide a standardized base class
 * following Laraxot architecture rules.
 *
 * @method static static make(string $name)
 */
class XotBasePlaceholder extends Placeholder
>>>>>>> 7f6cf6be (.)
{
    // Logica comune futura per i placeholder Xot
}
