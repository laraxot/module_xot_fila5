<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/set_default_tenant_for_urls.php
return [
    'actions' => [
        'authenticate' => [
            'label' => 'authenticate',
        ],
        'login' => [
            'label' => 'login',
        ],
        'request' => [
            'label' => 'request',
        ],
        'test' => [
            'label' => 'test',
        ],
    ],
    'fields' => [
        'email' => [
            'label' => 'email',
            'description' => 'email',
            'helper_text' => '',
            'placeholder' => 'email',
            'tooltip' => '',
        ],
        'password' => [
            'label' => 'password',
            'description' => 'password',
            'helper_text' => '',
            'placeholder' => 'password',
            'tooltip' => '',
        ],
        'remember' => [
            'label' => 'remember',
            'description' => 'remember',
            'helper_text' => '',
            'placeholder' => 'remember',
            'tooltip' => '',
        ],
        'cap' => [
            'description' => 'cap',
            'helper_text' => 'cap',
            'placeholder' => 'cap',
            'label' => 'cap',
            'tooltip' => '',
        ],
        'city' => [
            'description' => 'city',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
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
