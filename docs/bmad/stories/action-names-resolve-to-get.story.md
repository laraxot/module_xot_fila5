---
title: "Rename Resolve*Action → Get*Action (fleet Modules)"
status: done
module: Xot
created: 2026-11-25
updated: 2026-11-25
related:
  - ../../adr/0016-action-names-get-not-resolve.md
  - ../../../../Progressioni/docs/adr/0011-action-names-get-not-resolve.md
  - ../../../../../../bashscripts/ai/wiki/memories/action-names-get-not-resolve.md
qmd: "story rename Resolve Action to Get Action naming convention fleet"
---

# Rename `Resolve*Action` → `Get*Action`

## Perche'

Convenzione utente: le Action non iniziano con `Resolve`. Ambiguita' e
drift rispetto a `Get*`.

## Cosa fatto

- 26 classi `Modules/*/app/Actions/**/Resolve*Action.php` → `Get*…`
- Test e contract kebab `resolve-*` → `get-*`
- ADR Xot 0016 + Progressioni 0011 + memoria standing
- Riferimenti PHP/docs aggiornati (bulk)

## Residuo

- Wiki/audit storici e temi (Cms/Sixteen) possono ancora *citare* Resolve*
  in prosa; codice `app/Actions` Modules: **0** file `Resolve*Action.php`.
- Commento `ResolveContainer0IndexAction` in User (tema Cms) — fuori Modules
  Actions; da allineare quando esiste il file tema.

## Verifica

```
find laravel/Modules -path '*/app/Actions/*' -name 'Resolve*Action.php'  # 0
Pest: 7 passed (19 assertions) — NoResolveActionNamingTest + GetCategoriaEcoByProproActionTest + QualificheCategoriaEcoColumnTest
PHPStan scoped: [OK] No errors (GetCategoriaEcoByProproAction + NoResolveActionNamingTest)
```

## Follow-up docs (2026-11-25)

Allineati residui PROG-SIGTAB-6: ADR 0010 / contract / story empty-eager →
`GetCategoriaEcoByProproAction`. Stub PHPStan Cms e wiki
`filament-tablefilters-phpstan` → `GetLocalizedBlockDataAction`.

