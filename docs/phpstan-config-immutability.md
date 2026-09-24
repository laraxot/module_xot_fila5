# PHPStan Config Immutability (Global Project Rule)

- File target: `phpstan.neon`
- File target: `phpstan.neon`
- File target: `phpstan.neon`
- Status: IMMUTABLE — never modify this file via automation or PRs. Only the user may edit it manually.

## Rationale
- Single source of truth for static analysis settings.
- Prevents wide-impact accidental changes.

## How to adjust analysis without editing phpstan.neon
<<<<<<< HEAD
- Scope via CLI paths and flags, e.g.:

```bash
# Per-module
./vendor/bin/phpstan analyze Modules/User Modules/Geo --level=9 --no-progress --memory-limit=2G

# Full Modules with debug
./vendor/bin/phpstan analyze Modules --level=9 --no-progress --debug -vvv

# Exclude heavy module via shell (do not touch config)
find Modules -maxdepth 2 -type d -name app ! -path 'Modules/Activity/*' -print0 \
  | xargs -0 ./vendor/bin/phpstan analyze --level=9 --no-progress --memory-limit=2G
=======
- Scope via CLI paths, e.g. per-module gate: `bash bashscripts/tools/phpstan-modules-gate.sh`
- **Never create alternate `.neon` files** — see `docs/wiki/rules/phpstan-single-neon-config.md`

```bash
cd laravel
php -d xdebug.mode=off -d memory_limit=2G \
  ./vendor/bin/phpstan analyse Modules/User --memory-limit=2G
>>>>>>> laraxot/dev
```

## Enforcement
- Assistants, scripts, and CI MUST NOT patch `phpstan.neon`.
- Prefer per-run options and per-module execution.

## Cross-References
- `.ai/guidelines/phpstan-config-immutability.md`
- `.cursor/rules/phpstan-config-immutability.mdc`
- `.windsurf/rules/phpstan-config-immutability.mdc`
