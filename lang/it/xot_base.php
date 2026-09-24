<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/xot_base.php
return [
    'fields' => [
        'view' => [
            'label' => 'view',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'label' => 'Xot Base',
    'plural_label' => 'Xot Base (Plurale)',
    'navigation' => [
        'name' => 'Xot Base',
        'plural' => 'Xot Base',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Xot Base',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Xot Base',
        ],
        'edit' => [
            'label' => 'Modifica Xot Base',
        ],
        'delete' => [
            'label' => 'Elimina Xot Base',
        ],
    ],
];
