<?php

declare(strict_types=1);

return [
    'actions' => [
        'export_xls' => [
            'label' => 'Excel exportieren',
<<<<<<< .merge_file_dvctDB
            'icon' => 'xot-files.xls',
=======
<<<<<<< HEAD
            'icon' => 'xot-files.xls',
=======
            'icon' => 'heroicon-o-arrow-down-tray',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_GFjFpE
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
<<<<<<< .merge_file_dvctDB
        'icon' => 'xot-files.xls',
=======
<<<<<<< HEAD
        'icon' => 'xot-files.xls',
=======
        'icon' => 'heroicon-o-puzzle-piece',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_GFjFpE
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
