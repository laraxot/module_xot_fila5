<<<<<<< HEAD
---
title: "Readme"
type: reference
tags: [wiki, no-frontmatter-fix]
created: 2026-08-24
updated: 2026-08-24
---

# Models - Xot Module

## Architecture

All models in this module follow the Laraxot architecture pattern:

```
Model → Module BaseModel → XotBaseModel → Laravel Model
```

### Base Classes

#### BaseModel
For regular Eloquent models.

**Example:**
```php
namespace Modules\Xot\Models;

class ExampleModel extends BaseModel
{
    protected $fillable = ['name', 'description'];

    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'published_at' => 'datetime',
        ]);
    }
}
```

#### BasePivot
For many-to-many relationship pivot tables.

#### BaseMorphPivot
For polymorphic pivot tables.

## Models in this Module

[List all models here with brief descriptions]

### [ModelName]

**Purpose:** [Description]

**Key Relationships:**
- `belongsTo`: [Related models]
- `hasMany`: [Related models]
- `belongsToMany`: [Related models]

**Important Methods:**
- `methodName()`: [Description]

## Best Practices

1. **Never extend `Illuminate\Database\Eloquent\Model` directly**
2. **Use `casts()` method instead of `$casts` property**
3. **Connection is auto-discovered** from namespace (e.g., `Modules\Xot` → `'xot'`)
4. **Use magic properties** - `isset()` instead of `property_exists()`

## References

- [Xot Model Architecture](../../Xot/docs/models/model-architecture.md)
- [Xot Model Architecture](../../xot/docs/models/model-architecture.md)
- [CLAUDE.md - Model Inheritance Rules](../../CLAUDE.md#model-inheritance-rules)

---

**Last Updated**: 2025-11-15
=======
# Xot

[![Module](https://img.shields.io/badge/Module-Xot-8B0000.svg)]()
[![Laravel](https://img.shields.io/badge/Laravel-13-red?style=for-the-badge)](https://laravel.com/)](https://laravel.com/)
[![Filament](https://img.shields.io/badge/Filament-5-ffab00?style=for-the-badge)](https://filamentphp.com/)](https://filamentphp.com/)
[![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=for-the-badge)](https://php.net/)](https://php.net/)
[![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=for-the-badge)](https://php.net/)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue?style=for-the-badge)](https://www.php-fig.org/psr/psr-12/)](https://www.php-fig.org/psr/psr-12/)
[![Architecture](https://img.shields.io/badge/Architecture-Modular-purple?style=for-the-badge)](https://martinfowler.com/articles/paradigm-shifts.html)]()
]()

> **Core module for the FixCity Platform.**

## Perché esiste

Core module for the FixCity Platform.

## Superpoteri

- Modular component with XotBase patterns
- Professional-grade implementation
- Integrated with FixCity Platform

## Documentazione

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

**Modulo** `Xot` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
>>>>>>> 7f6cf6be (.)
