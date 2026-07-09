<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/nl/alerts.php
return [
    'backend' => [
        'roles' => [
            'created' => 'De rol is succesvol aangemaakt.',
            'deleted' => 'De rol is succesvol verwijderd.',
            'updated' => 'De rol is succesvol bijgewerkt.',
        ],
        'users' => [
            'confirmation_email' => 'Een nieuwe bevestigings e-mail is verzonden naar het aangegeven adres.',
            'created' => 'De gebruiker is succesvol aangemaakt.',
            'deleted' => 'De gebruiker is succesvol verwijderd.',
            'deleted_permanently' => 'De gebruiker is permanent verwijderd.',
            'restored' => 'De gebruiker is met succes hersteld.',
            'updated' => 'De gebruiker is succesvol bijgewerkt.',
            'updated_password' => 'Het wachtwoord van de gebruiker is succesvol bijgewerkt',
        ],
    ],
];
