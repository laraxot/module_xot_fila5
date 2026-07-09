<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/offer.php
// Split from labels/backend/takeaway.php

return array (
  'table' => 
  array (
    'id' => 'Id',
    'offer_percentage' => 'Offer %',
    'order_over' => 'Order Over',
    'valid_from' => 'Valid From',
    'valid_to' => 'Valid To',
    'status' => 'Offer Status',
    'created_at' => 'Created At',
  ),
  'management' => 'Offer Management',
  'create' => 'Create Management',
  'active' => 'Active Offer',
  'edit' => 'Edit Management',
  'tabs' => 
  array (
    'content' => 
    array (
      'overview' => 
      array (
        'status' => 'Status',
        'created_at' => 'Created At',
        'last_updated' => 'Last Updated',
        'deleted_at' => 'Deleted At',
      ),
    ),
  ),
);
