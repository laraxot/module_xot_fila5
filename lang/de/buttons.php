<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/de/buttons.php
return [
    'backend' => [
        'access' => [
            'users' => [
                'activate' => 'Aktivieren',
                'change_password' => 'Passwort Ändern',
                'deactivate' => 'Deaktivieren',
                'delete_permanently' => 'Permanent löschen',
                'login_as' => 'Login As :user',
                'resend_email' => 'Aktivierungsmail erneut senden',
                'restore_user' => 'Benutzer wiederherstellen',
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
        'cancel' => 'Abbrechen',
        'crud' => [
            'create' => 'Erstellen',
            'delete' => 'Löschen',
            'edit' => 'Bearbeiten',
            'update' => 'Aktualisieren',
            'view' => 'View',
        ],
        'save' => 'Speichern',
        'view' => 'Anzeigen',
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
