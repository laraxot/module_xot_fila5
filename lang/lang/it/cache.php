<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/it/cache.php
return [
    'navigation' => [
        'name' => 'cache',
        'plural' => 'cache',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'pages' => [
        'health_check_results' => [
            'buttons' => [
                'refresh' => 'Refresh',
            ],

            'heading' => 'Application Health',

            'navigation' => [
                'group' => 'Settings',
                'label' => 'Application Health',
            ],

            'notifications' => [
                'check_results' => 'Check results from',
            ],
        ],
    ],
];
