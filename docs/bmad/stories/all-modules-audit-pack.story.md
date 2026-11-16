---
qmd: BMAD story audit completo tutti moduli ECC PHPStan Pest documentazione
title: Audit completo di tutti i moduli con BMAD ed ECC
status: in-progress
---

# Story: audit completo di tutti i moduli con BMAD ed ECC

## Obiettivo

Creare una baseline verificabile per ogni modulo Laravel, preservando lo scopo
funzionale e trasformando i rischi in storie figlie implementabili.

## Acceptance criteria

- [x] Inventariati i 18 moduli sotto `laravel/Modules`.
- [x] Creato un audit BMAD source-first per ogni modulo.
- [x] Creato un audit ECC operativo per ogni modulo.
- [x] Creato l'indice cross-module in `Modules/Xot/docs/bmad`.
- [ ] Eseguito PHPStan isolato e Pest mirato per ogni modulo.
- [ ] Risolti i finding P0/P1 alla sorgente con test di regressione.
- [ ] Aggiornati gli esiti reali nelle story figlie e in QMD.

## Riferimenti

- `laravel/Modules/Xot/docs/bmad/module-audit-index.md`
- `laravel/Modules/<Modulo>/docs/bmad/audits/<modulo>-audit.md`
- `laravel/Modules/<Modulo>/docs/ecc/<modulo>-ecc-audit.md`
- `AGENTS.md`

## Metodo

QMD/graphify e codice sono la fonte iniziale; i report dei gate sono la prova
finale. Gli audit generati sono baseline, non dichiarazioni di conformità.
Ogni implementazione successiva usa lock, story disgiunte e swarm parallelo
solo su file indipendenti.
