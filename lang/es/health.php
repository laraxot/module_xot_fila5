<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/es/health.php
return [
    'pages' => [
        'health_check_results' => [
            'buttons' => [
                'refresh' => 'Refrescar',
            ],
            'heading' => 'Salud de la aplicación',
            'navigation' => [
                'group' => 'Configuración',
                'label' => 'Salud de la aplicación',
            ],
            'notifications' => [
                'check_results' => 'Revisar resultados desde',
            ],
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
