<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/gender_enum.php
return [
    'label' => 'Genere',
    'options' => [
        'f' => 'Femmina',
        'm' => 'Maschio',
    ],
    'plural_label' => 'Gender Enum (Plurale)',
    'navigation' => [
        'name' => 'Gender Enum',
        'plural' => 'Gender Enum',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Gender Enum',
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
            'label' => 'Crea Gender Enum',
        ],
        'edit' => [
            'label' => 'Modifica Gender Enum',
        ],
        'delete' => [
            'label' => 'Elimina Gender Enum',
        ],
    ],
];
