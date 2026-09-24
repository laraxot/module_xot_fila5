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
<<<<<<< .merge_file_OLORjB
=======
<<<<<<< HEAD
>>>>>>> .merge_file_utcUmt
     * @param  array<int, string>  $channels  Canali di notifica disponibili
     * @param  string  $default_channel  Canale predefinito
     * @param  bool  $queue  Se accodare le notifiche
     * @param  array<string, mixed>  $mail  Configurazione email di notifica
     * @param  array<string, mixed>  $broadcast  Configurazione broadcast
     * @param  array<string, mixed>  $slack  Configurazione Slack
     * @param  array<string, mixed>  $telegram  Configurazione Telegram
<<<<<<< .merge_file_OLORjB
=======
=======
     * @param array<mixed> $channels        Canali di notifica disponibili
     * @param string       $default_channel Canale predefinito
     * @param bool         $queue           Se accodare le notifiche
     * @param array<mixed> $mail            Configurazione email di notifica
     * @param array<mixed> $broadcast       Configurazione broadcast
     * @param array<mixed> $slack           Configurazione Slack
     * @param array<mixed> $telegram        Configurazione Telegram
>>>>>>> laraxot/dev
>>>>>>> .merge_file_utcUmt
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
<<<<<<< .merge_file_OLORjB
    ) {}
=======
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_utcUmt

    /**
     * Create a new instance of NotificationData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_OLORjB
        return new self;
=======
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_utcUmt
    }
}
