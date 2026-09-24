<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/main_dashboard.php
return [
    'sections' => [
        'empty' => [
            'label' => 'Vuoto',
            'heading' => 'Nessun Dato',
        ],
    ],
    'actions' => [
        'logout' => [
            'icon' => 'logout',
            'label' => 'logout',
            'tooltip' => 'logout',
        ],
        'profile' => [
            'icon' => 'profile',
            'label' => 'profile',
            'tooltip' => 'profile',
        ],
        'il-mio-profilo' => [
            'icon' => 'il-mio-profilo',
            'label' => 'il-mio-profilo',
            'tooltip' => 'il-mio-profilo',
        ],
    ],
    'label' => 'Main Dashboard',
    'plural_label' => 'Main Dashboard (Plurale)',
    'navigation' => [
        'name' => 'Main Dashboard',
        'plural' => 'Main Dashboard',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Main Dashboard',
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
];
