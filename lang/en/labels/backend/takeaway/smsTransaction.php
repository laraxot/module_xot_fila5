<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/smsTransaction.php
// Split from labels/backend/takeaway.php

return array (
  'tabs' => 
  array (
    'titles' => 
    array (
      'overview' => 'Overview',
      'history' => 'History',
    ),
    'content' => 
    array (
      'overview' => 
      array (
        'merchant_id' => 'Restaurant Name',
        'credits' => 'Credits',
        'status' => 'Status',
        'created_at' => 'Created At',
        'desc' => 'Description',
        'last_updated' => 'Last Updated',
      ),
    ),
  ),
  'table' => 
  array (
    'id' => 'Id',
    'merchant_id' => 'Restaurant Name',
    'sms_package_id' => 'Package Name',
    'credits' => 'Credits',
    'status' => 'Status',
    'paid_by' => 'Paid By',
    'created_at' => 'Created At',
  ),
  'management' => 'Sms Transaction Management',
  'active' => 'Active Sms Transaction',
  'create' => 'Create Sms Transaction',
  'edit' => 'Edit Sms Transaction',
  'view' => 'View Sms Transaction',
);
