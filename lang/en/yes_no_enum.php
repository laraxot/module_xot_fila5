<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
    'values' => [
        'yes' => [
            'label' => 'Yes',
            'icon' => 'heroicon-o-check-circle',
            'color' => 'success',
            'description' => 'Affirmative value',
        ],
        'no' => [
            'label' => 'No',
            'icon' => 'heroicon-o-x-circle',
            'color' => 'danger',
            'description' => 'Negative value',
        ],
    ],
=======
// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/yes_no_enum.php
return [
>>>>>>> laraxot/dev
    'label' => 'Yes/No',
    'options' => [
        'yes' => 'Yes',
        'no' => 'No',
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
