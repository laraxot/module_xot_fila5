<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

<<<<<<< .merge_file_sj2aNF
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eW29KK
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
<<<<<<< .merge_file_sj2aNF
     * @param  array<string, string|int>  $plans
     * @param  array<int, class-string<Model>>  $allowedModels
=======
<<<<<<< HEAD
     * @param  array<string, string|int>  $plans
     * @param  array<int, class-string<Model>>  $allowedModels
=======
     * @param array<string, string|int>                                     $plans
     * @param array<int, class-string<\Illuminate\Database\Eloquent\Model>> $allowedModels
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eW29KK
     */
    public function __construct(
        public readonly bool $enable = false,
        public readonly string $driver = 'stripe',
        public readonly array $plans = [],
        public readonly string $currency = 'EUR',
        public readonly array $allowedModels = [],
        public readonly bool $trialEnabled = true,
        public readonly int $trialDays = 14,
<<<<<<< .merge_file_sj2aNF
    ) {}
=======
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eW29KK

    /**
     * Create a new instance of SubscriptionData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_sj2aNF
        return new self;
=======
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eW29KK
    }
}
