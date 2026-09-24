<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class NotificationData - Gestisce la configurazione delle notifiche per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
class NotificationData extends Data
{
    /**
<<<<<<< HEAD
<<<<<<< .merge_file_xp8TyW
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_sEQ6QE
     * @param  array<int, string>  $channels  Canali di notifica disponibili
     * @param  string  $default_channel  Canale predefinito
     * @param  bool  $queue  Se accodare le notifiche
     * @param  array<string, mixed>  $mail  Configurazione email di notifica
     * @param  array<string, mixed>  $broadcast  Configurazione broadcast
     * @param  array<string, mixed>  $slack  Configurazione Slack
     * @param  array<string, mixed>  $telegram  Configurazione Telegram
<<<<<<< .merge_file_xp8TyW
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
     * @param array<int, string>   $channels        Canali di notifica disponibili
     * @param string               $default_channel Canale predefinito
     * @param bool                 $queue           Se accodare le notifiche
     * @param array<string, mixed> $mail            Configurazione email di notifica
     * @param array<string, mixed> $broadcast       Configurazione broadcast
     * @param array<string, mixed> $slack           Configurazione Slack
     * @param array<string, mixed> $telegram        Configurazione Telegram
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
=======
     * @param array<mixed> $channels        Canali di notifica disponibili
     * @param string       $default_channel Canale predefinito
     * @param bool         $queue           Se accodare le notifiche
     * @param array<mixed> $mail            Configurazione email di notifica
     * @param array<mixed> $broadcast       Configurazione broadcast
     * @param array<mixed> $slack           Configurazione Slack
     * @param array<mixed> $telegram        Configurazione Telegram
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_sEQ6QE
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function __construct(
        public readonly array $channels = ['mail', 'database'],
        public readonly string $default_channel = 'mail',
        public readonly bool $queue = true,
        public readonly array $mail = [
            'template' => 'mail.notification',
            'from' => [
                'address' => 'noreply@example.com',
                'name' => 'Laraxot App',
            ],
        ],
        public readonly array $broadcast = [
            'driver' => 'pusher',
            'app_id' => '',
            'app_key' => '',
            'app_secret' => '',
            'options' => [
                'cluster' => 'eu',
                'encrypted' => true,
            ],
        ],
        public readonly array $slack = [
            'webhook_url' => '',
        ],
        public readonly array $telegram = [
            'bot_token' => '',
            'chat_id' => '',
        ],
<<<<<<< .merge_file_xp8TyW
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
>>>>>>> .merge_file_sEQ6QE

    /**
     * Create a new instance of NotificationData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_xp8TyW
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
>>>>>>> .merge_file_sEQ6QE
    }
}
