<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/copy_from_last_year_button.php
return [
    'actions' => [
        'copy_from_last_year' => [
            'label' => 'copy_from_last_year',
        ],
    ],
    'label' => 'Copy From Last Year Button',
    'plural_label' => 'Copy From Last Year Button (Plurale)',
    'navigation' => [
        'name' => 'Copy From Last Year Button',
        'plural' => 'Copy From Last Year Button',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Copy From Last Year Button',
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
