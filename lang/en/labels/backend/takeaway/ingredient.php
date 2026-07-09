<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/ingredient.php
// Split from labels/backend/takeaway.php

return array (
  'tabs' => 
  array (
    'content' => 
    array (
      'overview' => 
      array (
        'ing_name' => 'Ingredient Name',
        'status' => 'Ingredient Status',
        'created_at' => 'Created At',
        'last_updated' => 'Last Updated',
        'deleted_at' => 'Deleted At',
      ),
    ),
    'titles' => 
    array (
      'overview' => 'Overview',
      'history' => 'History',
    ),
  ),
  'table' => 
  array (
    'id' => 'Id',
    'ing_name' => 'Ingredient Name',
    'status' => 'Status',
    'created_at' => 'Created At',
  ),
  'management' => 'Ingredient Management',
  'create' => 'Create Ingredient',
  'ing_name' => 'Ingredient Name',
  'status' => 'Ingredient Status',
  'edit' => 'Edit Ingredient',
  'active' => 'Active',
  'view' => 'View',
);
