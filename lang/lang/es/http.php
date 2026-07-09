<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/es/http.php
return [
    404 => [
        'title' => 'La Página que intento acceder no ha sido encontrada.',
        'description' => 'Parece ser que la página que buscas no existe.',
    ],
    503 => [
        'title' => 'Servicio no disponible.',
        'description' => 'Volveremos en breve.',
    ],
];
