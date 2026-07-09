<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/pt/messages.php
return [
    'title' => 'Instalador Laravel',
    'next' => 'Próximo Passo',
    'finish' => 'Instalar',
    'welcome' => [
        'title' => 'Bem-vindo ao Instalador',
        'message' => 'Bem-vindo ao assistente de configuração.',
    ],
    'requirements' => [
        'title' => 'Requisitos',
    ],
    'permissions' => [
        'title' => 'Permissões',
    ],
    'environment' => [
        'title' => 'Configurações de Ambiente',
        'save' => 'Salvar .env',
        'success' => 'Suas configurações de arquivo .env foram gravadas.',
        'errors' => 'Não foi possível gravar o arquivo .env, por favor crie-o manualmente.',
    ],
    'final' => [
        'title' => 'Terminado',
        'finished' => 'Aplicação foi instalada com sucesso',
        'exit' => 'Clique aqui para sair',
    ],
];
