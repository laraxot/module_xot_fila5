---
title: "ADR — Pest come framework di test"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
decision-makers: [team]
issues: []
---

# Pest come framework di test

## Contesto

Il runner del progetto è Pest e i test dei moduli devono funzionare con il bootstrap root, TestCase per file e database scratch.

## Driver della decisione

- Coerenza tra test locali, CI e runner root.
- Sintassi leggibile e supporto ai gruppi di contract.
- Evitare doppio bootstrap tra `Pest.php` di modulo e root.

## Alternative scartate

- Scrivere nuovi test come classi PHPUnit.
- Usare `phpunit` direttamente come percorso principale.
- Legare il TestCase globale tramite `uses()->in()` nei moduli.

## Decisione

I nuovi test sono scritti in Pest e lanciano `vendor/bin/pest`; ogni file che usa l'applicazione dichiara il proprio TestCase secondo l'ADR `pest-testcase-binding-per-file.md`. PHPUnit resta una dipendenza interna del runner, non la convenzione di scrittura.

## Conseguenze

I test condividono bootstrap e convenzioni; i test PHPUnit legacy si migrano solo nello scope di una story, senza rompere il comportamento storico.

## Conferma

La suite viene verificata con `vendor/bin/pest`, PHPStan e il runner scratch documentato in AGENTS.md.
