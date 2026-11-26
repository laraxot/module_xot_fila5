---
title: "Ogni modello persistente ha una migrazione owner"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
decision-makers: [team Laraxot]
issues: []
qmd: "0004 one model migration ogni modello"
---

# Ogni modello persistente ha una migrazione owner

## Contesto

In una struttura modulare la tabella deve avere un proprietario riconoscibile.
Più migrazioni `create` o migrazioni sparse in moduli diversi fanno divergere
schema, modello e connessione; il problema emerge spesso solo su un database
nuovo o nello scratch test.

## Driver della decisione

- ownership esplicita del modello e della tabella;
- una sola fonte per la creazione dello schema;
- migrazioni additive e ri-eseguibili secondo le regole del progetto;
- risoluzione automatica del modello tramite `XotBaseMigration` quando possibile;
- audit statico semplice e ripetibile.

## Alternative scartate

- una migrazione `create` per ogni modulo che usa il modello;
- una migrazione monolitica per più modelli non appartenenti allo stesso aggregate;
- correggere lo schema direttamente nel database senza una migrazione owner.

## Decisione

Per ogni modello Eloquent persistente nuovo si crea una migrazione owner nel
modulo che possiede il modello: una migrazione di creazione per quel modello e
successive migrazioni additive solo quando la storia dello schema lo richiede.
Il nome segue `YYYY_MM_DD_HHMMSS_create_<modello_plurale>_table.php` per la
creazione canonical (il timestamp serve al ledger Laravel, non al nome ADR), la
cartella canonica è `database/migrations/` minuscola e la migrazione usa
`XotBaseMigration` quando il contratto del modulo lo richiede.

## Conseguenze

- Buono: ownership, connessione e schema sono rintracciabili.
- Buono: i test possono verificare una sola migrazione owner per tabella.
- Cattivo: il legacy può contenere doppioni o modelli senza tabella; si corregge con audit e migrazioni forward-only, mai con cancellazioni distruttive automatiche.

## Conferma

- `Modules/Fixcity/tests/Unit/MigrationConventionsTest.php` verifica soltanto che `ticket_subscribers` abbia una sola migrazione owner con la forma attesa; la regola generale «un modello, una migrazione» non ha oggi un test (proposta: un test di architettura nel modulo Xot che confronta modelli e migrazioni);
- prima di una migrazione si controllano modello, tabella, connessione e caller;
- riferimenti: migration filename rule (riferimento non presente in questo checkout),
  [one migration per model](../../../../../docs/ai-agents/rules/one-migration-per-model.md)
  e [XotBaseMigration](../../app/Database/Migrations/XotBaseMigration.php).
