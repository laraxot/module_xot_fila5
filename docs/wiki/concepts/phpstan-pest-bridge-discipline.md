---
title: "PHPStan Pest Bridge Discipline"
type: concept
module: Xot
tags: [xot, phpstan, pest, testing, bridge]
created: 2026-06-10
updated: 2026-06-10
qmd: "Xot phpstan pest bridge discipline public assertions tests stay pest helper"
issues:
  - "https://github.com/laraxot/module_xot_fila5/issues/28"
discussions:
  - "https://github.com/laraxot/module_xot_fila5/discussions/29"
related:
  - ../../../../../../docs/wiki/rules/phpstan-pest-tests-stay-pest.md
  - ../../../../../../docs/wiki/skills/phpstan-pest-remediation.md
---

# PHPStan Pest Bridge Discipline

Xot e' il posto giusto per pattern condivisi di test/static analysis, ma il bridge non deve cambiare il framework dei test.

## Contratto

- Pest resta il framework test.
- PHPStan resta governato dal solo `laravel/phpstan.neon` utente.
- Bridge/helper condivisi devono rendere tipizzabili le assertion ricorrenti, non mascherare errori.
- Le assertion pubbliche `PHPUnit\Framework\Assert::assert*()` sono ammesse dentro file Pest quando evitano `method.internalClass`.

## Quando centralizzare in Xot

Centralizzare solo se il pattern e' usato da piu' moduli:

- helper per database assertion senza `$this` ambiguo;
- helper per factory `createOne()` e narrowing del modello;
- wrapper assertion per stringhe, array shape o class-string.

Non centralizzare fix one-shot di un singolo test Activity.
