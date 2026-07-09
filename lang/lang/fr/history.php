<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/fr/history.php
return [
    'backend' => [
        'none' => 'Aucun historique récent.',
        'none_for_type' => 'Aucun historique pour ce type.',
        'none_for_entity' => 'Aucun historique pour :entity.',
        'recent_history' => 'Historique récent',
        'roles' => [
            'created' => 'a créé le rôle',
            'deleted' => 'a effacé le rôle',
            'updated' => 'a mis à jour le rôle',
        ],
        'users' => [
            'changed_password' => 'a modifié le mot de passe de l\'utilisateur',
            'created' => 'a créé l\'utilisateur',
            'deactivated' => 'a désactivé l\'utilisateur',
            'deleted' => 'a effacé l\'utilisateur',
            'permanently_deleted' => 'a définitivement effacé l\'utilisateur',
            'updated' => 'a mis à jour l\'utilisateur',
            'reactivated' => 'a réactivé l\'utilisateur',
            'restored' => 'a restauré l\'utilisateur',
        ],
    ],
];
