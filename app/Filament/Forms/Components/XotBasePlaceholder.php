<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Forms\Components;

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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
=======
    // Logica comune futura per i placeholder Xot
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
}
