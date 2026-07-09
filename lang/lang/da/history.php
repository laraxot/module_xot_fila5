<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/da/history.php
return [
    'backend' => [
        'none' => 'Der er ingen historik.',
        'none_for_type' => 'Der er ingen historik af denne type.',
        'none_for_entity' => 'Der er ingen historik for :entity.',
        'recent_history' => 'Seneste Historik',
        'roles' => [
            'created' => 'oprettede rollen',
            'deleted' => 'slettede rollen',
            'updated' => 'opdaterede rollen',
        ],
        'users' => [
            'changed_password' => 'skiftede adgangskoden for brugeren',
            'created' => 'oprettede brugeren',
            'deactivated' => 'deaktiverede brugeren',
            'deleted' => 'slettede brugeren',
            'permanently_deleted' => 'slettede permanent brugeren',
            'updated' => 'opdaterede brugeren',
            'reactivated' => 'genatkiverede brugeren',
            'restored' => 'genskabte brugeren',
        ],
    ],
];
