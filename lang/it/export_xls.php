<?php

declare(strict_types=1);

return [
<<<<<<< .merge_file_EDZ04a
=======
<<<<<<< HEAD
>>>>>>> .merge_file_ttR9IZ
    'label' => 'Esporta Excel',
    'plural_label' => 'Esporta Excel',
    'icon' => 'xot-files.xls',
    'tooltip' => 'Esporta Excel (XLS)',
<<<<<<< .merge_file_EDZ04a
    'actions' => [
        'export_xls' => [
            'label' => 'Esporta Excel',
            'icon' => 'xot-files.xls',
            'tooltip' => 'Esporta i dati in formato Excel (.xlsx)',
=======
    'actions' => [
        'export_xls' => [
            'label' => 'Esporta Excel',
            'icon' => 'xot-files.xls',
            'tooltip' => 'Esporta i dati in formato Excel (.xlsx)',
=======
    'actions' => [
        'export_xls' => [
            'label' => 'Esporta Excel',
            'icon' => 'heroicon-o-arrow-down-tray',
            'tooltip' => 'Esporta i dati in formato Excel (.xlsx]',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ttR9IZ
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
<<<<<<< .merge_file_EDZ04a
    'navigation' => [
        'label' => 'Export Xls',
=======
<<<<<<< HEAD
    'navigation' => [
        'label' => 'Export Xls',
=======
    'label' => 'Export Xls',
    'plural_label' => 'Export Xls (Plurale)',
    'navigation' => [
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ttR9IZ
        'name' => 'Export Xls',
        'plural' => 'Export Xls',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
<<<<<<< .merge_file_EDZ04a
        'sort' => 1,
        'icon' => 'xot-files.xls',
=======
<<<<<<< HEAD
        'sort' => 1,
        'icon' => 'xot-files.xls',
=======
        'label' => 'Export Xls',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ttR9IZ
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
