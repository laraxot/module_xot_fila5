<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class CookieData - Gestisce la configurazione dei cookie.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @param  bool  $accept
 * @param  string  $type
 * @param  int  $durationDays
 * @param  string  $policyUrl
 * @param  string  $bannerStyle
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
 * @param bool   $accept
 * @param string $type
 * @param int    $durationDays
 * @param string $policyUrl
 * @param string $bannerStyle
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
 */
final class CookieData extends Data
{
    public function __construct(
        public readonly bool $accept = false,
        public readonly string $type = 'necessary',
        public readonly int $durationDays = 365,
        public readonly string $policyUrl = '/cookie-policy',
        public readonly string $bannerStyle = 'bottom',
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
=======
    ) {
    }
>>>>>>> 8d801bbe (Check & fix styling)

    /**
     * Create a new instance of CookieData with default values.
     */
    public static function make(): self
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
=======
        return new self();
>>>>>>> 8d801bbe (Check & fix styling)
    }
}
