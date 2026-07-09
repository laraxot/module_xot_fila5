<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/fr/alerts.php
return [
    'backend' => [
        'roles' => [
            'created' => 'Rôle créé avec succès.',
            'deleted' => 'Rôle supprimé avec succès.',
            'updated' => 'Rôle mis à jour avec succès.',
        ],
        'users' => [
            'confirmation_email' => 'Un email de confirmation a été adressé à l\'adresse indiquée',
            'created' => 'Utilisateur créé avec succès.',
            'deleted' => 'Utilisateur supprimé avec succès.',
            'deleted_permanently' => 'L\'utilisateur a été supprimé définitivement.',
            'restored' => 'L\'utilisateur a été ré-activé.',
            'updated' => 'Utilisateur mis à jour avec succès.',
            'updated_password' => 'Le mot de passe utilisateur a été mis à jour avec succès.',
        ],
    ],
];
