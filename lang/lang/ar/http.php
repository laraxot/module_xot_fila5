<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/ar/http.php
return [
    404 => [
        'title' => 'صفحة غير متوفرة',
        'description' => 'نعتذر ولكن الصفحة المطلوبة غير موجودة.',
    ],
    503 => [
        'title' => 'سنعود قريبا.',
        'description' => 'سنعود قريبا.',
    ],
];
