<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/it/alerts.php
return [
    'backend' => [
        'roles' => [
            'created' => 'Ruolo creato con successo.',
            'deleted' => 'Ruolo cancellato con successo.',
            'updated' => 'Ruolo aggiornato con successo.',
        ],
        'users' => [
            'confirmation_email' => 'Una nuova e-mail di conferma è stata inviata all\'indirizzo registrato.',
            'created' => 'L\'utente è stato creato con successo',
            'deleted' => 'L\'utente è stato eliminato con successo.',
            'deleted_permanently' => 'L\'utente è stato eliminato definitivamente.',
            'restored' => 'L\'utente è stato ripristinato con successo.',
            'updated' => 'L\'utente è stato aggiornato con successo.',
            'updated_password' => 'La password dell\'utente è stata aggiornata con successo.',
        ],
    ],
];
