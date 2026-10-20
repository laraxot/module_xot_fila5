---
id: 2026-10-09-docs-prompts-reorganization
title: Riorganizzazione massiva docs moduli, temi e prompt
type: story
module: Xot
epic: documentation/second-brain
status: in-progress
created: 2026-10-09
updated: 2026-10-09
tags: [bmad, docs, prompts, second-brain, swarm]
qmd: "riorganizzazione docs prompt moduli temi second brain"
---

# Obiettivo

Rendere navigabili e coerenti le docs di tutti i moduli e temi e revisionare
tutti i prompt in `bashscripts/docs/prompts`, preservando il contenuto valido,
i link e la storia. La sede canonica BMAD è `docs/bmad/` dentro il modulo o tema
owner; le directory legacy diventano archivio/puntatore, senza cancellazioni
automatiche.

## Stato verificato 2026-10-09

- 39 root `docs` tra moduli e temi censite.
- Entry point mancanti aggiunti per 9 moduli e 2 temi; aggiunto indice di
  compatibilità per Theme Zero.
- Aggiunta la governance canonica in `governance/docs-structure.md`.
- Aggiunto l'indice operativo dei prompt in `bashscripts/docs/prompts/INDEX.md`.
- Anomalie P0/P1 da trattare in tranche separate: `Activity/Activity`, copie
  sotto `IndennitaResponsabilita/docs/wiki/laravel`, output sotto
  `Job/docs/wiki/build_local`, docs sotto `app/`/`resources/`/`Services/`.
- Marker merge presenti in docs BMAD di Incentivi, IndennitaCondizioniLavoro,
  IndennitaResponsabilita, Pdnd e Progressioni e in circa 40 prompt: nessun
  marker viene rimosso senza confronto dei due lati.
- I tre file BMAD di Pdnd (`setup-guide.md`, `brainstorming.md`,
  `quick-reference.md`) sono stati ricomposti da un subagent con lock e
  `git diff --check` verde.
- La scansione iniziale rilevava marker nel perimetro docs e prompt; i prompt
  hanno ora zero blocchi audit bloccanti. I marker nei moduli restano tranche
  disgiunte, da chiudere solo dopo confronto dei contenuti.
- Gruppi prompt sovrapposti identificati: avvio, Filament, UI, test,
  migrazioni, Git, filesystem, BMAD, docs, second brain e daily report.

## Decisione di conservazione

Gli alias non vengono trasformati automaticamente in redirect: l'audit ha
verificato che diversi file con nomi duplicati contengono istruzioni autonome.
Prima si verificano i link entranti con `rg`, poi si converte l'alias in una
pagina breve o lo si sposta in `_archive/` con lock sul file interessato.

## Acceptance criteria

- [x] Inventario iniziale di moduli, temi, prompt, duplicati e marker merge.
- [ ] Ogni modulo/tema ha indice canonico e mappa delle directory legacy.
- [x] Prompt indicizzati per dominio, senza cancellare contenuto potenzialmente
      autonomo.
- [ ] Prompt consolidati senza duplicati contraddittori e con
      preflight BMAD/lock/second brain/Pest coerente.
- [ ] Marker merge nelle docs e prompt risolti solo dopo confronto del contenuto.
- [x] Link relativi principali verificati e QMD aggiornato.
- [ ] Report di esito per ogni gruppo e gate `git diff --check`.

## Gate della tranche 1

- `git diff --check`: verde.
- `qmd update`: eseguito, ma l'installazione locale indicizza ancora
  `base_fixcity_fila5`; non è una prova di indicizzazione PTVX.
- `graphify update .`: eseguito sul repository PTVX.
- Test/PHPStan: non eseguiti; la tranche modifica solo documentazione.

## Vincoli

Nessun `reset`, `restore`, `stash`, cancellazione massiva o sovrascrittura di
lavoro concorrente. Ogni agente possiede file disgiunti, prende lock prima di
ogni edit e registra l'esito nella story del proprio gruppo. Non riorganizzare
il codice applicativo durante questo epic documentale.

## Piano swarm

1. Audit e inventario read-only per prompt, moduli e temi.
2. Creazione degli indici canonici e risoluzione dei marker per gruppi disgiunti.
3. Consolidamento dei prompt: indice, frontmatter minimo, riferimenti incrociati.
4. Verifica link, `git diff --check`, QMD e graphify.
