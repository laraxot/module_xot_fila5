<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/labels/backend/takeaway/addOnCategory.php
// Split from labels/backend/takeaway.php

return array (
  'table' => 
  array (
    'id' => 'ID',
    'addon_cat_item_name' => 'AddOn Category Name',
    'addon_cat_desc' => 'AddOn Category Description',
    'status' => 'Status',
    'created_at' => 'Created At',
  ),
  'management' => 'AddOn Category Managment',
  'create' => 'Create AddOn Category ',
  'edit' => 'Edit AddOn Category',
  'active' => 'Active AddOn Category',
  'view' => 'View',
  'tabs' => 
  array (
    'content' => 
    array (
      'overview' => 
      array (
        'name' => 'Name',
        'desc' => 'Description',
        'status' => 'Status',
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
);
