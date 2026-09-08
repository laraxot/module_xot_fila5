<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
=======
    'values' => [
        'spipu' => [
            'label' => 'Spipu',
            'icon' => 'heroicon-o-table-cells',
            'color' => 'info',
            'description' => 'Motore PDF basato su TCPDF/mPDF per report tabellari',
        ],
        'spatie' => [
            'label' => 'Spatie',
            'icon' => 'heroicon-o-document-text',
            'color' => 'primary',
            'description' => 'Motore PDF basato su DomPDF per documenti HTML/CSS',
        ],
    ],
>>>>>>> c7fd73eb (.)
    'label' => 'Motore PDF',
    'options' => [
        'spipu' => 'Spipu',
        'spatie' => 'Spatie',
    ],
    'plural_label' => 'Pdf Engine Enum (Plurale)',
    'navigation' => [
        'name' => 'Pdf Engine Enum',
        'plural' => 'Pdf Engine Enum',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Pdf Engine Enum',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
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
<<<<<<< HEAD
=======
        'spipu' => ['label' => 'spipu', 'placeholder' => 'spipu', 'helper_text' => 'spipu', 'description' => 'spipu'],
>>>>>>> c7fd73eb (.)
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Pdf Engine Enum',
        ],
        'edit' => [
            'label' => 'Modifica Pdf Engine Enum',
        ],
        'delete' => [
            'label' => 'Elimina Pdf Engine Enum',
        ],
    ],
<<<<<<< HEAD
=======
    'test' => 'pdf engine enum',
>>>>>>> c7fd73eb (.)
];
