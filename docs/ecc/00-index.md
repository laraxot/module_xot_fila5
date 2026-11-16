---
title: "ECC — indice operativo Xot"
type: index
status: in-progress
updated: 2026-11-16
module: Xot
qmd: "ECC indice Xot verification gates esito"
---

# ECC — modulo Xot

Collega le verifiche ECC al workflow PTVX (BMAD → lock → fix → PHPStan/Pest → docs).

| Controllo | Stato | Evidenza |
|---|---|---|
| Inventario statico | verificato (2026-11-16) | [audit](../bmad/audits/xot-audit.md) |
| PHPStan `Modules/Xot` | 0 errori (rerun; prima passata 6+ errori in `FeatureFlagsTest` mentre un altro agente lo editava) | `phpstan analyse Modules/Xot` (17:10 / rerun 17:21) |
| Pest | skip documentato | DB test `10.100.200.53` irraggiungibile + `TestDatabaseGuard` |
| Security review | parziale | P2-X3 `HandleArtisanActRequestAction`; `--force` solo su SQLite di test e symlink opt-in |
| Docs pack | aggiornato | audit, epics, decision-log, brainstorming, story |

Dettaglio: [xot-ecc-audit.md](./xot-ecc-audit.md)
