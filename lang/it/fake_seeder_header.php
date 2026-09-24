<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/fake_seeder_header.php
return [
    'fields' => [
        'qty' => [
            'label' => 'qty',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'label' => 'Fake Seeder Header',
    'plural_label' => 'Fake Seeder Header (Plurale)',
    'navigation' => [
        'name' => 'Fake Seeder Header',
        'plural' => 'Fake Seeder Header',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Fake Seeder Header',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Fake Seeder Header',
        ],
        'edit' => [
            'label' => 'Modifica Fake Seeder Header',
        ],
        'delete' => [
            'label' => 'Elimina Fake Seeder Header',
        ],
    ],
];
