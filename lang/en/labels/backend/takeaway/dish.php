<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/dish.php
// Split from labels/backend/takeaway.php

return array (
  'table' => 
  array (
    'id' => 'Id',
    'name' => 'Name',
    'status' => 'Status',
    'icon' => 'Icon',
    'created_at' => 'Created At',
  ),
  'tabs' => 
  array (
    'titles' => 
    array (
      'overview' => 'Overview',
      'history' => 'History',
    ),
  ),
  'management' => 'Dish Management',
  'view' => 'View Dish',
  'create' => 'Create Dish',
  'edit' => 'Edit Dish',
  'active' => 'Active Dish',
);
