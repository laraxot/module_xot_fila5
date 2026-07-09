<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/subscriber.php
// Split from labels/backend/takeaway.php

return [
    'table' => [
        'id' => 'Id',
        'subscribe_email' => 'Subscriber Email',
        'subscribe_ip' => 'Subscriber Ip',
        'created_at' => 'Created At',
        'status' => 'Status',
        'customer_id' => 'Customer Id',
        'total_price' => 'Total Price',
    ],
    'management' => 'Subscriber Management',
    'active' => 'Active Subscriber',
];
