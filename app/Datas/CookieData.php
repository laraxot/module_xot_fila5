<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
<<<<<<< HEAD
 * Class CookieData - Gestisce la configurazione dei cookie per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class CookieData extends Data
{
    /**
     * @param bool   $accept         Se il cookie è stato accettato
     * @param string $type           Tipo di cookie (es. necessari, analitici, marketing)
     * @param int    $duration_days  Durata dei cookie in giorni
     * @param string $policy_url     URL della cookie policy
     * @param string $banner_style   Stile del banner dei cookie
     */
    public function __construct(
        public readonly bool $accept = false,
        public readonly string $type = 'necessary',
        public readonly int $duration_days = 365,
        public readonly string $policy_url = '/cookie-policy',
        public readonly string $banner_style = 'bottom',
    ) {}

    /**
     * Create a new instance of CookieData with default values.
     *
     * @return static
     */
    public static function make(): static
    {
        return new static();
=======
 * Class CookieData - Gestisce la configurazione dei cookie.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 *
 * @param bool   $accept
 * @param string $type
 * @param int    $durationDays
 * @param string $policyUrl
 * @param string $bannerStyle
 */
final class CookieData extends Data
{
    public function __construct(
        public readonly bool $accept = false,
        public readonly string $type = 'necessary',
        public readonly int $durationDays = 365,
        public readonly string $policyUrl = '/cookie-policy',
        public readonly string $bannerStyle = 'bottom',
    ) {
    }

    /**
     * Create a new instance of CookieData with default values.
     */
    public static function make(): self
    {
        return new self();
>>>>>>> c7fd73eb (.)
    }
}
