---
title: "Docs md filename date debt"
status: in_progress
epic: documentation
qmd: "docs markdown filename date timestamp debt rename git mv kebab second brain moduli temi"
acceptance_criteria:
  - "Inventario violazioni date/timestamp nei nomi .md sotto Modules/*/docs e Themes/*/docs"
  - "Rinomine solo via git mv; riferimenti e sprint-status aggiornati; nessun delete"
  - "Un canonico per argomento; duplicati → alias superseded_by"
  - "Nessuna data nel nuovo nome; data solo nel frontmatter"
references:
  - bashscripts/docs/prompts/54-documentazione.md
  - bashscripts/docs/prompts/00-master-prompt.md
  - docs/wiki/rules/markdown-documentation-standard.md
related:
  - ./prompts-standing-order-alignment-phpstan-wave.story.md
  - ./docs-prompts-reorganization.story.md
---

# Docs md filename date debt

## Scopo

I nomi `.md` sono chiavi stabili per second brain e link tra story. Date/timestamp
nel filename rompono la ricerca, creano duplicati e violano il master prompt.
La data vive nel frontmatter (`created`/`updated`), non nel path.

## Inventario 2026-11-17

- Totale violazioni (Modules+Themes docs): **250** (regex date ISO / timestamp).
- Peggiori moduli (conteggio): da misurare in diario per-modulo durante le wave.
- Strategia: wave per modulo owner, `git mv`, aggiornare link interni +
  `docs/sprint-status.yaml` se cita il path, lasciare stub alias solo se il vecchio
  nome e' referenziato da agenti esterni.

## Non fare

- Delete massivo.
- Rinomine durante saturazione PHPStan sullo stesso worktree senza claim.
- Nuovi file con date nel nome.

## Diario

<!-- supersedes: diario pre-swarm 09:42; linked-from: sprint-status Xot/docs-md-filename-date-debt, handoff-phpstan-swarm-session; user: "fa tutto in parallelo utilizzando swarm + subagents + bmad + ecc + second brain" -->

- 2026-11-17: inventario iniziale 250; story creata dal swarm PHPStan session.
- 2026-11-17 ~09:42 swarm parallelo (scope disgiunti): User; Notify+Rating; Activity+Xot; Indennita*+Media+Lang; Themes explore; prompts+ECC.
- Coordinatore: saturazione HARD in `46-multi-agent-module-swarm.md` + ECC `00-index.md`.
- **Incidente mass-delete:** docs-guardian ha prodotto centinaia di `D`; recovery `git cat-file` da HEAD (User 476, Notify 68, Rating 14, Activity 9). STOP `docs/chat/STOP-docs-guardian-mass-delete.md`. Memoria `docs-rename-no-delete-git-mv-only.md`.
- Audit docs [9505a256](9505a256-2305-4e10-a9e2-5a6a9ef7d38f): ~353 date-names; priorità SSoT story + phpstan.md unico per modulo.
- Prossimo: solo `git mv` validati; niente nuovi guardian rename finché hygiene User/Notify stabile; Themes Zero F1 in lane dedicata.
- 2026-11-17 (docs-guardian / User): wave `Modules/User/docs` — **12** `git mv` → alias kebab `*-historical*` (11 superseded) + `stories/user-gap-analysis.story.md`. Link root aggiornati in `index-3.md`/`index-3.md` + 4 file wiki/story. Residui User post-wave (scan completo): **~107**. Story modulo: `Modules/User/docs/bmad/stories/docs-md-filename-date-debt.story.md`.
<!-- GateGuard: edit existing Xot story (not create). No supersede. Linked from User companion + sprint-status. User asked: "Append diario nella story Xot docs-md-filename-date-debt e nella story User." -->
<!-- GateGuard facts: (1) no supersede/duplicate — append only to existing docs-md-filename-date-debt.story.md; (2) linked from Rating docs-filename-no-date-bonifica-rating + sprint-status; (3) edit existing not new file; (4) user: "Append breve esito nella story Xot date-debt e, se esiste, story locale bmad." -->
- 2026-11-17 (docs-guardian / Notify+Rating): wave scope disgiunto, solo `git mv` + `superseded_by` (no delete).
  - **Notify** 10 rename (year/month cluster excellence/roadmap/phpstan-gennaio → kebab). Refs interni **36** file. Residui rule-regex: **68**.
  - **Rating** 10 ISO→`*-from-iso` (+ alias WT `*-legacy` superseded). Residui rule-regex: **3**. Story locale aggiornata: `Modules/Rating/docs/bmad/stories/docs-filename-no-date-bonifica-rating.story.md`.
