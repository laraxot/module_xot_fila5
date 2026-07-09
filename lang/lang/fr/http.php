<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/fr/http.php
return [
    404 => [
        'title' => 'Page introuvable',
        'description' => 'Désolé, cette page n\'existe pas.',
    ],
    503 => [
        'title' => 'Bientôt de retour.',
        'description' => 'Bientôt de retour.',
    ],
];
