<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
<<<<<<< .merge_file_YP8XmC
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
    'actions' => [
        'export_xls' => [
            'label' => 'Esporta Excel',
            'icon' => 'heroicon-o-arrow-down-tray',
            'tooltip' => 'Esporta i dati in formato Excel (.xlsx]',
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_znL9b7
    'label' => 'Esporta Excel',
    'plural_label' => 'Esporta Excel',
    'icon' => 'xot-files.xls',
    'tooltip' => 'Esporta Excel (XLS)',
    'actions' => [
        'export_xls' => [
            'label' => 'Esporta Excel',
            'icon' => 'xot-files.xls',
            'tooltip' => 'Esporta i dati in formato Excel (.xlsx)',
<<<<<<< HEAD
<<<<<<< .merge_file_YP8XmC
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_znL9b7
=======
=======
// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/it/export_xls.php
return [
    'actions' => [
        'export_xls' => [
            'label' => 'Esporta Excel',
            'icon' => 'heroicon-o-arrow-down-tray',
            'tooltip' => 'Esporta i dati in formato Excel (.xlsx]',
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_YP8XmC
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
<<<<<<< HEAD
    'navigation' => [
        'label' => 'Export Xls',
>>>>>>> da9ae01a0 (.)
=======
    'label' => 'Export Xls',
    'plural_label' => 'Export Xls (Plurale)',
    'navigation' => [
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
    'navigation' => [
        'label' => 'Export Xls',
>>>>>>> .merge_file_znL9b7
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        'name' => 'Export Xls',
        'plural' => 'Export Xls',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
<<<<<<< HEAD
<<<<<<< .merge_file_YP8XmC
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
<<<<<<< HEAD
        'sort' => 1,
        'icon' => 'xot-files.xls',
>>>>>>> da9ae01a0 (.)
=======
        'label' => 'Export Xls',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
        'sort' => 1,
        'icon' => 'xot-files.xls',
>>>>>>> .merge_file_znL9b7
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
