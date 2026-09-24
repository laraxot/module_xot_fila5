<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
<<<<<<< HEAD
=======
// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/en/export_xls.php
return [
>>>>>>> 8d801bbe (Check & fix styling)
    'actions' => [
        'export_xls' => [
            'label' => 'Export Excel',
            'icon' => 'heroicon-o-arrow-down-tray',
<<<<<<< HEAD
=======
    'label' => 'Export Xls',
    'plural_label' => 'Export Xls',
    'icon' => 'xot-files.xls',
    'tooltip' => 'Export Excel (XLS)',
    'actions' => [
        'export_xls' => [
            'label' => 'Export Excel',
            'icon' => 'xot-files.xls',
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
            'tooltip' => 'Export data in Excel format (.xlsx)',
            'placeholder' => 'Export to Excel',
            'help' => 'Download current data in Excel format for offline analysis',
            'description' => 'Action to export data in Excel format',
            'success' => 'Excel export completed successfully',
            'error' => 'An error occurred during Excel export',
            'modal' => [
                'heading' => 'Export to Excel',
                'description' => 'Select export options for the Excel file',
                'confirm' => 'Export',
                'cancel' => 'Cancel',
            ],
            'options' => [
                'include_headers' => 'Include column headers',
                'format_dates' => 'Format dates',
                'include_totals' => 'Include totals',
            ],
        ],
    ],
    'navigation' => [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
<<<<<<< HEAD
=======
        'label' => 'Export Xls',
        'plural_label' => 'Export Xls',
        'group' => 'General',
        'icon' => 'xot-files.xls',
        'sort' => 100,
    ],
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    'fields' => [
    ],
];
