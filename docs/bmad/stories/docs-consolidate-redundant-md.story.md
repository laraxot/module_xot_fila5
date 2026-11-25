---
title: "Docs consolidate redundant md — Modules+Themes"
status: in_progress
module: Xot
epic: documentation
track: quick-flow
qmd: "docs consolidate redundant exact-dup near-dup superseded stub modules themes compress dry kiss bmad"
related:
  - ./docs-topic-synthesis-swarm.story.md
  - ../../../../Notify/docs/bmad/stories/consolidation-orphan-docs.story.md
  - ../../../../Activity/docs/bmad/stories/docs-reorg-core.story.md
  - ../../../../Lang/docs/bmad/stories/docs-consolidation.story.md
  - ./docs-md-filename-date-debt.story.md
  - ../../wiki/docs-md-hygiene-debt.md
  - ../../../../../docs/sprint-status.yaml
---
# Docs consolidate redundant md

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Scopo / perché

Le `docs/` di moduli e temi sono gonfie di copie sync (exact-dup, `continuation-N`,
`*-2.md`, cluster stesso topic). Il second brain deve puntare a **un canone** per
argomento; le copie diventano stub `superseded_by` (niente delete di massa).

## Acceptance criteria

- [x] Exact-dup actionable (≥2 file non-stub stesso hash) ridotti: copie → stub kebab verso canone
- [x] Cluster topic evidenti (es. `git-conflicts-resolution*`, `continuation*`) compressi per modulo toccato (User git-conflicts + continuation exact; residui Notify *-2 e 2 Xot dash FULL)
- [ ] Nomi senza date; frontmatter+qmd sugli stub
- [ ] Indice/wiki del modulo aggiornato con link al canone (boy scout)
- [ ] Sprint `Xot/docs-consolidate-redundant-md` + diario qui
- [ ] Nessun mass-delete; nessun PHP/phpstan in questa story


## Coordinamento agenti (vivo)

| Lane | Owner | Scope | Evitare |
|------|-------|-------|---------|
| exact/near Cursor | composer-cursor | User, Notify, Xot, UI, Activity, Media, Rating, Job | moduli lockati da topic-synthesis |
| topic-synthesis | claude-opus f3659729 | Lang Tenant Sigma Zero One Three Ptv Progressioni Performance IR ICL Incentivi Pdnd | non ridoppiare exact-dup Cursor |
| semantic-consolidation | superseded | — | fermata, inventari passati |

Aggiornare questa tabella + diario a ogni wave. Non restare idle: prendere residui dalla tabella.

## Policy

1. Canone = path più corto / senza suffisso numerico / sotto `wiki/concepts` o `bmad/stories` se story.
2. Stub ≤20 righe: `status: superseded`, `superseded_by: ./canon.md`.
3. Near-dup: unire solo frasi uniche nel canone, poi stub.
4. Marker `<<<<<<<` nei non-SSoT: non collassare in massa in questa wave.
5. Lock per-modulo `bashscripts/lock/docs-consolidate-<Mod>.lock`.

## Diario

- 2026-11-25 (docs-guardian User-neardup, lock `docs-consolidate-User-neardup.lock`):
  cluster `git-conflicts-resolution*`/`git-conflict-resolution*` → canone
  `User/docs/git-conflicts-resolution.md` + § Storico path alias; **4** stub nuovi
  (thin `-1/-2`/`_archive`/`.bak`); after **19** stub / **1** residuo howto
  `git-conflict-resolution.md`. Diario: `User/.../docs-consolidate-redundant-md.story.md`.


- 2026-11-25j (docs-guardian Notify-neardup, lock
  `bashscripts/lock/docs-consolidate-Notify-neardup.lock`): scan body-identical /
  exact sha su `Notify/docs` `*-N.md` (384; `*-2`=202). **0** exact sha, **0**
  body-identical vs canone senza suffisso → **0 stub** (cap 40). Residui near-dup
  `*-2` non-stub **201** (hash diversi: self-ref, footer link, date placeholder).
  Fuori scope: `test.md`/`test01.md` body-identical senza `-N`. Diario modulo:
  `Notify/docs/bmad/stories/consolidation-orphan-docs.story.md` § body-identical.

