<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_p7yoZA
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, string|int>  $plans
     * @param  array<int, class-string<Model>>  $allowedModels
=======
     * @param array<string, string|int>       $plans
     * @param array<int, class-string<Model>> $allowedModels
>>>>>>> laraxot/dev
=======
     * @param array<string, string|int>                                     $plans
     * @param array<int, class-string<\Illuminate\Database\Eloquent\Model>> $allowedModels
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, string|int>  $plans
     * @param  array<int, class-string<Model>>  $allowedModels
>>>>>>> .merge_file_59Zxgj
=======
<<<<<<< HEAD
     * @param array<string, string|int>       $plans
     * @param array<int, class-string<Model>> $allowedModels
=======
     * @param array<string, string|int>                                     $plans
     * @param array<int, class-string<\Illuminate\Database\Eloquent\Model>> $allowedModels
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function __construct(
        public readonly bool $enable = false,
        public readonly string $driver = 'stripe',
        public readonly array $plans = [],
        public readonly string $currency = 'EUR',
        public readonly array $allowedModels = [],
        public readonly bool $trialEnabled = true,
        public readonly int $trialDays = 14,
<<<<<<< .merge_file_p7yoZA
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
>>>>>>> 3792da0d (Check & fix styling)
=======
    ) {}
>>>>>>> .merge_file_59Zxgj

    /**
     * Create a new instance of SubscriptionData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_p7yoZA
<<<<<<< HEAD
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
=======
        return new self();
>>>>>>> 3792da0d (Check & fix styling)
=======
        return new self;
>>>>>>> .merge_file_59Zxgj
    }
}
