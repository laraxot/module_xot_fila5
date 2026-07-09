<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/de/alerts.php
return [
    'backend' => [
        'roles' => [
            'created' => 'Rolle erstellt.',
            'deleted' => 'Rolle gelöscht.',
            'updated' => 'Rolle aktualisiert.',
        ],
        'users' => [
            'confirmation_email' => 'Eine Aktivierungsmail wurde an die angegebene E-Mailadresse gesendet.',
            'created' => 'Benutzer erstellt.',
            'deleted' => 'Benutzer gelöscht.',
            'deleted_permanently' => 'Benutzer permanent gelöscht.',
            'restored' => 'Benutzer wiederhergestellt.',
            'updated' => 'Benutzer aktualisiert.',
            'updated_password' => 'Passwort des Benutzers aktualisiert.',
        ],
    ],
];
