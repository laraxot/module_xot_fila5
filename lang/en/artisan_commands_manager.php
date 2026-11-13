<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Comandi Artisan',
        'plural' => 'Comandi Artisan',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Artisan command management',
        ],
        'sort' => '28',
        'label' => 'Comandi Artisan',
        'icon' => 'heroicon-o-command-line',
    ],
    'pages' => [
        'artisan-commands' => [
            'title' => 'Artisan Commands Manager',
            'description' => 'Run and manage Artisan commands',
            'commands' => [
                'migrate' => [
                    'label' => 'Migrazione Database',
                    'description' => 'Runs the database migrations',
                ],
                'optimize' => [
                    'label' => 'Ottimizzazione',
                    'description' => 'Optimizes application performance',
                ],
                'cache' => [
                    'label' => 'Cache Management',
                    'description' => 'Commands for managing the cache',
                ],
            ],
            'notifications' => [
                'success' => 'Command executed successfully',
                'error' => 'Error while running the command',
            ],
        ],
    ],
    'actions' => [
        'queue_restart' => [
            'label' => 'queue_restart',
        ],
        'event_cache' => [
            'label' => 'event_cache',
        ],
        'route_cache' => [
            'label' => 'route_cache',
        ],
        'config_cache' => [
            'label' => 'config_cache',
        ],
        'view_cache' => [
            'label' => 'view_cache',
        ],
        'filament_optimize' => [
            'label' => 'filament_optimize',
        ],
        'filament_upgrade' => [
            'label' => 'filament_upgrade',
        ],
        'migrate' => [
            'label' => 'migrate',
        ],
    ],
    'title' => 'Artisan Commands Manager',
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
