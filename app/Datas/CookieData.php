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
<<<<<<< .merge_file_4TrQgA
=======
<<<<<<< HEAD
>>>>>>> .merge_file_GQqLvC
 * @param  bool  $accept
 * @param  string  $type
 * @param  int  $durationDays
 * @param  string  $policyUrl
 * @param  string  $bannerStyle
<<<<<<< .merge_file_4TrQgA
=======
=======
 * @param bool   $accept
 * @param string $type
 * @param int    $durationDays
 * @param string $policyUrl
 * @param string $bannerStyle
>>>>>>> laraxot/dev
>>>>>>> .merge_file_GQqLvC
 */
final class CookieData extends Data
{
    public function __construct(
        public readonly bool $accept = false,
        public readonly string $type = 'necessary',
        public readonly int $durationDays = 365,
        public readonly string $policyUrl = '/cookie-policy',
        public readonly string $bannerStyle = 'bottom',
<<<<<<< .merge_file_4TrQgA
    ) {}
=======
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_GQqLvC

    /**
     * Create a new instance of CookieData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_4TrQgA
        return new self;
=======
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_GQqLvC
    }
}
