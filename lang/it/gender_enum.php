<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
<<<<<<< HEAD
    'values' => [
        'f' => [
            'label' => 'Femmina',
            'icon' => 'heroicon-o-user',
            'color' => 'pink',
            'description' => 'Genere femminile',
        ],
        'm' => [
            'label' => 'Maschio',
            'icon' => 'heroicon-o-user',
            'color' => 'info',
            'description' => 'Genere maschile',
        ],
    ],
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/gender_enum.php
return [
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
