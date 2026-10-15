# Nwidart Tests Directory Convention - Lowercase Only

**Status**: MANDATORY  
**Applies To**: All Modules  
**Enforced By**: PHPStan L10, git pre-commit hook

## Rule

Test directory must be **lowercase**: `laravel/tests/Modules/<M>/` (not `Tests/`). Tests are central, never inside `laravel/Modules/<M>/`.

```
✓ CORRECT:   laravel/tests/Modules/Xot/
✗ WRONG:     laravel/tests/Modules/Xot/Tests/ and laravel/Modules/Xot/tests/
```

## Why

1. **PSR-4 Namespace Mapping**: Namespace must match directory structure
   - Directory: `laravel/tests/Modules/Xot/` → Namespace: `Tests\Modules\Xot\`
   - Directory: `Tests/` → Namespace: `Tests\` (WRONG for Laraxot)

2. **Case-Sensitive Git**: Git tracks case, filesystem may not
   - WSL/NTFS case-insensitive creates duplicates
   - PHPStan reports uppercase paths; can't find lowercase files

3. **Laraxot Convention**: All Nwidart-based Laravel Modules use lowercase

## Checking

```bash
# CORRECT - lowercase:
find Modules/Xot/tests -type f -name "*Test.php" | head -3

# DO NOT EXIST:
ls Modules/Xot/Tests 2>&1
# Should show: No such file or directory
```

## Fix (if violated)

```bash
# DELETE uppercase Tests/ if it exists
find Modules -type d -name "Tests" -delete

# Verify namespaces use lowercase 'tests\'
grep -r "namespace.*Tests\\\\" Modules/*/tests --include="*.php"
# Should return nothing
```

## Related

- [[phpstan-l10-comprehensive-resolution]] - Resolution story
- [[laravel/Modules/Job/docs/phpstan-compliance-status.md]] - Compliance tracking
