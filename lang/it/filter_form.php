<?php

declare(strict_types=1);

return [
    'sections' => [
<<<<<<< HEAD
        'Filtri' => ['label' => 'Filtri', 'heading' => 'Filtri'],
    ],
    'fields' => [
        'created_from' => ['label' => 'created_from', 'placeholder' => 'created_from', 'helper_text' => 'created_from', 'description' => 'created_from', 'tooltip' => ''],
        'created_until' => ['label' => 'created_until', 'placeholder' => 'created_until', 'helper_text' => 'created_until', 'description' => 'created_until', 'tooltip' => ''],
=======
        'Filtri' => [
            'label' => 'Filtri',
            'heading' => 'Filtri',
        ],
    ],
    'fields' => [
        'created_from' => [
            'label' => 'created_from',
            'placeholder' => 'created_from',
            'helper_text' => 'created_from',
            'description' => 'created_from',
            'tooltip' => '',
        ],
        'created_until' => [
            'label' => 'created_until',
            'placeholder' => 'created_until',
            'helper_text' => 'created_until',
            'description' => 'created_until',
            'tooltip' => '',
        ],
>>>>>>> laraxot/dev
    ],
    'label' => 'Filter Form',
    'plural_label' => 'Filter Form (Plurale)',
    'navigation' => [
        'name' => 'Filter Form',
        'plural' => 'Filter Form',
<<<<<<< HEAD
        'group' => ['name' => 'General', 'description' => 'General Settings'],
=======
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
>>>>>>> laraxot/dev
        'label' => 'Filter Form',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
<<<<<<< HEAD
        'create' => ['label' => 'Crea Filter Form'],
        'edit' => ['label' => 'Modifica Filter Form'],
        'delete' => ['label' => 'Elimina Filter Form'],
=======
        'create' => [
            'label' => 'Crea Filter Form',
        ],
        'edit' => [
            'label' => 'Modifica Filter Form',
        ],
        'delete' => [
            'label' => 'Elimina Filter Form',
        ],
>>>>>>> laraxot/dev
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
    ],
];
