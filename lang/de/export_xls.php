<?php

declare(strict_types=1);

return [
    'actions' => [
        'export_xls' => [
            'label' => 'Excel exportieren',
<<<<<<< .merge_file_KHmOOI
<<<<<<< HEAD
<<<<<<< HEAD
            'icon' => 'heroicon-o-arrow-down-tray',
=======
            'icon' => 'xot-files.xls',
>>>>>>> laraxot/dev
=======
            'icon' => 'heroicon-o-arrow-down-tray',
>>>>>>> 3792da0d (Check & fix styling)
=======
            'icon' => 'xot-files.xls',
>>>>>>> .merge_file_HDSPcp
            'tooltip' => 'Daten im Excel-Format (.xlsx) exportieren',
            'placeholder' => 'Nach Excel exportieren',
            'help' => 'Aktuelle Daten im Excel-Format für Offline-Analyse herunterladen',
            'description' => 'Aktion zum Exportieren von Daten im Excel-Format',
            'success' => 'Excel-Export erfolgreich abgeschlossen',
            'error' => 'Beim Excel-Export ist ein Fehler aufgetreten',
            'modal' => [
                'heading' => 'Nach Excel exportieren',
                'description' => 'Exportoptionen für die Excel-Datei auswählen',
                'confirm' => 'Exportieren',
                'cancel' => 'Abbrechen',
            ],
            'options' => [
                'include_headers' => 'Spaltenüberschriften einschließen',
                'format_dates' => 'Daten formatieren',
                'include_totals' => 'Summen einschließen',
            ],
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
<<<<<<< .merge_file_KHmOOI
<<<<<<< HEAD
<<<<<<< HEAD
        'icon' => 'heroicon-o-puzzle-piece',
=======
        'icon' => 'xot-files.xls',
>>>>>>> laraxot/dev
=======
        'icon' => 'heroicon-o-puzzle-piece',
>>>>>>> 3792da0d (Check & fix styling)
=======
        'icon' => 'xot-files.xls',
>>>>>>> .merge_file_HDSPcp
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
