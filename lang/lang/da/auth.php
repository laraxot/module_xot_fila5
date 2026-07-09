<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/da/auth.php
return [
    'failed' => 'Disse legitimationsoplysninger passer ikke vores optegnelser.',
    'general_error' => 'Du har ikke adgang til at udføre denne handling.',
    'socialite' => [
        'unacceptable' => ':provider kan ikke anvendes som login.',
    ],
    'throttle' => 'For mange mislykkede forsøg. Prøv igen om :seconds sekunder.',
    'unknown' => 'Der opstod en ukendt fejl.',
];
