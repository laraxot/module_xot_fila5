<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/es/auth.php
return [
    'failed' => 'Las credenciales no se han encontrado.',
    'general_error' => 'No tiene suficientes permisos..',
    'socialite' => [
        'unacceptable' => ':provider no es un tipo de autenticación válida.',
    ],
    'throttle' => 'Demasiados intentos de inicio de sesión. Vuelva a intentarlo en :seconds segundos.',
    'unknown' => 'Se ha producido un error desconocido.',
];