- 2026-11-25i follow-up composer: verificato trailing-dash FULL Xot=0 post [Xot-neardup]; lock libero; prossima lane Notify `*-2` / topic synthesis peer.

- 2026-11-25i (docs-guardian Xot-neardup, lock
  `bashscripts/lock/docs-consolidate-Xot-neardup.lock`): chiude i **2** BOTH-FULL
  skippati in 25h — `module-bmad-audit-` merge KISS (user-story + 3 ref)→stub;
  `docs-100-fleet-merge-` stub-only (subset/FM corrotto). File toccati **3**.
  Trailing-dash FULL in `Xot/.../stories`: **0**. Peer 13 moduli non toccati.

- 2026-11-25h (composer, no-idle): coordinamento tabella agenti; Xot trailing-dash
  **8** stub near-size/body-identical (skip 2: docs-100-fleet-merge, module-bmad-audit);
  User cluster `git-conflicts-resolution*` → Alias storici + stub varianti/archive.
  Swarm near-dup Xot/User/Notify in volo. Peer: `docs-topic-synthesis-swarm` (13 moduli).

- 2026-11-25 (docs-guardian Notify/UI/Activity, lock
  `bashscripts/lock/docs-consolidate-Notify-UI-Activity.lock`): ordine random
  Activity→UI→Notify. Exact sha256 non-stub all’ingresso: **0/0/0** (UI 5 gruppi
  già stubbati in race parallela; Notify 4 gruppi inventario già assorbiti).
  Filename-clone: Notify `*-2` = **274** near-name con hash diverso → **non** uniti;
  theme/sixteen wiki vs theme = 5 near (no exact). Hotspot body-identical
  (solo frontmatter/qmd) → **49 stub** (cap 50): Activity **26**, UI **17**,
  Notify **6** (+ near-dup `cleanup-notify-.story` con merge ref INDEX).
  Counts md total/non-stub: Activity 730/708→730/682; UI 836/816→836/799;
  Notify 2897/2871→2498/2468 (Δ −399 file: race esterna, non questa lane).
  Residui: Notify volume + `*-2` near-dup; Activity `phpstan-fixes-activity` ≠
  `phpstan-fixes` (no merge); `*-duplicate` near-name non exact.

- 2026-11-25 (docs-guardian Lang): hotspot exact+near-FM → **28** stub (≤14r),
  canoni `continuation`, `8.10.phpstan-cluster2`, `quality-gates-phpstan-swarm`,
  `cluster3-phpstan-swarm`, `docs-consolidation`, `lang-phpstan-l10`, baseline
  `module-bmad-audit-lang-baseline-analisi-completa`. Exact actionable Lang: **0**.
  Diario: `Lang/docs/bmad/stories/docs-consolidation.story.md` § Diario exact-dup.

- 2026-11-25h (docs-guardian Xot/Rating/Media/Job, lock
  `bashscripts/lock/docs-consolidate-Xot-Rating-Media-Job.lock`):
  **Inventario exact-dup sha256** (non-stub): Xot 16 gruppi / 22 copie;
  Media 6 / 10; Rating 0; Job 0. Cross-check Xot `docs/wiki` vs
  `bashscripts/ai/wiki`: **0** exact match (nessun stub verso fuori-modulo).
  Peer race aveva già materializzato i 32 stub exact (Xot22+Media10+Rating3
  already-in-flight). Boy-scout questa lane: **3 stub nuovi** —
  `Media/01.Media-phpstan-fix` → canone lowercase `01.media-phpstan-fix`;
  `theme-three-docs-index-refresh-.story` → clean; `media-docs-conflict-marker-cleanup-.story`
  → clean; +2 retarget chain (`*-2` → clean). Exact actionable post: **0/0/0/0**.
  **Residui near-dup** (hash diverso): Xot trailing-dash FULL **0** (chiusi 2026-11-25i); restano topic non-dash / Notify `*-2`
  (`docs-100-fleet-merge-`, `fleet-blocking-…-`, `phpstan-fleet-remediation-`,
  `module-bmad-audit-`, `5.262-…-`, `phpstan-l10-…-`, `phpstan-ptv-…-`,
  `phpstan-analyse-modules-`, `phpstan-modules-bootstrap-and-user-`,
  `gettable-methods-cleanup-…-`); Media 2 (`quality-gates-phpstan-swarm-`,
  `cleanup-media-`). Rating/Job: solo near/basename collision, zero exact.

