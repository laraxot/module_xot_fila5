# NWIDART MODULAR STRUCTURE - CRITICAL RULE

**STATUS**: MANDATORY - Violation = Architect Error  
**Last Updated**: 2026-10-15  
**Severity**: CRITICAL

---

## THE RULE

**TESTS OF EVERY MODULE LIVE CENTRALLY IN `laravel/tests/Modules/<Modulo>/`.**
**A module folder never contains a `tests/` directory.**

```
✅ CORRECT:
laravel/Modules/Xot/            (module: app/, config/, composer.json, docs/, README.md)
laravel/tests/Modules/Xot/      (tests of the Xot module, namespace Tests\Modules\Xot\)

❌ WRONG:
laravel/Modules/Xot/tests/      (test directory inside the module folder)
laravel/Modules/Xot/Tests/      (uppercase, forbidden in any case)
```

The namespace is set by `composer.json` `autoload-dev`: `"Tests\\": "tests/"`, so
`laravel/tests/Modules/Xot/` maps to `Tests\Modules\Xot\`.

---

## WHY THIS MATTERS

- The module keeps what runs in production: `app/`, `config/`, `composer.json`, `docs/`.
- All test code lives in one tree, `laravel/tests/`, that PHPUnit and Pest read from a
  single config (`laravel/phpunit.xml`, see `bmad/architecture-phpunit-central-config.md`).
- One test tree gives one autoload rule, one bootstrap, and one coverage report.

---

## ANTI-PATTERN

❌ Never create a `tests/` directory inside `laravel/Modules/<Modulo>/`  
❌ Never create `Tests/` (uppercase) anywhere  
❌ Never put test fixtures in `app/` (they leak into the application discovery)  

---

## VERIFICATION CHECKLIST

- [ ] `laravel/tests/Modules/Xot/` exists
- [ ] `laravel/Modules/Xot/tests/` does NOT exist
- [ ] No `laravel/Modules/*/Tests/` directory anywhere
- [ ] Module tests run with: `./vendor/bin/pest tests/Modules/Xot` (from `laravel/`)
- [ ] Coverage measured with: `./vendor/bin/pest tests/Modules/Xot --coverage`

---

## HISTORY

**2026-10-15**: A previous version of this rule required `tests/` inside every module and
forbade `laravel/tests/Modules/`. That was wrong for this repository.  
**CORRECTION (2026-10-15)**: The owner of the repository confirmed the central layout
`laravel/tests/Modules/<Modulo>/`. This version replaces the previous one. The previous
text is kept only in git history.  
**IMPACT**: Test location, PHPUnit config, and coverage all depend on this rule.
