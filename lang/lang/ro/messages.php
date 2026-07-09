<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/ro/messages.php
return [
    'title' => 'Procesul de instalare Laravel',
    'next' => 'Pasul următor',
    'welcome' => [
        'title' => 'Bun venit în procesul de instalare...',
        'message' => 'Bun venit în configurarea asistată.',
    ],
    'requirements' => [
        'title' => 'Cerințe',
    ],
    'permissions' => [
        'title' => 'Permisiuni',
    ],
    'environment' => [
        'title' => 'Settări ale mediului',
        'save' => 'Salvează fișier .env',
        'success' => 'Setările tale au fost salvate în fișierul .env.',
        'errors' => 'Nu am putut salva fișierul .env, Te rugăm să-l creezi manual.',
    ],
    'final' => [
        'title' => 'Am terminat',
        'finished' => 'Aplicația a fost instalată cu succes.',
        'exit' => 'Click aici pentru a ieși',
    ],
];
