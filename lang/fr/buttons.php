<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/fr/buttons.php
return [
    'backend' => [
        'access' => [
            'users' => [
                'activate' => 'Activer',
                'change_password' => 'Changer de mot de passe',
                'deactivate' => 'Désactiver',
                'delete_permanently' => 'Supprimer définitivement',
                'login_as' => 'Se connecter avec :user',
                'resend_email' => 'Renvoyer le mail de confirmation',
                'restore_user' => 'Ré-activer l\'utilisateur',
            ],
        ],
    ],
    'emails' => [
        'auth' => [
            'confirm_account' => 'Confirm Account',
            'reset_password' => 'Reset Password',
        ],
    ],
    'general' => [
        'cancel' => 'Annuler',
        'crud' => [
            'create' => 'Créer',
            'delete' => 'Supprimer',
            'edit' => 'Editer',
            'update' => 'Mettre à jour',
            'view' => 'View',
        ],
        'save' => 'Sauvegarder',
        'view' => 'Voir',
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
