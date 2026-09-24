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
{
    // Logica comune futura per i placeholder Xot
<<<<<<< .merge_file_NM45gF
=======
    /**
     * Compatibilità con l'API di `Filament\Forms\Components\Placeholder`:
     * le sottoclassi esistenti usano `->content()`, che ora imposta lo `state()`.
     */
    public function content(mixed $content): static
    {
        $this->state($content);

        return $this;
    }

    public function getContent(): mixed
    {
        return $this->getState();
    }
>>>>>>> laraxot/dev
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
{
    // Logica comune futura per i placeholder Xot
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_bkSUDZ
}
