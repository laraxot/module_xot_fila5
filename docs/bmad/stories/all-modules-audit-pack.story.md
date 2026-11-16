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
- [x] Eseguito PHPStan isolato sui 18 moduli: exit 0 e 0 errori.
- [ ] Eseguito Pest mirato per ogni modulo in ambiente testing stabile.
- [ ] Risolti i finding P0/P1 alla sorgente con test di regressione.
- [ ] Aggiornati gli esiti reali nelle story figlie e in QMD.

## Riferimenti

- `laravel/Modules/Xot/docs/bmad/module-audit-index.md`
- `laravel/Modules/<Modulo>/docs/bmad/audit.md`
- `laravel/Modules/<Modulo>/docs/ecc/<modulo>-ecc-audit.md`
- `AGENTS.md`

## Metodo

QMD/graphify e codice sono la fonte iniziale; i report dei gate sono la prova
finale. Gli audit generati sono baseline, non dichiarazioni di conformità.
PHPStan è verificato; Pest, finding P0/P1, runtime e consolidamento della
documentazione restano aperti.
Ogni implementazione successiva usa lock, story disgiunte e swarm parallelo
solo su file indipendenti.

## Verifica corrente

- PHPStan globale: `cd laravel && ./vendor/bin/phpstan analyse Modules`, exit 0,
  0 errori (`10669/10669`).
- PHPStan isolato: tutti i 18 moduli hanno exit 0 e 0 errori.
- Sintassi dei sei test Activity interessati: `php -l` verde.
- Pest mirato sui sei test Activity: timeout a 90 secondi senza output; il
  runtime usa `DB_HOST=10.100.200.53` da `.env.testing`. Il gate resta aperto
  finché non è disponibile un ambiente di test raggiungibile.
