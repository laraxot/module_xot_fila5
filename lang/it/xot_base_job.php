<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/xot_base_job.php
return [
    'name' => 'name',
    'value' => 'value',
    'label' => 'Xot Base Job',
    'plural_label' => 'Xot Base Job (Plurale)',
    'navigation' => [
        'name' => 'Xot Base Job',
        'plural' => 'Xot Base Job',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Xot Base Job',
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
            'label' => 'Crea Xot Base Job',
        ],
        'edit' => [
            'label' => 'Modifica Xot Base Job',
        ],
        'delete' => [
            'label' => 'Elimina Xot Base Job',
        ],
    ],
];
