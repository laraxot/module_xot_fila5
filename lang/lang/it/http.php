<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/it/http.php
return [
    404 => [
        'title' => 'Pagina Non Trovata',
        'description' => 'Spiacenti, la pagina che stavi cercando di visualizzare non esiste.',
    ],
    503 => [
        'title' => 'Torniamo subito.',
        'description' => 'Torniamo subito.',
    ],
];
