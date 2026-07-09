<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/nl/auth.php
return [
    'failed' => 'Toegangsgegevens niet gevonden',
    'general_error' => 'Je hebt niet de rechten om dat te doen.',
    'socialite' => [
        'unacceptable' => ':provider is niet een geaccepteerd login type.',
    ],
    'throttle' => 'Te veel aanmeld pogingen, probeer het nog eens na :seconds seconden.',
    'unknown' => 'Onbekende fout opgetreden',
];
