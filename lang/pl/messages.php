<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/pl/messages.php
return [
    'title' => 'Laravel Instalator',
    'next' => 'Następny krok',
    'welcome' => [
        'title' => 'Instalacja Laravel',
        'message' => 'Witaj w kreatorze instalacji.',
    ],
    'requirements' => [
        'title' => 'Wymagania systemowe ',
    ],
    'permissions' => [
        'title' => 'Uprawnienia',
    ],
    'environment' => [
        'title' => 'Ustawnienia środowiska',
        'save' => 'Zapisz .env',
        'success' => 'Plik .env został poprawnie zainstalowany.',
        'errors' => 'Nie można zapisać pliku .env, Proszę utworzyć go ręcznie.',
    ],
    'final' => [
        'title' => 'Instalacja zakończona',
        'finished' => 'Aplikacja została poprawnie zainstalowana.',
        'exit' => 'Kliknij aby zakończyć',
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
    'fields' => [
    ],
    'actions' => [
    ],
];
