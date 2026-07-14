---
title: "PHPStan Pest Bridge Discipline"
type: concept
module: Xot
tags: [xot, phpstan, pest, testing, bridge]
created: 2026-06-10
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
updated: 2026-06-30
=======
updated: 2026-06-13
>>>>>>> 64619e34 (.)
=======
updated: 2026-06-30
>>>>>>> 61938ca4 (delete .claude-audit/)
=======
updated: 2026-06-30
>>>>>>> 2353ccee (.)
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
- Bridge `PestFunctionBridge.php`: `uses|test|it|describe` → `void`; `expect()` → `PestExpectation` (evita `function.resultUnused` e catene `function.void`).
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
- Rigenerare bridge: `php bashscripts/tools/generate-pest-phpstan-bridge.php` (195 namespace, 2026-06-30).
=======
- Bridge `PestFunctionBridge.php`: `uses|test|it|describe` → `void`; `expect()` → `PestExpectation` (evita `function.resultUnused` e catene `function.void`).
>>>>>>> 64619e34 (.)
=======
- Rigenerare bridge: `php bashscripts/tools/generate-pest-phpstan-bridge.php` (195 namespace, 2026-06-30).
>>>>>>> 61938ca4 (delete .claude-audit/)
=======
- Rigenerare bridge: `php bashscripts/tools/generate-pest-phpstan-bridge.php` (195 namespace, 2026-06-30).
>>>>>>> 2353ccee (.)
- `uses(\Modules\<M>\Tests\TestCase::class)` sempre **dopo** gli `import use` nel file Pest.

## Helper XotBaseTestCase (usare nei moduli)

| Metodo | Uso |
|--------|-----|
| `mockService($class, $closure)` | Mock in Pest senza chiamare `$this->mock()` protetto |
| `expectsOnce()` / `expectsExactly(n)` | Expectation PHPUnit tipizzate per Pest |
| `expectApplicationException($class)` | Wrapper `expectException` |
| `rrmdir($dir)` | Cleanup directory in test feature (Xot `TestCase`) |

## Pattern moduli (2026-06-13)

- **Activity:** batch 7 file — `expect()` → `Assert::assert*()`; [completion-status](../../../Activity/docs/wiki/overviews/completion-status.md)
- **Fixcity:** helper `ticket()`, `authUser()`, … — [phpstan-pest-testcase-helpers](../../../Fixcity/docs/wiki/concepts/phpstan-pest-testcase-helpers.md); `PestHelper.php` tipizzato
- **Notify:** `notificationManager()` + trait doubles — [phpstan-pest-test-doubles](../../../Notify/docs/wiki/concepts/phpstan-pest-test-doubles.md)
- **Xot:** test File — no `@var TestCase $this` se la closure non usa `$this`; no `assertIsString(tempnam())`
- **Tenant:** non ridefinire `mockService()`; non re-tipizzare `$model`/`$baseModel` se il parent ha `mixed`
- **UI:** `createStub` + `willReturn(null)` per action mock; no `andReturnNull()` Mockery

Hub piattaforma: [platform-completion-roadmap](../overviews/platform-completion-roadmap.md).

## Quando centralizzare in Xot

Centralizzare solo se il pattern e' usato da piu' moduli:

- helper per database assertion senza `$this` ambiguo;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
- helper per factory `createOne()` e narrowing del modello (`bashscripts/tools/fix-test-factory-createone.php`);
=======
- helper per factory `createOne()` e narrowing del modello;
>>>>>>> 64619e34 (.)
=======
- helper per factory `createOne()` e narrowing del modello (`bashscripts/tools/fix-test-factory-createone.php`);
>>>>>>> 61938ca4 (delete .claude-audit/)
=======
- helper per factory `createOne()` e narrowing del modello (`bashscripts/tools/fix-test-factory-createone.php`);
>>>>>>> 2353ccee (.)
- wrapper assertion per stringhe, array shape o class-string.

Non centralizzare fix one-shot di un singolo test Activity.
