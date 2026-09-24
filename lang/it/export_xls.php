<?php

declare(strict_types=1);

return [
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
    'label' => 'Esporta Excel',
    'plural_label' => 'Esporta Excel',
    'icon' => 'xot-files.xls',
    'tooltip' => 'Esporta Excel (XLS)',
    'actions' => [
        'export_xls' => [
            'label' => 'Esporta Excel',
            'icon' => 'xot-files.xls',
            'tooltip' => 'Esporta i dati in formato Excel (.xlsx)',
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
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
>>>>>>> 3792da0d (Check & fix styling)
        'name' => 'Export Xls',
        'plural' => 'Export Xls',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
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
>>>>>>> 3792da0d (Check & fix styling)
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
