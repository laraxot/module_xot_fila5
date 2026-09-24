<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/health_overview.php
return [
    'sections' => [
        'empty' => [
            'label' => 'empty',
            'heading' => 'empty',
        ],
    ],
    'label' => 'Health Overview',
    'plural_label' => 'Health Overview (Plurale)',
    'navigation' => [
        'name' => 'Health Overview',
        'plural' => 'Health Overview',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Health Overview',
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
            'label' => 'Crea Health Overview',
        ],
        'edit' => [
            'label' => 'Modifica Health Overview',
        ],
        'delete' => [
            'label' => 'Elimina Health Overview',
        ],
    ],
];
