<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/da/buttons.php
return [
    'backend' => [
        'access' => [
            'users' => [
                'activate' => 'Aktivér',
                'change_password' => 'Skift adgangskode',
                'deactivate' => 'Deaktiver',
                'delete_permanently' => 'Slet permanent',
                'login_as' => 'Log ind som :user',
                'resend_email' => 'Gensend bekræftelsesmail',
                'restore_user' => 'Genskab bruger',
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
        'cancel' => 'Fortryd',
        'crud' => [
            'create' => 'Opret',
            'delete' => 'Slet',
            'edit' => 'Rediger',
            'update' => 'Opdater',
            'view' => 'View',
        ],
        'save' => 'Gem',
        'view' => 'Vis',
    ],
];
