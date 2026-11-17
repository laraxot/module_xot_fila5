---
title: "ECC — indice operativo Xot"
type: index
status: in-progress
updated: 2026-11-17
module: Xot
qmd: "ECC indice Xot verification gates esito phpstan saturazione swarm"
>>>>>>> .merge_file_beldMN
---

# ECC — modulo Xot

<!-- supersedes: indice senza nota saturazione PHPStan; linked-from: ecc-ptvx-workflow SKILL, workflows.md; user: "fa tutto in parallelo utilizzando swarm + subagents + bmad + ecc + second brain" -->

Collega le verifiche ECC al workflow PTVX (BMAD → lock → fix → PHPStan/Pest → docs).
Ordine sintetico: [workflows.md](./workflows.md).

Su worktree condiviso: prima di PHPStan rispettare saturazione HARD
([11-phpstan](../../../../../bashscripts/docs/prompts/11-phpstan.md),
[46-swarm](../../../../../bashscripts/docs/prompts/46-multi-agent-module-swarm.md),
[memoria](../../../../../bashscripts/ai/wiki/memories/phpstan-host-saturation-max-three.md),
[STOP thrashing](../../../../../docs/chat/STOP-phpstan-process-thrashing.md)).

| Controllo | Stato | Evidenza |
|---|---|---|
| Inventario statico | verificato | ../bmad/audits/xot-audit.md |
| PHPStan | 0 su tree Modules (2026-11-16) | comando in audit |
| Pest | pending | ambiente testing |
| Security review | pending | story figlie P0/P1 |
| Docs pack | aggiornato | questo indice + audit ECC |

Dettaglio: [xot-ecc-audit.md](./xot-ecc-audit.md)
