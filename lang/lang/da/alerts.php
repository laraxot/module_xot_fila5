<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/da/alerts.php
return [
    'backend' => [
        'roles' => [
            'created' => 'Rollen blev oprettet.',
            'deleted' => 'Rollen blev slettet.',
            'updated' => 'Rollen blev opdateret.',
        ],
        'users' => [
            'confirmation_email' => 'En ny bekræftelsesmail er blevet sendt til adressen for brugeren.',
            'created' => 'Brugeren blev oprettet.',
            'deleted' => 'Brugeren blev slettet.',
            'deleted_permanently' => 'Brugeren blev slettet permanent.',
            'restored' => 'Brugeren blev genskabt.',
            'updated' => 'Brugeren blev opdateret.',
            'updated_password' => 'Brugerens adgangskode blev opdateret.',
        ],
    ],
];
