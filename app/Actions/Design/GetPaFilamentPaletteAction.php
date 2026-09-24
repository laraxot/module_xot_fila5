<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Design;

use Filament\Support\Colors\Color;
use Spatie\QueueableAction\QueueableAction;

/**
 * Palette Design Comuni / PA per Filament (FO widget + pannelli admin).
 *
 * @see laravel/Themes/Sixteen/tailwind.config.js (primary verde, italia-blue)
 */
final class GetPaFilamentPaletteAction
{
    use QueueableAction;

    /** Verde PA — azioni primarie, CTA istituzionali */
<<<<<<< .merge_file_mHjdMS
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_wWOdKs
<<<<<<< HEAD
=======
>>>>>>> .merge_file_WendtL
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_M4uBBN
    public const string PRIMARY_HEX = '#007A52';

    /** Blu istituzionale — info, link header */
    public const string INSTITUTIONAL_BLUE_HEX = '#0066CC';
<<<<<<< .merge_file_mHjdMS
<<<<<<< HEAD
=======
<<<<<<< .merge_file_wWOdKs
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
    public const PRIMARY_HEX = '#007A52';

    /** Blu istituzionale — info, link header */
    public const INSTITUTIONAL_BLUE_HEX = '#0066CC';
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WendtL
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_M4uBBN

    /**
     * @return array<string, array<int, string>|string>
     */
    public function execute(): array
    {
        return [
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::hex(self::INSTITUTIONAL_BLUE_HEX),
            'primary' => Color::hex(self::PRIMARY_HEX),
            'success' => Color::Green,
            'warning' => Color::Orange,
        ];
    }
}
