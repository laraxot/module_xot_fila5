<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: resources/lang/it/set_default_tenant_for_urls.php
return [
    'fields' => [
        'email' => [
            'label' => 'email',
            'placeholder' => 'email',
            'helper_text' => 'email',
            'description' => 'email',
            'tooltip' => '',
        ],
        'password' => [
            'label' => 'password',
            'placeholder' => 'password',
            'helper_text' => 'password',
            'description' => 'password',
            'tooltip' => '',
        ],
        'remember' => [
            'label' => 'remember',
            'placeholder' => 'remember',
            'helper_text' => 'remember',
            'description' => 'remember',
            'tooltip' => '',
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
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
