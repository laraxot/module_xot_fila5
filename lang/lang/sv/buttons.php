<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/sv/buttons.php
return [
    'backend' => [
        'access' => [
            'users' => [
                'activate' => 'Aktivera',
                'change_password' => 'Byt lösenord',
                'deactivate' => 'Inaktivera',
                'resend_email' => 'Skicka bekräftelsemail igen.',
                'delete_permanently' => 'Radera permanent',
                'login_as' => 'Login As :user',
                'restore_user' => 'Återställ',
            ],
        ],
    ],
    'emails' => [
        'auth' => [
            'confirm_account' => 'Bekräfta konto',
            'reset_password' => 'Återställ lösenord',
        ],
    ],
    'general' => [
        'cancel' => 'Avbryt',
        'crud' => [
            'create' => 'Skapa',
            'delete' => 'Radera',
            'edit' => 'Redigera',
            'update' => 'Uppdatera',
            'view' => 'View',
        ],
        'save' => 'Spara',
        'view' => 'Granska',
    ],
];
