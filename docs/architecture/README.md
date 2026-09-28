<<<<<<< HEAD
=======
---
title: "README"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "README"
issues: []
discussions: []
---

>>>>>>> laraxot/dev
# Architettura Xot

## Classi Base

### XotBaseModel

Modello base per tutti i moduli.

```php
namespace Modules\Xot\Models;

abstract class XotBaseModel extends Model
{
    use Updater;
    
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
```

### XotBaseMigration

Migrazioni anonime standardizzate.

```php
return new class() extends XotBaseMigration {
    protected string $table_name = 'example';
    
    public function up(): void
    {
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->timestamps();
        });
    }
};
```

## Collegamenti

- [Xot Principale](../README.md)
- [Filament](../filament/)
