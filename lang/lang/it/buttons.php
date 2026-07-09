<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/it/buttons.php
return [
    'backend' => [
        'access' => [
            'users' => [
                'activate' => 'Attiva',
                'change_password' => 'Cambia password',
                'deactivate' => 'Disattiva',
                'delete_permanently' => 'Elimina definitivamente',
                'login_as' => 'Login As :user',
                'resend_email' => 'Reinvia e-mail di conferma',
                'restore_user' => 'Ripristina utente',
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
        'cancel' => 'Annulla',
        'crud' => [
            'create' => 'Crea',
            'delete' => 'Elimina',
            'edit' => 'Modifica',
            'update' => 'Aggiorna',
            'view' => 'View',
        ],
        'save' => 'Salva',
        'view' => 'Visualizza',
    ],
    'save' => 'Salva',
    'close' => 'Chiudi',
    'back' => 'Indietro',
    'confirm' => 'Conferma',
];
