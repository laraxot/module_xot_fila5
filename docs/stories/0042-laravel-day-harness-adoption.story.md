---
title: "STORY — confine di adozione dell'harness Laravel Day"
type: story
status: in-progress
date: 2026-11-26
module: Xot
decision-makers: [utente]
related:
  - ../adr/0042-laravel-day-harness-adoption-boundary.md
  - ../adr/0018-agent-harness.md
---

# Confine di adozione dell'harness Laravel Day

## Obiettivo

Rendere le promesse di moduli e temi leggibili e verificabili senza introdurre un
secondo workflow agente. Il workshop è la fonte di pattern; Xot resta l'owner delle
regole trasversali e ogni package conserva i propri contratti e ADR.

## Stato

- [x] studiata la struttura del workshop: guard fail-closed, post-edit feedback,
  task contract, receipt, checkpoint e replay;
- [x] aggiunti lo standard comune e il template in `Modules/Xot/docs/contracts/`;
- [x] registrato il confine architetturale nell'ADR 0042;
- [ ] uniformare gli indici locali di tutti i moduli e temi senza cancellare storia;
- [ ] decidere, con test, se receipt/checkpoint portano valore sufficiente per FixCity;
- [ ] aggiornare questa story con gli esiti dei controlli ripetibili.

## Criteri di accettazione

- Ogni unità reale ha `docs/adr/README.md` e `docs/contracts/README.md` owner-locali.
- Gli indici non puntano a file inesistenti e non duplicano lo stesso contratto con
  nomi diversi.
- Il controllo resta eseguibile senza leggere `.env` e senza bootstrap applicativo.
- Nessun documento nuovo usa date o timestamp nel nome file.
