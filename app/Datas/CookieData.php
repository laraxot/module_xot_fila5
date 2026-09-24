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
 * @param  bool  $accept
 * @param  string  $type
 * @param  int  $durationDays
 * @param  string  $policyUrl
 * @param  string  $bannerStyle
=======
 * @param bool   $accept
 * @param string $type
 * @param int    $durationDays
 * @param string $policyUrl
 * @param string $bannerStyle
>>>>>>> laraxot/dev
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
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev

    /**
     * Create a new instance of CookieData with default values.
     */
    public static function make(): self
    {
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
    }
}
