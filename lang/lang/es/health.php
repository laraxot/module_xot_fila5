<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/es/health.php
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
];
