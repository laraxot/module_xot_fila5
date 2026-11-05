---
title: "Correggere il contratto documentato delle migrazioni Xot"
type: story
module: Xot
status: review
created: 2026-11-05
updated: 2026-11-05
tags: [bmad, migration, docs, xotbase]
qmd: "Xot migration standards model filename model_class table connection forward-only safety"
related:
  - ../../../../Lang/docs/stories/user-id-uuid-migration-convention.story.md
  - ../../migration-standards.md
---
# Correggere il contratto documentato delle migrazioni Xot

## Contesto

La guida Xot affermava che `$table` e `$connection` fossero obbligatori e
mostrava una migrazione senza modello owner. Il codice di `XotBaseMigration`
risolve invece tabella e connessione dal modello. Deriva il modello dal filename
solo per `create_<model>_table`; gli altri nomi devono specificare
`$model_class`. La guida conteneva inoltre sezioni duplicate e placeholder
`<nome progetto>`.

## Criteri di accettazione

- [x] La guida documenta il comportamento verificato di `XotBaseMigration`.
- [x] L'esempio separa creazione e aggiornamento e nomina il modello owner.
- [x] La guida descrive aggiornamenti additive idempotenti e la protezione dei dati.
- [x] Rimossi i contenuti duplicati e i placeholder non risolti.
- [x] Allineare il prompt model/migration ai gate Pest, ai trait owner e al percorso additive forward-only.
- [x] Frontmatter con `qmd` e link relativi verificati; `qmd update` eseguito.

## Esito

La documentazione è stata riscritta in forma breve e allineata all'implementazione.
La guida owner Lang applica il naming additive dal modello; le migrazioni
continuano a delegare la conversione UUID all'helper con controllo dei dati legacy.
Il prompt `bashscripts/docs/prompts/32-model-migration-factory-seeder.md` punta alle
regole accessor/trait e distingue le decisioni sui dati legacy dai fix ordinari
autorizzati.
