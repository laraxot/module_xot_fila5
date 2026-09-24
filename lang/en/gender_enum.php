<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
    'values' => [
        'f' => [
            'label' => 'Female',
            'icon' => 'heroicon-o-user',
            'color' => 'pink',
            'description' => 'Female gender',
        ],
        'm' => [
            'label' => 'Male',
            'icon' => 'heroicon-o-user',
            'color' => 'info',
            'description' => 'Male gender',
        ],
    ],
=======
// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/gender_enum.php
return [
>>>>>>> laraxot/dev
    'label' => 'Gender',
    'options' => [
        'f' => 'Female',
        'm' => 'Male',
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
