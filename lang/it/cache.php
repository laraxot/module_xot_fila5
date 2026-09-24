<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'cache',
        'plural' => 'cache',
        'group' => [
            'name' => 'Admin',
        ],
<<<<<<< .merge_file_Bfa6Ox
        'label' => 'cache.navigation',
        'icon' => 'cache.navigation',
        'sort' => 90,
=======
<<<<<<< HEAD
        'label' => 'cache.navigation',
        'icon' => 'cache.navigation',
        'sort' => 90,
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_5AjT7f
    ],
    'pages' => [
        'health_check_results' => [
            'buttons' => [
                'refresh' => 'Refresh',
            ],
            'heading' => 'Application Health',
            'navigation' => [
                'group' => 'Settings',
                'label' => 'Application Health',
            ],
            'notifications' => [
                'check_results' => 'Check results from',
            ],
        ],
    ],
    'label' => 'Cache',
    'plural_label' => 'Cache (Plurale)',
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
<<<<<<< .merge_file_Bfa6Ox
=======
<<<<<<< HEAD
>>>>>>> .merge_file_5AjT7f
        'key' => [
            'label' => 'key',
            'placeholder' => 'key',
            'helper_text' => 'key',
            'description' => 'key',
        ],
        'value' => [
            'label' => 'value',
            'placeholder' => 'value',
            'helper_text' => '',
            'description' => 'value',
        ],
        'expiration' => [
            'label' => 'expiration',
            'placeholder' => 'expiration',
            'helper_text' => 'expiration',
            'description' => 'expiration',
        ],
<<<<<<< .merge_file_Bfa6Ox
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_5AjT7f
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Cache',
<<<<<<< .merge_file_Bfa6Ox
=======
<<<<<<< HEAD
>>>>>>> .merge_file_5AjT7f
            'icon' => 'create',
            'tooltip' => 'create',
        ],
        'edit' => [
            'label' => 'Modifica Cache',
            'icon' => 'edit',
            'tooltip' => 'edit',
        ],
        'delete' => [
            'label' => 'Elimina Cache',
            'icon' => 'delete',
            'tooltip' => 'delete',
        ],
        'createAnother' => [
            'label' => 'createAnother',
            'icon' => 'createAnother',
            'tooltip' => 'createAnother',
        ],
        'save' => [
            'label' => 'save',
            'icon' => 'save',
            'tooltip' => 'save',
        ],
        'view' => [
            'label' => 'view',
            'icon' => 'view',
            'tooltip' => 'view',
        ],
        'route:list' => [
            'label' => 'route:list',
            'icon' => 'route:list',
            'tooltip' => 'route:list',
        ],
        'icons:cache' => [
            'label' => 'icons:cache',
            'icon' => 'icons:cache',
            'tooltip' => 'icons:cache',
        ],
        'filament:cache-components' => [
            'label' => 'filament:cache-components',
            'icon' => 'filament:cache-components',
            'tooltip' => 'filament:cache-components',
        ],
        'filament:clear-cached-components' => [
            'label' => 'filament:clear-cached-components',
            'icon' => 'filament:clear-cached-components',
            'tooltip' => 'filament:clear-cached-components',
<<<<<<< .merge_file_Bfa6Ox
=======
=======
        ],
        'edit' => [
            'label' => 'Modifica Cache',
        ],
        'delete' => [
            'label' => 'Elimina Cache',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_5AjT7f
        ],
    ],
];
