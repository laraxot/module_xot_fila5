<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/es/messages.php
return [
    'title' => 'Instalador de Laravel',
    'next' => 'Siguiente',
    'finish' => 'Instalar',
    'welcome' => [
        'title' => 'Bienvenido al instalador',
        'message' => 'Bienvenido al asistente de configuración',
    ],
    'requirements' => [
        'title' => 'Requisitos',
    ],
    'permissions' => [
        'title' => 'Permisos',
    ],
    'environment' => [
        'title' => 'Configuraciones del entorno',
        'save' => 'Guardar archivo .env',
        'success' => 'Los cambios en tu archivo .env han sido guardados.',
        'errors' => 'No es posible crear el archivo .env, por favor intentalo manualmente.',
    ],
    'final' => [
        'title' => 'Finalizado.',
        'finished' => 'La aplicación ha sido instalada con éxito!',
        'exit' => 'Haz click aquí para salir.',
    ],
];
