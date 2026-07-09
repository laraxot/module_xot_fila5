<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/pt_br/buttons.php
return [
    'backend' => [
        'access' => [
            'users' => [
                'activate' => 'Ativar',
                'change_password' => 'Alterar senha',
                'deactivate' => 'Desativar',
                'delete_permanently' => 'Excluir Permanentemente',
                'login_as' => 'Entrar como :user',
                'resend_email' => 'Reenviar e-mail de confirmação',
                'restore_user' => 'Restaurar Usuário',
            ],
        ],
    ],
    'emails' => [
        'auth' => [
            'confirm_account' => 'Confirmar conta',
            'reset_password' => 'Reiniciar senha',
        ],
    ],
    'general' => [
        'cancel' => 'Cancelar',
        'crud' => [
            'create' => 'Criar',
            'delete' => 'Excluir',
            'edit' => 'Editar',
            'update' => 'Atualizar',
            'view' => 'Visualizar',
        ],
        'save' => 'Salvar',
        'view' => 'Visualizar',
    ],
];
