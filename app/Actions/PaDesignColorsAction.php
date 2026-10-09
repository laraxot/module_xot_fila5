<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Modules\Xot\Enums\PaDesignColorEnum;
use Modules\Xot\Support\PaDesignColors;
use Spatie\QueueableAction\QueueableAction;

/**
 * Colori del design system PA (verde istituzionale, blu istituzionale) e
 * palette Filament corrispondente.
 *
 * @example
 * $palette = app(PaDesignColorsAction::class)->execute();
 * $filamentColors = app(PaDesignColorsAction::class)->filamentPalette();
 */
final class PaDesignColorsAction
{
    use QueueableAction;

    /**
     * @return array{primary: string, institutional_blue: string, danger: string, gray: string, info: string, success: string, warning: string}
     */
    public function execute(): array
    {
        return [
            'primary' => PaDesignColorEnum::Primary->value,
            'institutional_blue' => PaDesignColorEnum::InstitutionalBlue->value,
            'danger' => 'red',
            'gray' => 'zinc',
            'info' => 'blue',
            'success' => 'green',
            'warning' => 'orange',
        ];
    }

    /**
     * Colori Filament per il panel UI.
     *
     * @return array<string, array<int, string>>
     */
    public function filamentPalette(): array
    {
        return PaDesignColors::filamentPalette();
    }
}
