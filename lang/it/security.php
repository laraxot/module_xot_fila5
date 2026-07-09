<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/security.php
return [
    'fields' => [
        'email' => [
            'label' => 'email',
            'placeholder' => 'email',
            'helper_text' => 'email',
            'description' => 'email',
        ],
        'password' => [
            'label' => 'password',
            'placeholder' => 'password',
            'helper_text' => 'password',
            'description' => 'password',
        ],
        'remember' => [
            'label' => 'remember',
            'placeholder' => 'remember',
            'helper_text' => 'remember',
            'description' => 'remember',
        ],
    ],
    'actions' => [
        'showPassword' => [
            'label' => 'showPassword',
            'icon' => 'showPassword',
            'tooltip' => 'showPassword',
        ],
        'hidePassword' => [
            'label' => 'hidePassword',
            'icon' => 'hidePassword',
            'tooltip' => 'hidePassword',
        ],
        'authenticate' => [
            'label' => 'authenticate',
            'icon' => 'authenticate',
            'tooltip' => 'authenticate',
        ],
    ],
];
