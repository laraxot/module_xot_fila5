<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/es/buttons.php
return [
    'backend' => [
        'access' => [
            'users' => [
                'activate' => 'Activar',
                'change_password' => 'Cambiar contraseña',
                'deactivate' => 'Desactivar',
                'delete_permanently' => 'Eliminar de forma permanente',
                'login_as' => 'Iniciar sesión como :user',
                'resend_email' => 'Re-enviar E-mail de confirmación',
                'restore_user' => 'Restaurar Usuario',
            ],
        ],
    ],
    'emails' => [
        'auth' => [
            'confirm_account' => 'Confirmar Cuenta',
            'reset_password' => 'Resetear Contraseña',
        ],
    ],
    'general' => [
        'cancel' => 'Cancelar',
        'crud' => [
            'create' => 'Crear',
            'delete' => 'Eliminar',
            'edit' => 'Modificar',
            'update' => 'Actualizar',
            'view' => 'Visualizar',
        ],
        'save' => 'Guardar',
        'view' => 'Visualizar',
    ],
];
