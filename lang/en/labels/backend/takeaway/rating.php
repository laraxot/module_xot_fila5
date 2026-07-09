<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/rating.php
// Split from labels/backend/takeaway.php

return [
    'view' => 'View',
    'table' => [
        'id' => 'Id',
        'range1' => 'Range 1',
        'range2' => 'Range 2',
        'rating' => 'Rating',
        'created_at' => 'Created At',
    ],
    'edit' => 'Edit Rating',
    'management' => 'Rating Management',
    'create' => 'Create Rating',
    'active' => 'active Rating',
    'tabs' => [
        'titles' => [
            'overview' => 'Overview',
            'history' => 'History',
        ],
        'content' => [
            'overview' => [
                'range1' => 'Range 1',
                'range2' => 'Range 2',
                'rating' => 'Rating',
                'created_at' => 'Created At',
                'last_updated' => 'Last Updated',
            ],
        ],
    ],
];