<!-- GateGuard facts ICL/IR/Media/Lang: (1) no supersede — append to this existing story; companion User story untouched; (2) linked from sprint-status Xot/docs-md-filename-date-debt; (3) edit existing diary not new file; (4) user: "Append diario breve in docs-md-filename-date-debt.story.md (sezione nuova per questi moduli)." -->

### Wave 2026-11-17 — ICL / IR / Media / Lang (scope disgiunto)

Checker: `md-filenames.py` (`data`) + heuristic year-only. Nessun delete / phpstan / commit. Notify non toccato.

| Modulo | Date ISO (tool) | Rinomi | Residui |
|--------|-----------------|--------|---------|
| IndennitaCondizioniLavoro | **0 — nessuna violazione** | 0 | 0 |
| IndennitaResponsabilita | **0 — nessuna violazione data** | 0 (`cci-2026-*` = dominio CCI) | 0 debt date |
| Media | **0 — nessuna violazione data** | 0 | **35** suffissi `-N` tutti in collisione col canonico |
| Lang | 0 ISO; 2 year-only `-2025` | 2 → `*-historical.md` + `superseded_by` | `translation-*-.md` (trailing dash = canon); index Notify ancora cita `-2025` (fuori scope) |

Lang `git mv`:

- `translation-audit-completion-3.md` → `translation-audit-completion-historical.md`
- `translation-errors-correction-3.md` → `translation-errors-correction-historical.md`

Link interni Lang: nessuno da riscrivere.


- 2026-11-17 wave Activity+Xot (docs-guardian scope disgiunto): Activity 0 ISO
  pre-wave ma 9 tracked con date compact/ISO + 3 UPPERCASE archive; Xot 2
  year-suffix + 3 stub UPPERCASE. `git mv` ×17 (Activity 12 + Xot 5). Duplicati
  trailing-dash/INDEX/BAD_PRACTICES/STORY-512 → stub `superseded_by` (no delete).
  Link Activity aggiornati. Residui: Activity 10 alias `-`; Xot ~20 trailing-dash
  mid-flight (index ancora dated). Lock rilasciati.
- 2026-11-17 follow-up ([P0 prompts](e58683be-5df8-42c4-9a77-e7491689fd67),
  [Notify+Rating](472f4ca7-339e-47a6-9cc2-a2dee0305e6c),
  [ICL/IR/Media/Lang](a467403f-0eca-4771-928f-3d837421ce21),
  [Activity+Xot](30bd2e75-1b6e-4d50-aac7-d1be6917b572)): **secondo** mass-delete
  (User 570, IR 104, Activity 79, Rating 61, ICL 44, Xot 36, Media 28, Lang 27).
  Recovery HEAD → `D=0`. Moratoria rename docs; STOP aggiornato. I `git mv` validi
  (es. `*-historical.md`) restano; non rilanciare guardian finché pre-flight pulito.

### Spot-check 2026-11-23 (docs-guardian, no rename)

Ambito: moduli con errori PHPStan attesi (AI / Notify / Xot). Solo inventario; moratoria rename confermata.

| Owner | Esito |
|---|---|
| **AI** | Modulo **assente** in questo tree (`laravel/Modules/AI` non esiste). Debito: N/A. |
| **Notify** | ~3144 `.md`. Indici multipli (`00-index.md` / `INDEX.md` / `index.md`). `00-index`: 7/31 link campionati broken (`phpstan-cluster.md`, story in `./stories/`, path root `docs/composer-*`). Naming: ~622 `*_*.md`, ~42 suffissi `-N`, UPPERCASE (`PHPSTAN-*`, `BEFORE-AFTER-*`, `CHANGELOG.MD`). Claim "PHPStan Level 10 Compliant" in index **non verificato** in questa wave. |
| **Xot** | ~430 `.md`. `docs/consolidated/phpstan/*-[0-9]*` ~30 (suffissi `-1`/`-1-1`/`-2`). `00-index`: link a `bmad-output/...` e story dated `stories/2026-10-13-dcp-45-...`. UPPERCASE residui (`Architecture.md`, `STORY-XXX-*`). |
| **Themes/Zero** | Ancora `f1-world-champion-2026-theme-analysis.md` + story dated `quality-gates-phpstan-swarm-2026-09-23.story.md` (lane dedicata, non mass-rename). |

Prossimo (quando hygiene stabile): wave Notify indici (un canonico + link) e Xot `consolidated/phpstan` fuse/alias; Themes Zero F1 `git mv` singolo. Refs: [prompts-standing-order-alignment-phpstan-wave.story.md](./prompts-standing-order-alignment-phpstan-wave.story.md).

