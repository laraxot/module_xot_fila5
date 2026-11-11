---
epic: code-quality
type: story
status: in-progress
repository: laraxot
created: 2026-11-11
updated: 2026-11-11
---

# PHPStan wave 2 — bleedingEdge constant types + Safe functions + Pest/Mockery typing

## Contesto

`phpstan analyse Modules` (bleedingEdge, level max) riporta 88 errori nuovi
su file toccati da lavoro concorrente dopo la wave 1 (che era a 0 errori):

1. **User** (3 file): `typeCoverage.constantTypeCoverage` — costanti di classe
   senza type nativo (PHP 8.3+ li supporta; bleedingEdge esige >99% coverage).
2. **Xot** (6 file): `theCodingMachineSafe.function` — `symlink`, `realpath`,
   `readlink`, `exec`, `preg_split` non-Safe.
3. **Tenant tests** (~10 file): Pest `beforeEach()->afterEach()` inesistente e
   Mockery `ExpectationInterface` senza `once()/with()/andReturnUsing()/andReturn()/andThrow()`
   (metodi su `Expectation` concreto o another type).

## Scope e owner

- User constants → agente principale (file appena creati da lui).
- Xot Safe functions → subagent A.
- Tenant tests → subagent B.

## Fix

- Costanti: `private const string|int|array NOME = ...`.
- Safe: `use function Safe\<fn>;` + eventuali fix di signature (Safe lancia eccezioni).
- Pest: `afterEach()` come funzione globale separata, non metodo di `beforeEach()`.
- Mockery: allineare ai tipi reali del vendor (verificare `Expectation` vs
  `ExpectationInterface` in `vendor/mockery`).

## Verifica

- `phpstan analyse` sugli scope toccati → 0.
- `phpstan analyse Modules` completo → 0.
- Pest sugli scope toccati.
