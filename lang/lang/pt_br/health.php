<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/pt_br/health.php
return [
    'pages' => [
        'health_check_results' => [
            'buttons' => [
                'refresh' => 'Recarregar',
            ],

            'heading' => 'Saúde da aplicação',

            'navigation' => [
                'group' => 'Configurações',
                'label' => 'Saúde da aplicação',
            ],

            'notifications' => [
                'check_results' => 'Ver resultados de verificação',
            ],
        ],
    ],
];
