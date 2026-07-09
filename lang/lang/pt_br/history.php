<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/pt_br/history.php
return [
    'backend' => [
        'none' => 'Não há histórico recente.',
        'none_for_type' => 'Não há histórico para este tipo.',
        'none_for_entity' => 'Não há histórico para este(a) :entity.',
        'recent_history' => 'Histórico Recente',
        'roles' => [
            'created' => 'papel criado',
            'deleted' => 'papel apagado',
            'updated' => 'papel atualizado',
        ],
        'users' => [
            'changed_password' => 'senha alterada para o usuário',
            'created' => 'usuário criado',
            'deactivated' => 'usuário desativado',
            'deleted' => 'usuário apagado',
            'permanently_deleted' => 'usuário apagado permanentemente',
            'updated' => 'usuário atualizado',
            'reactivated' => 'usuário reativado',
            'restored' => 'usuário restaurado',
        ],
    ],
];
