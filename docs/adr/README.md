---
title: "ADR — Xot"
type: index
tags: [adr, decisioni, harness]
created: 2026-11-18
updated: 2026-11-24
qmd: "xot adr indice decisioni actions services harness pest arch testcase"
---

# ADR di Xot

Il **perché** delle forme di codice che Xot impone a tutti i moduli: Actions invece di Services, regole di architettura
eseguibili, binding del TestCase, harness degli agenti. Leggili **prima** di "semplificare" qualcosa che sembra strano o
di scegliere tra due forme di codice. Formato (cinque sezioni, nome senza date né numeri) e quando scrivere un ADR:
[regola](../rules/action-behavioral-contract.md); perché esiste: [guida all'harness](../concepts/agent-harness-guide.md).

## Decisioni in vigore

- [actions-over-services](actions-over-services.md) — la logica applicativa è una Spatie QueueableAction; i Services di AI, Geo, Job sono debito
- [agent-harness](agent-harness.md) — harness minimo: ADR e contratti in ogni pacchetto, test-sensore source-level, guard PreToolUse, lezioni
- [architecture-tests-pest-arch](architecture-tests-pest-arch.md) — regole di architettura con Pest `arch()`, ambito esplicito e debito dichiarato
- [pest-testcase-binding-per-file](pest-testcase-binding-per-file.md) — il TestCase del modulo si lega in ogni file di test, mai con `uses()->in()`

## Superate

- [architecture-rules-phparkitect](architecture-rules-phparkitect.md) — PHPArkitect con baseline (superseded da architecture-tests-pest-arch)

## Decisioni precedenti (formato libero, da portare ad ADR quando si toccano)

- [module-admin-role-policy-bypass](../wiki/decisions/module-admin-role-policy-bypass.md)
- [security-middleware-csrf-order](../wiki/decisions/security-middleware-csrf-order.md)
