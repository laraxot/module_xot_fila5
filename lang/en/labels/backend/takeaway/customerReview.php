<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/customerReview.php
// Split from labels/backend/takeaway.php

return [
    'table' => [
        'id' => 'Id',
        'customer' => 'Customer',
        'rating' => 'Rating',
        'comments' => 'Comments',
        'status' => 'Status',
        'created_at' => 'Created At',
    ],
    'management' => 'Customer Review Management',
    'active' => ' Customer Review',
    'view' => 'View Customer Review',
    'create' => 'Create Customer Review',
    'edit' => 'Edit Customer Review',
];
