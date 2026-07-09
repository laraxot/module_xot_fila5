<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/en/http.php
return [
    404 => [
        'title' => 'Page Not Found',
        'description' => 'Sorry, but the page you were trying to view does not exist.',
    ],
    503 => [
        'title' => 'Be right back.',
        'description' => 'Be right back.',
    ],
];
