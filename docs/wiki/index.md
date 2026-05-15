---
title: "Xot Wiki Index"
module: "Xot"
type: "index"
created: "2026-04-15"
updated: "2026-05-14"
---

# Xot Module Wiki

**Scope**: Xot-specific knowledge only — Core framework Laraxot: XotBase classes, Actions, PHPStan Level 10, Filament integration, migrations, translations.

## Directory Structure

```
docs/wiki/
├── concepts/          # Core Xot concepts and patterns
├── rules/            # Xot-specific rules and governance
├── skills/           # Xot development skills
├── commands/         # Xot artisan commands
├── memories/         # Xot development history
├── entities/         # Xot domain entities
├── decisions/        # Xot architectural decisions
├── troubleshooting/  # Xot debugging guides
├── comparisons/      # Xot vs alternatives
├── overviews/        # Xot module overviews
└── sources/          # Xot raw sources
```

## Indices

- [Rules](rules/INDEX.md) — Xot governance and constraints
- [Skills](skills/INDEX.md) — Xot development competencies
- [Commands](commands/INDEX.md) — Xot artisan commands
- [Memories](memories/INDEX.md) — Xot development history
- [Concepts](concepts/INDEX.md) — Core Xot patterns and architecture

## On-Demand Workflow

```bash
# Search Xot-specific knowledge
qmd search "Xot <topic>" --limit 5

# Search within Xot wiki
qmd search "<topic>" --path laravel/Modules/Xot/docs/wiki --limit 5
```

## Key Concepts

### Core Classes
- **XotBaseWidget**: Base for all Filament widgets
- **XotBaseWizardWidget**: Wizard implementation with HasWizard
- **XotBaseResourceForm**: Form schemas with LangServiceProvider
- **XotBaseResourceTable**: Table configurations
- **XotBaseResource**: Resource definitions

### Key Patterns
- **Actions over Services**: Always use Actions for business logic
- **LangServiceProvider**: Automatic translations for UI elements
- **Hybrid Filament Pattern**: configure() + XotBase classes
- **PHPStan Level 10**: Strict type checking enforcement

## Best Practices

✅ **DO**:
- Extend XotBase classes for all Filament components
- Use Actions instead of Services for business logic
- Implement `casts()` method instead of `$casts` property
- Use string keys in Schema/Table arrays
- Follow PHPStan Level 10 standards

❌ **DON'T**:
- Create Service classes — use Actions only
- Use `dehydrated(false)` in traits — breaks saving
- Declare static `$view` in XotBaseField — calculated dynamically
- Skip PHPStan validation

## Quick References

| Topic | Reference |
|-------|-----------|
| XotBase classes | [XotBaseResourceForm](concepts/why-xotbaseresourceform-superior.md) |
| Wizard pattern | [XotBaseWizardWidget](concepts/xotbasewizardwidget-vs-filament-haswizard.md) |
| PHPStan rules | [PHPStan Level 10](concepts/phpstan-level10.md) |
| Actions pattern | [Actions over Services](../../docs/wiki/concepts/actions-over-services.md) |

## Recent Updates

- **2026-05-14**: Improved CreateTicketWizardWidget architecture
- **2026-05-13**: Fixed wizard multiple root elements issue
- **2026-05-12**: XotBaseWizardWidget HasWizard integration complete

---
*Updated: 2026-05-14 — Claude Opus 4.7*