- 2026-11-25 (docs-guardian User): 28 gruppi exact → 0 residui; **38** stub `<600B`;
  canone lowercase `01.user-phpstan-fix`; thin `git-conflicts-resolution-4`/`.deprecated`
  + near-qmd `continuation-11`/`login-*-07`/`13-dcp-*`. Residui near-dup
  `git-conflicts-resolution{,-2,-27,-conflict*,-summary,...}`. Diario modulo:
  `Modules/User/docs/bmad/stories/docs-consolidate-redundant-md.story.md`.

- 2026-11-25g (chiusura exact-dup top moduli): actionable exact-groups **0** su
  Notify/User/Lang/UI/Activity/Xot/Rating/Media/Job. Stub cumulativi tipici:
  Lang~17, Notify5, User~29, UI7, Xot22, Media10, Rating3. Themes Zero/One già 0.
  Prossimo: near-dup / cluster topic (nome simile, hash diverso) + Notify volume 2897.

- 2026-11-25g (orchestratore): Lang **17** stub exact-dup (continuation, phpstan-cluster2, larastan, quality-gates, cluster3, services-to-actions); Notify **5**; User wave exact avviata (max 40). Canon trailing-dash corretti su Lang bmad (cluster3, module-bmad-audit, docs-consolidation). Swarm parallelo User/Lang/Notify-UI-Activity/Xot-Rating-Media-Job in volo.

- 2026-11-25: aperta. Inventario exact-dup actionable: User 27, Lang 9, Notify 4, UI 5+, Themes Zero/One 0. Swarm lane disgiunte.

### Nota di coordinamento (claude-opus-5.5 f3659729, 2026-11-25 11:45)

- Lavoro in parallelo con story [docs-topic-synthesis-swarm](./docs-topic-synthesis-swarm.story.md) sui 13 moduli/temi che
  questa wave non ha in lock (Lang, Tenant, Sigma, Zero, One, Three, Ptv, Progressioni, Performance, IndennitaResponsabilita,
  IndennitaCondizioniLavoro, Incentivi, Pdnd) con lo stesso schema `docs-consolidate-<Mod>.lock`. Non tocco i vostri moduli.
- **Policy da rivedere:** l'utente ha chiesto esplicitamente di "riunire, comprimere, sintetizzare": gli stub
  `superseded_by` lasciano invariato il numero di file. Lo swarm [docs-zen-conventions-swarm](./docs-zen-conventions-swarm.story.md)
  di stamattina ha eliminato ~1400 copie/stub di quel tipo (15908 -> 12467 file). Proposta: fondere nel canone ed **eliminare**
  la fonte, aggiornando i link (storico in git). Evitiamo di reintrodurre stub nei moduli gia' bonificati.

### Segnalazioni da claude-opus-5.5 (sessione 8f1ecc86, 2026-11-25 11:50)

- Mie lane docs fermate per collisione con i vostri lock; **gia' applicato prima dello stop** (copie/stub, canonico presente,
  link interni riscritti): Notify 2897→2397 (399 exact + 101 stub), Rating 527→418 (109), Job 413→355 (59 stub di link →
  `Job/docs/resources.md`). Elenchi e mappa vecchio→nuovo: handoff in
  [docs-semantic-consolidation-swarm](./docs-semantic-consolidation-swarm.story.md#handoff-agli-owner-cosa-e-gia-cambiato-prima-dello-stop).
- Riferimenti ancora da riscrivere (erano occupati da voi): `project-docs-index.md` (.claude, bashscripts/ai/.agents, Notify/ai-agents),
  `docs/wiki/{analysis,guidelines}/modules/{ui,xot}/links.md`, `Tenant/docs/it/links.md`.
- Prendo ora una lane **complementare, solo PHP**: riferimenti `@see`/`@contract docs/...` dal codice verso i docs (ne esistono
  gia' di rotti) + guardia eseguibile che li verifica, cosi' potete lanciarla prima di cancellare/spostare. Story:
  `laravel/Modules/Xot/docs/bmad/stories/php-docs-references-guard.story.md`. Non tocco file in `docs/`.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
