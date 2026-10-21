# PHPStan L10 - Comprehensive Resolution Story

**Date**: 2026-10-15  
**Status**: RESOLVED (67 → 0 errors)  
**Methodology**: BMAD + Autonomous Swarm

## Problem

PHPStan Level 10 reported 67 critical errors across Modules, primarily:
- Namespace case mismatches (Tests vs tests)
- Missing test stub implementations
- File-not-found errors (phpstan.neon references)
- Type covariance violations in stub classes

## Root Causes

1. **Case-Sensitive Git on Case-Insensitive Filesystem**: WSL/NTFS treated `Tests/` and `tests/` as same directory, causing namespace/path mismatches
2. **Laraxot Convention Violated**: Tests must use `tests/` (lowercase), never `Tests/` (uppercase)
3. **Incomplete Stub Implementations**: Test double classes lacked required method signatures
4. **Stale PHPStan Configuration**: scanFiles referenced deleted or moved files

## Resolution Steps

### Phase 1: Root Cause Analysis
- Identified namespace case inconsistencies across 384+ files
- Found 18 missing test stub files referenced by phpstan.neon
- Discovered merge conflicts in Activity test file
- Mapped 24 Xot fixture stubs requiring implementation

### Phase 2: Comprehensive Namespace Standardization
- Updated all files to use lowercase `tests/` path (PSR-4 convention)
- Fixed 24 stub file namespace declarations
- Updated 7 test files importing from stubs
- Applied global sed fixes: `Modules\Xot\Tests\` → `Modules\Xot\tests\`

### Phase 3: Stub Implementation
- Implemented missing methods in:
  - `XotResPageStub`: getView(), getViewTest(), getNavigationLabel()
  - `XotCovRelationHost`: guessPivotFullClass(), forceFill(), belongsToManyX(), morphToManyX()
  - `XotFilamentResourceContract`: getModel(), getRelations(), getWidgets()
  - `XotFilamentRelationContract`: getRelationshipName()
  - `XotWidgetFormHost`: getFormFill()
  - `XotCovManageRelated`: getNavigationGroup()

### Phase 4: Configuration Cleanup
- Removed uppercase `Tests/` directories from all modules
- Cleaned phpstan.neon scanFiles: removed references to deleted files
- Resolved merge conflict in Activity/tests/Unit/PestExtendBootstrapTest.php

### Phase 5: Missing Files Restoration
- Created `Xot/tests/XotBaseTestCase.php` (base class for Activity tests)
- Created `UI/tests/Unit/UiStateColumnsBehaviorTest.php` (stub)
- Restored corrupted `ExporterEagerLoadModelStub.php`

## Key Learnings

### CRITICAL: Laraxot Convention
- Tests directory MUST be lowercase: `Modules/*/tests/`
- NEVER use `Modules/*/Tests/` - violates PSR-4 namespace mapping
- Namespace must match file path exactly

### Case-Insensitive Filesystem Pitfall
- Git is case-sensitive; WSL/NTFS is case-insensitive
- `git ls-files` shows actual tracked state (truth source)
- Filesystem may show both variants as same directory
- Solution: Global find-replace all namespace references

### PHPStan Configuration
- scanFiles must reference files that exist
- Remove stale references immediately
- Verify file existence before committing config changes

## Commits

1. Fix namespace case in test fixtures (20 files)
2. Add missing stub methods (9 files)
3. Correct syntax errors and method signatures (3 files)
4. Remove uppercase Tests/ directories (comprehensive)
5. Fix merge conflicts and restore corrupted files
6. Clean phpstan.neon configuration

## Verification

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules
# Expected: 0 errors
```

## Prevention

- Document in module README: tests/ lowercase only
- Add pre-commit hook to reject Tests/ directory creation
- Audit phpstan.neon monthly for stale references
- Unit test all test fixture stubs before committing

## Related Stories

- export-eager-load-contract.story.md (stub implementation pattern)
- [[nwidart-tests-lowercase-only]] (new rule added)
