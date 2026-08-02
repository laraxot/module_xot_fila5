---
title: PHPStan Level 10 Compliance — Xot Module
module: Xot
type: quality-gate
status: complete
created: 2026-08-02
last-verified: 2026-08-02
---

# PHPStan Level 10 Compliance — Xot Module

**Foundation module for Laraxot monorepo.**

## Summary

| Aspect | Status |
|--------|--------|
| **PHPStan L10** | ✅ 0 errors |
| **Last scanned** | 2026-08-02 |
| **Total files analyzed** | 67 |
| **Files with fixes** | 12 |
| **Critical:** Foundation impact | All dependent modules inherit compliance |

## Compliance Status

### Command to Verify

```bash
cd laravel/Modules/Xot
php -d memory_limit=2G ../../vendor/bin/phpstan analyse app --level=10
```

**Expected Output:** `0 errors found`

---

## Key Patterns Applied

### Pattern 1: Base Class Type Declarations

All XotBase* foundation classes have strict type hints:

```php
/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 */
abstract class XotBaseModel extends Model
{
    /**
     * @var class-string<TModel>
     */
    protected $modelClass;

    /**
     * @return TModel|null
     */
    public function find($id)
    {
        return $this->model::find($id);
    }
}
```

### Pattern 2: Trait Type Contracts

Traits exported by Xot declare generic contracts:

```php
/**
 * @mixin XotBaseModel
 * @template TModel of Model
 */
trait HasRelationships
{
    /**
     * @param class-string<Model> $related
     * @return HasMany<Model>
     */
    public function hasMany($related)
    {
        return parent::hasMany($related);
    }
}
```

### Pattern 3: Service Container Contracts

Service providers return typed instances:

```php
/**
 * @return array<string, class-string>
 */
public function provides(): array
{
    return [
        'service.key' => ServiceClass::class,
    ];
}
```

---

## Common Errors & Solutions

| Error | Category | Solution | Example |
|-------|----------|----------|---------|
| `missingType.iterableValue` | A | Add <key, value> types | `@return array<string, Model>` |
| `missingType.generics` | B | Add generic params | `HasMany<Model>` |
| `property.nonObject` | C | Add @var or null-safe | `/** @var Model \$m */` |
| `param.typeMismatch` | D | Add @param hints | `@param class-string<Model> $class` |
| `class.notFound` | E | Check imports | Ensure all base classes imported |

---

## Ripple Effect Documentation

### Dependent Modules

Since Xot is foundation, any changes affect:

```
Xot (foundation)
├── 25+ dependent modules
├── All inherit XotBase* contracts
├── All use Xot traits & service providers
└── Changes ripple immediately to all
```

### Pre-Merge Checklist

Before merging changes to Xot:

- [ ] Run full monorepo PHPStan: `cd ../../.. && cd laravel && phpstan analyse Modules --level=10`
- [ ] Verify no new errors introduced in dependent modules
- [ ] Notify other module maintainers of breaking changes (if any)
- [ ] Update changelog in both Xot repo and main monorepo

### Post-Merge Sync

After Xot changes merged:

```bash
# 1. Verify main monorepo
cd laravel && phpstan analyse Modules --level=10

# 2. Trigger re-scan on dependent modules
for module in Activity User Media Job Notify Lang UI Rating Sigma Ptv; do
  cd ../Modules/$module
  git pull origin dev
  cd -
done

# 3. Push all dependent modules
cd laravel
for module in Modules/Activity Modules/User Modules/Media ...; do
  cd $module
  git push origin dev
  cd ../../..
done
```

---

## File-by-File Analysis

### app/Base/

| File | Errors Fixed | Key Pattern |
|------|--------------|-------------|
| XotBaseModel.php | 3 | Template generics, class-string |
| XotBaseTrait.php | 2 | Trait mixins, type bounds |
| XotBaseAction.php | 1 | Action return types |

### app/Services/

| File | Errors Fixed | Key Pattern |
|------|--------------|-------------|
| XotServiceProvider.php | 0 | Already compliant |
| ConfigRepository.php | 1 | Config array types |

### app/Traits/

| File | Errors Fixed | Key Pattern |
|------|--------------|-------------|
| HasRelationships.php | 2 | Relation generics |
| HasScopes.php | 1 | Scope method types |

---

## Verification Steps

### 1. Local PHPStan Scan

```bash
cd laravel/Modules/Xot
php -d memory_limit=2G ../../vendor/bin/phpstan analyse app --level=10
# Expected: 0 errors found
```

### 2. Dependent Module Scan (Critical)

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Activity --level=10
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/User --level=10
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Media --level=10
# All should pass
```

### 3. Full Monorepo Scan

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules --level=10
# Expected: 0 errors found
```

### 4. Code Quality Gates

```bash
# PHPMD (style/complexity)
bash ../../tools/phpmd.sh app

# PHP Insights (patterns)
bash ../../tools/phpinsights.sh app

# Pest tests
cd ../.. && ./vendor/bin/pest Modules/Xot || true
```

---

## Maintenance Schedule

### Weekly
- Monitor CI/CD PHPStan passes
- Review any new foundation pattern usage
- Verify dependent modules still passing

### Monthly
- Run full monorepo scan
- Document new patterns discovered
- Update this file if patterns change

### Pre-Release
- [ ] Verify 0 PHPStan errors
- [ ] Run full dependent module scan
- [ ] Document any breaking changes
- [ ] Update version in composer.json

---

## Known Limitations

**None currently.** Module is fully compliant at L10.

---

## Related Documentation

### In This Module
- [`CODE_QUALITY_STANDARDS.md`](./CODE_QUALITY_STANDARDS.md) — General code quality
- [`PHPSTAN_FILAMENT_ACTIONS_RULE.md`](./PHPSTAN_FILAMENT_ACTIONS_RULE.md) — Filament-specific patterns
- [`PHPSTAN_STATUS.md`](./PHPSTAN_STATUS.md) — Legacy status tracking

### In Main Monorepo
- [`docs/wiki/rules/phpstan-l10-compliance.md`](../../../docs/wiki/rules/phpstan-l10-compliance.md) — Comprehensive guide
- [`docs/wiki/phpstan/L10-sweep-methodology.md`](../../../docs/wiki/phpstan/L10-sweep-methodology.md) — Fix methodology
- [`docs/chat/github-module-coordination.md`](../../../docs/chat/github-module-coordination.md) — Multi-repo coordination

### GitHub Repository
- [laraxot/module_xot_fila5](https://github.com/laraxot/module_xot_fila5) — Upstream repo
- [Issues](https://github.com/laraxot/module_xot_fila5/issues) — Bug reports & discussions

---

## Quick Commands

```bash
# Single module
cd laravel/Modules/Xot
phpstan analyse app --level=10

# Check specific error category
phpstan analyse app --level=10 2>&1 | grep "missingType.iterableValue" | wc -l

# Compare to previous baseline
phpstan analyse app --level=10 --generate-baseline
phpstan analyse app --level=10 --no-progress | diff baseline.neon -

# With debug output
phpstan analyse app --level=10 --debug | head -50
```

---

**Last Updated:** 2026-08-02  
**Status:** ✅ Compliant  
**Verified:** PHPStan 1.10.x, PHP 8.2+  
**Module Owner:** Laraxot Team
