<?php

declare(strict_types=1);

return [
    'name' => 'Xot',
    'description' => 'Modulo base con funzionalità core e utilities',
<<<<<<< HEAD
    'icon' => 'xot-icon',
=======
    'icon' => 'heroicon-o-cube',
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    'navigation' => [
        'enabled' => true,
        'sort' => 110,
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\Xot\\Providers\\XotServiceProvider',
    ],
];
