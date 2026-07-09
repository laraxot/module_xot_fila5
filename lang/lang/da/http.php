<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/da/http.php
return [
    404 => [
        'title' => 'Siden findes ikke',
        'description' => 'Beklager, men siden, du forsøgte at se, findes ikke.',
    ],
    503 => [
        'title' => 'Er snart tilbage.',
        'description' => 'Er snart tilbage.',
    ],
];
