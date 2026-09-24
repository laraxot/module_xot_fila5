<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
<<<<<<< HEAD
    'values' => [
        'yes' => [
            'label' => 'Sì',
            'icon' => 'heroicon-o-check-circle',
            'color' => 'success',
            'description' => 'Valore affermativo',
        ],
        'no' => [
            'label' => 'No',
            'icon' => 'heroicon-o-x-circle',
            'color' => 'danger',
            'description' => 'Valore negativo',
        ],
    ],
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/yes_no_enum.php
return [
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
