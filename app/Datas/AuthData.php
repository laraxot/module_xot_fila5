<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class AuthData - Gestisce la configurazione dell'autenticazione.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class AuthData extends Data
{
    /**
<<<<<<< .merge_file_rUeSkr
=======
<<<<<<< HEAD
>>>>>>> .merge_file_hTABes
     * @param  array<string>  $guards
     * @param  array<string, array<string, string>>  $providers
     * @param  array<string, bool|int|string>  $throttle
     * @param  array<string, bool>  $social
<<<<<<< .merge_file_rUeSkr
=======
=======
     * @param array<string>                        $guards
     * @param array<string, array<string, string>> $providers
     * @param array<string, bool|int|string>       $throttle
     * @param array<string, bool>                  $social
>>>>>>> laraxot/dev
>>>>>>> .merge_file_hTABes
     */
    public function __construct(
        public readonly string $guard = 'web',
        public readonly array $guards = ['web', 'api'],
        public readonly array $providers = [
            'users' => ['driver' => 'eloquent', 'model' => ''],
        ],
        public readonly bool $verifyEmail = true,
        public readonly int $passwordResetTimeout = 60,
        public readonly array $throttle = [
            'enabled' => true,
            'decay_minutes' => 1,
            'max_attempts' => 5,
        ],
        public readonly array $social = [
            'google' => false,
            'facebook' => false,
            'twitter' => false,
            'github' => false,
        ],
<<<<<<< .merge_file_rUeSkr
    ) {}
=======
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_hTABes

    /**
     * Create a new instance of AuthData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_rUeSkr
        return new self;
=======
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_hTABes
    }
}
