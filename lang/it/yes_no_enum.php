<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/yes_no_enum.php
return [
    'label' => 'Sì/No',
    'options' => [
        'yes' => 'Sì',
        'no' => 'No',
    ],
    'plural_label' => 'Yes No Enum (Plurale)',
    'navigation' => [
        'name' => 'Yes No Enum',
        'plural' => 'Yes No Enum',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Yes No Enum',
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
            'label' => 'Crea Yes No Enum',
        ],
        'edit' => [
            'label' => 'Modifica Yes No Enum',
        ],
        'delete' => [
            'label' => 'Elimina Yes No Enum',
        ],
    ],
];
