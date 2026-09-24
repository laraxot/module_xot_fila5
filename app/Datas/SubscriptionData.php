<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< .merge_file_4PGVz7
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  array<string, string|int>  $plans
     * @param  array<int, class-string<Model>>  $allowedModels
>>>>>>> .merge_file_qVuezV
     */
    public function __construct(
        public readonly bool $enable = false,
        public readonly string $driver = 'stripe',
        public readonly array $plans = [],
        public readonly string $currency = 'EUR',
        public readonly array $allowedModels = [],
        public readonly bool $trialEnabled = true,
        public readonly int $trialDays = 14,
<<<<<<< .merge_file_4PGVz7
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
=======
    ) {}
>>>>>>> .merge_file_qVuezV

    /**
     * Create a new instance of SubscriptionData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_4PGVz7
<<<<<<< HEAD
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
=======
        return new self();
>>>>>>> 8d801bbe (Check & fix styling)
=======
        return new self;
>>>>>>> .merge_file_qVuezV
    }
}
