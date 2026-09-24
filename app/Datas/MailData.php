<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class MailData - Gestisce la configurazione delle email.
 * Utilizzato nel contesto dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class MailData extends Data
{
    /**
<<<<<<< .merge_file_G7tJWn
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, int|string>  $smtpConfig
     * @param  array<string, string>  $fromConfig
=======
     * @param array<string, int|string> $smtpConfig
     * @param array<string, string>     $fromConfig
>>>>>>> laraxot/dev
=======
     * @param array<string, int|string> $smtpConfig
     * @param array<string, string>     $fromConfig
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  array<string, int|string>  $smtpConfig
     * @param  array<string, string>  $fromConfig
>>>>>>> .merge_file_vukfSf
     */
    public function __construct(
        public readonly string $driver = 'smtp',
        public readonly array $smtpConfig = [
            'host' => 'smtp.mailtrap.io',
            'port' => 2525,
            'encryption' => 'tls',
            'username' => '',
            'password' => '',
        ],
        public readonly array $fromConfig = [
            'address' => 'no-reply@example.com',
            'name' => 'Laraxot App',
        ],
        public readonly ?string $replyTo = null,
        public readonly bool $verifyPeer = true,
<<<<<<< .merge_file_G7tJWn
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
>>>>>>> .merge_file_vukfSf

    /**
     * Create a new instance of MailData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_G7tJWn
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
>>>>>>> .merge_file_vukfSf
    }
}
