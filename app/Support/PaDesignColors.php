<?php

declare(strict_types=1);

namespace Modules\Xot\Support;

use Filament\Support\Colors\Color;
use Modules\Xot\Enums\PaDesignColorEnum;

/**
 * Palette Design Comuni / PA per Filament (FO widget + pannelli admin).
 *
 * @see laravel/Themes/Sixteen/tailwind.config.js (primary verde, italia-blue)
 */
final class PaDesignColors
{
    /**
     * Colori Filament per tutti i panel che usano MetatagData / ApplyMetatagToPanelAction.
     *
     * @return array<string, array<int, string>>
     */
    public static function filamentPalette(): array
    {
        return [
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::hex(PaDesignColorEnum::InstitutionalBlue->value),
            'primary' => Color::hex(PaDesignColorEnum::Primary->value),
            'success' => Color::Green,
            'warning' => Color::Orange,
        ];
    }
}
