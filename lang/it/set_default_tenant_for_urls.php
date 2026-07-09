<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from set_default_tenant_for_urls.php for maintainability (<500 LOC).
// Canon: Modules/Xot/docs/wiki/concepts/claude-audit-static.md
// File: lang/it/set_default_tenant_for_urls_loader.php

/** @var array<string, mixed> $actions */
$actions = require __DIR__.'/set_default_tenant_for_urls_actions.php';
/** @var array<string, mixed> $fields */
$fields = require __DIR__.'/set_default_tenant_for_urls_fields.php';
/** @var array<string, mixed> $steps */
$steps = require __DIR__.'/set_default_tenant_for_urls_steps.php';
/** @var array<string, mixed> $label */
$label = require __DIR__.'/set_default_tenant_for_urls_label.php';
/** @var array<string, mixed> $pluralLabel */
$pluralLabel = require __DIR__.'/set_default_tenant_for_urls_plural_label.php';
/** @var array<string, mixed> $navigation */
$navigation = require __DIR__.'/set_default_tenant_for_urls_navigation.php';

return merge_translation_files($actions, $fields, $steps, $label, $pluralLabel, $navigation);
