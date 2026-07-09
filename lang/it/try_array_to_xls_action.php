<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/try_array_to_xls_action.php
return [
    'name' => 'name',
    'dove' => 'dove',
    'label' => 'Try Array To Xls Action',
    'plural_label' => 'Try Array To Xls Action (Plurale)',
    'navigation' => [
        'name' => 'Try Array To Xls Action',
        'plural' => 'Try Array To Xls Action',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Try Array To Xls Action',
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
            'label' => 'Crea Try Array To Xls Action',
        ],
        'edit' => [
            'label' => 'Modifica Try Array To Xls Action',
        ],
        'delete' => [
            'label' => 'Elimina Try Array To Xls Action',
        ],
    ],
];
