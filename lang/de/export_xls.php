<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/de/export_xls.php
>>>>>>> 8d801bbe (Check & fix styling)
return [
    'actions' => [
        'export_xls' => [
            'label' => 'Excel exportieren',
<<<<<<< HEAD
<<<<<<< HEAD
            'icon' => 'heroicon-o-arrow-down-tray',
=======
            'icon' => 'xot-files.xls',
>>>>>>> laraxot/dev
=======
            'icon' => 'heroicon-o-arrow-down-tray',
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
<<<<<<< HEAD
        'icon' => 'heroicon-o-puzzle-piece',
=======
        'icon' => 'xot-files.xls',
>>>>>>> laraxot/dev
=======
        'icon' => 'heroicon-o-puzzle-piece',
>>>>>>> 8d801bbe (Check & fix styling)
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
