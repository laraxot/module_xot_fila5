<<<<<<< HEAD
---
title: IDE Helper Models Governance
type: reference
tags: [ide-helper, phpstan, data-sacred, models]
created: 2026-03-10
updated: 2026-08-31
qmd: ide-helper models nowrite never write reset data sacred schema
related:
  - ./ide-helper-best-practices.md
  - ../../../../docs/wiki/rules/data-sacred-no-destructive-db.md
  - ../../../../docs/chat/ide-helper-refresh.md
---

# IDE Helper Models Governance

## Religione: dati sacri

Ide-helper **non** giustifica `migrate:fresh`, `migrate --force`, `db:wipe` o `RefreshDatabase`.
Se lo schema manca o è vuoto: **fermati** — allineamento DB solo dal responsabile, additivo (`migrate` senza force).

Canon: [data-sacred-no-destructive-db.md](../../../../docs/wiki/rules/data-sacred-no-destructive-db.md).

## Comando canonico (2026-08-31)

```bash
cd laravel
php artisan ide-helper:generate --no-interaction
php artisan ide-helper:meta --no-interaction
php artisan ide-helper:models --nowrite --no-interaction
```

Scrive solo `_ide_helper_models.php` (escluso da PHPStan). **Mai** `--write` / `-W` / `--write --reset` sui model app: cancella `@property` manuali → migliaia di `property.notFound`.

## Precondizione schema

`ide-helper:models` legge le colonne dal DB. Schema vuoto + `-W` = perdita silenziosa dei PHPDoc.

```bash
cd laravel && php artisan tinker --execute="echo count(DB::select('show tables'));"
```

Se `0`: **non** lanciare write; **non** migrate distruttivo. Handoff al owner.

## Config locale

- `force_fqn => true` in `config/ide-helper.php`
- `config/media.php` deve essere un **file**, non directory `media.php/` (rompe `meta` con EISDIR)

## Dopo refresh

```bash
./vendor/bin/phpstan clear-result-cache
./vendor/bin/phpstan analyse Modules --memory-limit=-1
```

## Evidence

- [ide-helper-refresh.md](../../../../docs/chat/ide-helper-refresh.md)
- [ide-helper-best-practices.md](./ide-helper-best-practices.md)
=======
# IDE Helper Models Governance

## Regola locale

Nel progetto Laraxot il comando canonico per riallineare i PHPDoc dei model e':

```bash
cd laravel && php artisan ide-helper:models -W
```

## Perche'

- i model usano attributi dinamici, relazioni e connessioni multiple;
- PHPStan, IDE e i reviewer umani dipendono da PHPDoc aggiornati;
- il run reale distingue problemi del codice da limiti del sandbox.

## Nota operativa

Se il primo run mostra errori di connessione su alias come `activity`, `tenant`, `xot`, non assumere subito che il model sia rotto: ripetere con accesso DB reale e verificare se rimangono classi non analizzabili.

## Esito consolidato 2026-03-10

- `php artisan ide-helper:models -W` con accesso DB reale ha completato la wave senza `Could not analyze class`;
- i PHPDoc dei model sono stati rigenerati correttamente sui moduli attivi;
- il problema osservato nel sandbox era infrastrutturale, non applicativo.

## Guardrail contract-first

Per relazioni audit/profile come `creator`, `updater`, `deleter`, il PHPDoc corretto deve restare:

```php
\Modules\Xot\Contracts\ProfileContract|null
```

non un model concreto `Modules\*\Models\Profile`.
>>>>>>> laraxot/dev
