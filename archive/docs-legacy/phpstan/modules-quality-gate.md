# PHPStan Modules quality gate

## Contract

The canonical check for module code is run from `laravel`:

```bash
./vendor/bin/phpstan analyse Modules --no-progress
```

The command must reach application bootstrap and finish with no errors. A
bootstrap parse error is a repository integrity failure, not a PHPStan result.

## Root causes resolved

- Merge markers in Comment widgets, data, Blade views, translations and tests,
  plus Fixcity and User PHP files, prevented Laravel/Filament discovery from
  booting. The complete variant of each conflicting behavior was retained;
  reply/edit/authorization and sanitization paths were not replaced with
  suppressions.
- `SubmitTicketOnceAction` and `TestDatabaseGuard` used untyped constants.
  Explicit scalar/array constant types raise the strict constant-type coverage
  above the configured threshold while preserving runtime behavior.

## Verification

The current tree passes the canonical command with zero errors. Tenant content
under `config/local/fixcity/database/content` is an owned runtime overlay and
must not be deleted or regenerated as part of this quality gate.

When this gate fails again, repair the earliest bootstrap or type error first;
do not add a baseline, `@phpstan-ignore`, cast, or `mixed` merely to hide it.
