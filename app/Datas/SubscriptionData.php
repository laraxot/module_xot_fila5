<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class SubscriptionData - Gestisce la configurazione degli abbonamenti.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 *
 * @param bool $enable
 * @param string $driver
 * @param array<string, string|int> $plans
 * @param string $currency
 * @param array<int, class-string<\Illuminate\Database\Eloquent\Model>> $allowedModels
 * @param bool $trialEnabled
 * @param int $trialDays
 */
final class SubscriptionData extends Data
{
    public function __construct(
        public readonly bool $enable = false,
        public readonly string $driver = 'stripe',
        public readonly array $plans = [],
        public readonly string $currency = 'EUR',
        public readonly array $allowedModels = [],
        public readonly bool $trialEnabled = true,
        public readonly int $trialDays = 14,
    ) {
    }

    /**
     * Create a new instance of SubscriptionData with default values.
     */
    public static function make(): self
    {
        return new self();
    }
}
