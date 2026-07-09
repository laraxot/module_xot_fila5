<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/sponserd.php
// Split from labels/backend/takeaway.php

return array (
  'table' => 
  array (
    'id' => 'Id',
    'merchant_id' => 'Restaurant Name',
    'expiry_date' => 'Expiry Date',
    'created_at' => 'Created At',
  ),
  'management' => 'Sponsored Management',
  'create' => 'Create Sponsored',
  'edit' => 'Edit',
  'active' => 'Active Sponsored',
  'view' => 'View Sponsored',
  'tabs' => 
  array (
    'content' => 
    array (
      'overview' => 
      array (
        'ing_name' => 'Name',
        'status' => 'Status',
        'created_at' => 'Created At',
        'last_updated' => 'Last Updated',
        'deleted_at' => 'Deleted At',
      ),
    ),
  ),
);
