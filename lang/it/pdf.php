<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/pdf.php
return [
    'fields' => [
        'pdf' => [
            'label' => 'pdf',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'label' => 'Pdf',
    'plural_label' => 'Pdf (Plurale)',
    'navigation' => [
        'name' => 'Pdf',
        'plural' => 'Pdf',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Pdf',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Pdf',
        ],
        'edit' => [
            'label' => 'Modifica Pdf',
        ],
        'delete' => [
            'label' => 'Elimina Pdf',
        ],
    ],
];
