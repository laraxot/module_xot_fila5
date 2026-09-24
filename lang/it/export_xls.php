<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
<<<<<<< .merge_file_ykIOxF
<<<<<<< HEAD
=======
// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/export_xls.php
return [
>>>>>>> 8d801bbe (Check & fix styling)
    'actions' => [
        'export_xls' => [
            'label' => 'Esporta Excel',
            'icon' => 'heroicon-o-arrow-down-tray',
            'tooltip' => 'Esporta i dati in formato Excel (.xlsx]',
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_TElPiq
    'label' => 'Esporta Excel',
    'plural_label' => 'Esporta Excel',
    'icon' => 'xot-files.xls',
    'tooltip' => 'Esporta Excel (XLS)',
    'actions' => [
        'export_xls' => [
            'label' => 'Esporta Excel',
            'icon' => 'xot-files.xls',
            'tooltip' => 'Esporta i dati in formato Excel (.xlsx)',
<<<<<<< .merge_file_ykIOxF
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_TElPiq
            'placeholder' => 'Esporta in Excel',
            'help' => 'Scarica i dati correnti in formato Excel per analisi offline',
            'description' => 'Azione per esportare i dati in formato Excel',
            'success' => 'Esportazione Excel completata con successo',
            'error' => 'Si è verificato un errore durante l\'esportazione Excel',
            'modal' => [
                'heading' => 'Esporta in Excel',
                'description' => 'Seleziona le opzioni di esportazione per il file Excel',
                'confirm' => 'Esporta',
                'cancel' => 'Annulla',
            ],
            'options' => [
                'include_headers' => 'Includi intestazioni colonne',
                'format_dates' => 'Formatta date',
                'include_totals' => 'Includi totali',
            ],
        ],
    ],
<<<<<<< .merge_file_ykIOxF
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Export Xls',
    'plural_label' => 'Export Xls (Plurale)',
    'navigation' => [
=======
    'navigation' => [
        'label' => 'Export Xls',
>>>>>>> laraxot/dev
=======
    'label' => 'Export Xls',
    'plural_label' => 'Export Xls (Plurale)',
    'navigation' => [
>>>>>>> 8d801bbe (Check & fix styling)
=======
    'navigation' => [
        'label' => 'Export Xls',
>>>>>>> .merge_file_TElPiq
        'name' => 'Export Xls',
        'plural' => 'Export Xls',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
<<<<<<< .merge_file_ykIOxF
<<<<<<< HEAD
<<<<<<< HEAD
        'label' => 'Export Xls',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
=======
        'sort' => 1,
        'icon' => 'xot-files.xls',
>>>>>>> laraxot/dev
=======
        'label' => 'Export Xls',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
>>>>>>> 8d801bbe (Check & fix styling)
=======
        'sort' => 1,
        'icon' => 'xot-files.xls',
>>>>>>> .merge_file_TElPiq
    ],
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
];
