<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/it/auth.php
return [
    'failed' => 'Le credenziali non corrispondono a quelle registrate!',
    'general_error' => 'Non hai diritti sufficienti per questa operazione.',
    'socialite' => [
        'unacceptable' => ':provider non è supportato.',
    ],
    'throttle' => 'Troppi tentativi di login. Si prega di riprovare tra :seconds secondi.',
    'unknown' => 'Si è verificato un errore sconosciuto',
];
