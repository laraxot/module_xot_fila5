<?php

declare(strict_types=1);
<<<<<<< HEAD

return [
    'navigation' => [
        'name' => 'cache lock',
=======
return [
    'navigation' => [
        'name' => 'Blocco cache',
>>>>>>> laraxot/dev
        'plural' => 'cache locks',
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
