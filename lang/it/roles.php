<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/roles.php
return [
    'administrator' => 'Amministratore',
    'user' => 'Utente',
    'label' => 'Roles',
    'plural_label' => 'Roles (Plurale)',
    'navigation' => [
        'name' => 'Roles',
        'plural' => 'Roles',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Roles',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Roles',
        ],
        'edit' => [
            'label' => 'Modifica Roles',
        ],
        'delete' => [
            'label' => 'Elimina Roles',
        ],
    ],
];
