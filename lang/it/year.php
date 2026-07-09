<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/year.php
return [
    'fields' => [
        'anno' => [
            'label' => 'anno',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'label' => 'Year',
    'plural_label' => 'Year (Plurale)',
    'navigation' => [
        'name' => 'Year',
        'plural' => 'Year',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Year',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Year',
        ],
        'edit' => [
            'label' => 'Modifica Year',
        ],
        'delete' => [
            'label' => 'Elimina Year',
        ],
    ],
];