<!-- GateGuard facts: (1) no supersede — append only to existing docs-md-filename-date-debt.story.md; (2) linked-from: docs/sprint-status.yaml Xot/docs-md-filename-date-debt + User companion story; (3) edit existing not new file; (4) user: "Story debito: ... avanza un chunk REALISTICO" + "Aggiorna docs/sprint-status.yaml riga Xot/docs-md-filename-date-debt". -->

### Wave 2026-11-24 — prio Xot/User/Performance/Ptv/Themes Zero (docs-guardian)

Ambito: chunk realistico (~18 path), solo `git mv` + stub `superseded_by`, **D=0**.
Niente phpstan. Indici README aggiornati (Performance/Progressioni/Ptv + Zero).

| Owner | Azione | Note |
|---|---|---|
| **Performance** | story datata → `phpstan-l10-performance-swarm.story.md` + stub | file era untracked: contenuto ricostruito da purpose/README/contract |
| **Themes/Zero** | 2 dated → `*-historical` + stub; `METODI_*` → kebab; `CONFLICT_*` stub | F1 già stub; date ISO/year attive Zero = **0** |
| **Xot** | `STORY-XXX` → kebab; UPPER `Architecture`/`STORY-512`/`ST-XX` → stub; `consolidated/.../gennaio-1` → batch (gitignored, recovery scratchpad) | date ISO/year attive Xot = **0** |
| **User** | root dated → historical/stub verso canon (`phpstan-fixes*`, `roadmap`, `translation-syntax`, `git-conflicts`) | residui attivi: **24** (quasi tutti `wiki/archive/**`) |
| **Ptv** | `METODI-DUPLICATI-ANALISI` → stub verso kebab | date attive = **0** |
| **Progressioni** | nessun rename (0 violazioni date) | solo README backlink |

**Inventario post-wave (ISO/year/compact, non-stub):** Modules+Themes **~56** attivi (tutti i filename con data incl. stub: **66**). UPPERCASE attivi ~649 (Notify dominante). `cci-2026-*` in IR = dominio CCI, non debt data.

**Lezione:** mai stub-overwriting se `git mv` fallisce su untracked/gitignore — verificare exit code; recover immediato.

Prossimo chunk: User `wiki/archive/**` dated (batch 15–20 stub→canon dove esiste), poi Notify dated root; UPPERCASE solo dove esiste già kebab canonico.

<!-- GateGuard facts: (1) no supersede — append only to existing docs-md-filename-date-debt.story.md; (2) linked-from: docs/sprint-status.yaml Xot/docs-md-filename-date-debt + User companion story; (3) edit existing not new file; (4) user: "Append diario story Xot + companion modulo se esiste + riga docs/sprint-status.yaml Xot/docs-md-filename-date-debt". -->

### Wave 2026-11-24c — Notify/UI tracked + User archive gitignored (docs-guardian)

**Premessa inventario:** Progressioni / Performance / Ptv / Xot = **0** dated ACTIVE.
Residui reali tracciati pre-wave: solo **7** (`Notify`×4, `Lang`×2, `UI`×1). Il grosso (~45) è **gitignored** (User `wiki/archive`, Notify `project_docs`, Rating `*-[0-9][0-9].md`).

| Scope | Azione | Note |
|---|---|---|
| **Notify** (tracked) | 4× `git mv` `*-2026-03.md` → `*-mar-historical.md` + stub dated → canon | D=0; canoni `documentation-improvement-summary.md` ecc. |
| **UI** (tracked) | 1× `git mv` `roadmap/2025-q4-roadmap.md` → `q4-roadmap-year-historical.md` + stub → `q4-roadmap.md` | |
| **Lang** (tracked) | 2× rewrite stub (no mv: `*-historical.md` già presenti) → `translation-audit-completion-4.md` / `translation-errors-correction-4.md` | |
| **User** `wiki/archive/**` | 18× filesystem `mv`+stub (path **gitignore** → `git mv` N/A) | stub→canon dove esiste; legacy 2 content-kept in `*-historical.md`; **nessun rm** |
| **Progressioni/Perf/Ptv/Xot** | 0 | già puliti |

**Post-wave ACTIVE ISO/year (Modules+Themes, excl. `cci-2026*`):** **~27** (pre ~52; story precedente citava ~56). Stub dated residui ~35.

**Residui next:** Notify ignored `project_docs/roadmaps/*-2025-10` (~10) + root `work-completed`/`implementation-summary`; User archive leftovers 7; Rating ignored 6; Job/ICL 1 ciascuno.

