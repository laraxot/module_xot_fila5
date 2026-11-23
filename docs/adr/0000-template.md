---
title: "ADR — <decisione in una riga>"
type: decision
status: proposed            # proposed | accepted | rejected | deprecated | superseded
created: YYYY-MM-DD
updated: YYYY-MM-DD
decision-makers: []
issues: []
---

<!-- File: docs/adr/NNNN-titolo-con-trattini.md · formato MADR breve.
     Scrivi un ADR solo se la decisione è difficile da invertire, sorprendente e frutto di un trade-off reale
     (di solito nasce da una Decision in .harness/memory/decisions.md). -->

# <!-- Titolo: il problema risolto e la soluzione scelta -->

## Contesto

<!-- 2-3 frasi. Chiudi con la domanda a cui la decisione risponde. -->

## Driver della decisione

- <!-- forza o vincolo che pesa sulla scelta -->

## Alternative scartate

- <!-- opzione 1 -->
- <!-- opzione 2 -->

## Decisione

Scelta: **<!-- opzione -->**, perché <!-- driver che la giustifica -->.

## Conseguenze

- Buono, perché <!-- … -->
- Cattivo, perché <!-- … -->

## Conferma

<!-- Come si controlla che il codice rispetti la decisione: un test, un controllo automatico, una voce di revisione. -->

<!--
     Convenzioni Xot da rispettare quando il nuovo ADR riguarda codice:
- business operation in Action con `Spatie\\QueueableAction\\QueueableAction`;
- test in Pest, non test PHPUnit scritti come classi PHPUnit;
- un modello persistente = una migrazione canonical `create_<table>_table`;
- modifiche successive additive in migrazioni forward-only con `tableUpdate()`;
- filename ADR in kebab-case, senza date o timestamp; gli ADR canonici Xot possono usare la numerazione sequenziale gia' adottata (`0001-...`).
-->
