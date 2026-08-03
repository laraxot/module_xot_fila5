---
module: xot
topic: enum-integer-trait
tags: [enums, traits, integer, translation, filament]
canonical: docs/enum-integer-trait.md
---

# EnumIntegerTrait — Integer-Backed Enum Specialization

## Overview

`EnumIntegerTrait` extends `EnumTrait` for integer-backed enums, providing:
- Integer-specific navigation (`next()`, `previous()`)
- Value-based lookup (`fromInt()`)
- Comparison methods (`isGreaterThan()`, `isLessThan()`, `equals()`)
- Full translation support (inherited from `EnumTrait` + `TransTrait`)

## ⚠️ Critical Rule: Translation Methods

**DO NOT override translation methods** (`getLabel`, `getColor`, `getIcon`, `getDescription`).

`EnumIntegerTrait` uses `EnumTrait`, which already provides these methods via `TransTrait`:
- Uses `transClass()` pattern: `values.{value}.{field}`
- Example: `values.1.label`, `values.2.color`
- **NEVER use `__()` directly** for enum translations

## ❌ Wrong Pattern (Do NOT use)

```php
enum Status: int implements HasLabel
{
    use EnumIntegerTrait;

    // ❌ WRONG: Don't override translation methods
    public function getLabel(): string
    {
        return __('enums.'.static::class.'.'.strtolower($this->name));
    }
}
```

## ✅ Correct Pattern (Use inheritance)

```php
enum Status: int implements HasLabel, HasColor, HasIcon, HasDescription
{
    use EnumIntegerTrait;  // Inherits all translation methods

    case PENDING = 1;
    case ACTIVE = 2;
}
```

Translation structure (`resources/lang/it/modules/xot/enums/status.php`):
```php
return [
    'values' => [
        1 => ['label' => 'Pending', 'color' => 'amber', 'icon' => 'clock'],
        2 => ['label' => 'Active', 'color' => 'green', 'icon' => 'check'],
    ],
];
```

## Location

`laravel/Modules/Xot/app/Traits/EnumIntegerTrait.php`

## Usage

```php
enum Status: int implements HasLabel, HasColor, HasIcon, HasDescription
{
    use EnumIntegerTrait;

    case PENDING = 1;
    case ACTIVE = 2;
    case ARCHIVED = 3;
}
```

## Methods

### Navigation

- `next(): ?static` — Get next case by order
- `previous(): ?static` — Get previous case by order

### Lookup

- `fromInt(int $value): ?static` — Find case by integer value

### Comparison

- `isGreaterThan(int $value): bool` — Check if value > target
- `isLessThan(int $value): bool` — Check if value < target
- `equals(int $value): bool` — Check if value equals target

## Examples

### Custom Status Enum

```php
enum TaskStatus: int implements HasLabel, HasColor, HasIcon, HasDescription
{
    use EnumIntegerTrait;

    case TODO = 1;
    case IN_PROGRESS = 2;
    case DONE = 3;
}
```

### Overriding Methods (Use with caution)

You can override `next()` or `previous()` if needed for custom logic:

```php
enum DayOfWeek: int implements HasLabel, HasColor, HasIcon, HasDescription
{
    use EnumIntegerTrait;

    case MONDAY = 1;
    case SUNDAY = 7;

    // Override for circular week
    public function next(): self
    {
        return match ($this) {
            self::SUNDAY => self::MONDAY,
            default => parent::next() ?? self::MONDAY,
        };
    }
}
```

**DO NOT override translation methods** (`getLabel`, `getColor`, etc.) — they're already provided by `EnumTrait`.

## Quality Gates

All enums using `EnumIntegerTrait` must pass:
- PHPStan L10 (no errors, no ignores)
- PHPMD (clean code)
- PHPInsights (quality metrics)
- Pest (unit tests for critical logic)

## Naming Convention

**Do NOT use "resolve" prefix.** Use:
- `get*()` for getters
- `set*()` for setters
- `is*()` for boolean checks
- `has*()` for existence checks

---

**Created:** 2026-08-03
**Status:** ✅ Active