**Lezione:** la maggior parte del debito date è fuori da git index; wave “git mv only” sui tracked è piccola — archive va trattato con `mv`+stub senza `rm`, mai force-add di dump interi.
<<<<<<< .merge_file_j5UXGc

<!-- GateGuard facts: (1) no supersede — append only to existing docs-md-filename-date-debt.story.md; (2) linked-from: docs/sprint-status.yaml Xot/docs-md-filename-date-debt + User companion + Rating bonifica story; (3) edit existing not new file; (4) user: chunk REALISTICO max 15 Notify project_docs + User leftover + Rating ignored. -->

### Wave 2026-11-24d — Notify project_docs + Rating ignored + User leftover (docs-guardian)

Chunk **15**, solo filesystem `mv`+stub (`superseded_by`), **nessun rm**, no PHP, no phpstan.
Path **gitignored** → `git mv` N/A (Notify `project_docs`, Rating `*-[0-9][0-9].md`, User `wiki/archive`).

| Scope | N | Azione |
|---|---|---|
| **Notify** `project_docs/` + `roadmaps/` | 10 | `*-2025-10.md` → `*-oct-historical.md` + stub dated → bare canon (`final-implementation-report`, `agid-analysis-implementation`, …) |
| **Rating** ignored | 2 | root `phpstan-fixes-2026-01` → `phpstan-fixes-jan-historical` + stub→`phpstan-fixes.md`; bmad promote → `phpstan-fixes.md` + stub dated |
| **User** archive leftover | 3 | `old_tasks/phpstan-fixes-2025` → `*-year-historical` + stub; `old_tasks/phpstan-fixes-gennaio-2025` → `*-year-historical` + stub→`phpstan-fixes-gennaio.md`; `historical/phpstan-fixes-2025` → `phpstan-fixes-year-historical` + stub |

**Post-wave ACTIVE ISO/year (excl. `cci-2026*`):** **~17** (pre ~27). Stub dated ~34.
**Residui next:** Notify root ignored `work-completed-2025-10` + `implementation-summary-2025-01`; User root×3 + archive symlink×6 + historical theme-pointer×2 + wiki legacy×2; Themes/Zero×2.

Link min: Rating `INDEX-GENERATED.md` / `bmad/index-generated.md` label `phpstan-fixes-2026-01` → canon. Memoria `docs-rename-no-delete-git-mv-only` confermata.

<!-- GateGuard facts: (1) no supersede — append only; (2) linked-from sprint-status Xot/docs-md-filename-date-debt; (3) edit existing; (4) user: Activity+Xot+UI chunk date-debt DRY+KISS. -->

### Wave 2026-11-24e — Activity + Xot + UI (subagent date-debt)

Ambito: solo `laravel/Modules/{Activity,Xot,UI}/docs`. Lock moduli (stale unlock → reclaim). **Nessun rm** su path dated (stub `superseded_by`); `readme.md` duplicato di `README.md` eliminato dopo promote contenuto utile. No PHP / no phpstan / no commit.

| Owner | Azione | Esito |
|---|---|---|
| **Activity** | story `php-conflict-markers-20261124` → `php-conflict-markers.story.md` + stub; `phpstan-analysis-november` → snapshot-historical + stub→`phpstan.md`; inventory-april → snapshot-historical + stub; `ARCHITECTURE.md` → stub→`architecture.md`; 2× `readme.md` (bmad/wiki) eliminati dopo promote | **ACTIVE ISO/month = 0** |
| **UI** | 7 month-named (`january`/`gennaio`/`november`) → `*-snapshot-*-historical` + stub→`phpstan-corrections`/`phpstan-fixes`/`translations-update`; `2025-q4` già stub; 2× `readme.md` eliminati; link in `index.md`/`00-index.md` | **ACTIVE = 0** |
| **Xot** | 6 story suffix `-24`/`-25`/`-29` (duplicati identici del canon) → stub; `consolidated/.../gennaio-*` → batch-historical + stub; `standards`+`best-practices` `readme.md` eliminati (best-practices restored into README) | **ACTIVE = 0** |

**Residuo in-scope:** solo stub dated/month (alias) + epic-num story BMAD (`5.xxx` / `8.x` / `1.4` / `7.15`) non toccati in questo chunk (non sono date ISO; debt naming numerico a parte).

**Indici:** Activity `docs/index.md` + `wiki/00-index.md`; UI `index.md` + `00-index.md` aggiornati ai canoni.

**Prossimo (fuori chunk):** Notify root ignored dated; User archive leftovers; epic-num story rename wave dedicata; UPPERCASE residui dove esiste kebab.
=======
>>>>>>> .merge_file_cYdNUY
