<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/voucher.php
// Split from labels/backend/takeaway.php

return [
    'table' => [
        'id' => 'Id',
        'voucher_name' => 'Voucher Name',
        'voucher_type' => 'Type',
        'discount' => 'Discount',
        'expiry_date' => 'Expiration',
        'applicable_to_merchant' => 'Applicable To Restaurant',
        'voucher_status' => 'Voucher Status',
        'use_only_once' => 'Use Only Once',
        'used' => 'Used',
    ],
];
