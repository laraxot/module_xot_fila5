---
title: "Attach"
module: "Xot"
type: concept
tags: [attach]
created: 2026-07-14
updated: 2026-07-14
qmd: "attach"
related:
  - "./eloquent-magic-properties-rule.md"
---
```php
AttachAction::make()->modifyRecordSelectUsing(
fn ($select) => $select->getOptionLabelFromRecordUsing(fn ($record) => $record->name . ' ' . $record->organization)
);
```

```php
AttachAction::make()
    ->recordTitle(fn (Model $record) => "{$record->name} ({$record->organisation->name})")
```
