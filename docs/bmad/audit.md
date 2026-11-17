---
title: "Audit BMAD — Xot"
type: audit
status: review
updated: 2026-11-16
module: Xot
qmd: "audit BMAD Xot source-first qualità"
---

# Audit BMAD — Xot

SSoT dettagliata: [audits/xot-audit.md](./audits/xot-audit.md)

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` | 602 |
| Test | 329 |
| Resources | 7 |
| Actions | 238 |
| Services | 2 |
| Policy `return true` | 2 |
| Marker | 0 |

## Lo scopo in una frase **Xot è il fondamento architetturale dell'intera piattaforma: fornisce classi base (`XotBaseModel`, `XotBaseResource`, `XotBasePage`), contract per la type-safety, e pattern riutilizzabili che tutti gli altri 17 moduli estendono.** Nessun modulo estende Filament direttamente. Si estende `XotBaseResource`, `XotBaseListRecords`, `XotBaseWidget`, `XotBaseServiceProvider`, `XotBaseMigration`. Questa è **la** regola fondamentale del progetto, e Xot è il posto dove vive.

## Gate

- PHPStan modulo / `Modules`: 0 errori (verifica 2026-11-16).
- Pest: da eseguire in ambiente testing non produttivo.
- Security/runtime: story figlie su finding P0/P1 dell'audit dettagliato.
