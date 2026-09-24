<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> laraxot/dev
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> laraxot/dev
use Spatie\LaravelData\Data;

/**
 * Class SubscriptionData - Gestisce la configurazione degli abbonamenti.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class SubscriptionData extends Data
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, string|int>  $plans
     * @param  array<int, class-string<Model>>  $allowedModels
=======
     * @param array<string, string|int>                                     $plans
     * @param array<int, class-string<\Illuminate\Database\Eloquent\Model>> $allowedModels
>>>>>>> laraxot/dev
=======
     * @param  array<string, string|int>  $plans
     * @param  array<int, class-string<Model>>  $allowedModels
>>>>>>> laraxot/dev
     */
    public function __construct(
        public readonly bool $enable = false,
        public readonly string $driver = 'stripe',
        public readonly array $plans = [],
        public readonly string $currency = 'EUR',
        public readonly array $allowedModels = [],
        public readonly bool $trialEnabled = true,
        public readonly int $trialDays = 14,
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
=======
    ) {}
>>>>>>> laraxot/dev

    /**
     * Create a new instance of SubscriptionData with default values.
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
        return new self;
>>>>>>> laraxot/dev
    }
}
