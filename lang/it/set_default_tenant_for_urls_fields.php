<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from set_default_tenant_for_urls_fields.php for maintainability (<500 LOC).
// Canon: Modules/Xot/docs/wiki/concepts/claude-audit-static.md
// File: lang/it/set_default_tenant_for_urls_fields_loader.php
return array_merge(
    require __DIR__.'/set_default_tenant_for_urls_fields_fields.php'
);
