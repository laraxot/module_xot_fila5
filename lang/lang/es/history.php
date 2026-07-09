<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/es/history.php
return [
    'backend' => [
        'none' => 'No existe historial reciente.',
        'none_for_type' => 'No existe historia para este tipo.',
        'none_for_entity' => 'No hay historial para esta :entity.',
        'recent_history' => 'Historial Reciente',
        'roles' => [
            'created' => 'Rol creado',
            'deleted' => 'Rol eliminado',
            'updated' => 'Rol actualizado',
        ],
        'users' => [
            'changed_password' => 'Se cambio la contraseña del usuario',
            'created' => 'Usuario creado',
            'deactivated' => 'Usuario desactivado',
            'deleted' => 'Usuario eliminado',
            'permanently_deleted' => 'Usuario eliminado permanentemente',
            'updated' => 'usuario actualizado',
            'reactivated' => 'Usuario reactivado',
            'restored' => 'Usuario restaurado',
        ],
    ],
];
