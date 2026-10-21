---
title: "PHPStan Modules zero — swarm random 2026-10-21"
type: story
status: in-progress
module: Xot
epic: quality-fleet
story_id: "xot-phpstan-modules-swarm-20261021"
track: quality/fleet
created: 2026-10-21
updated: 2026-10-21
tags: [phpstan, swarm, bmad, second-brain, filament-blueprint, docs]
qmd: "phpstan modules zero swarm random bmad second brain filament blueprint docs modules themes prompt stipendioTabellare"
related:
  - ./phpstan-zero-errors-modules.story.md
  - ./phpstan-ptv-incentivi-indennitaresponsabilita.story.md
  - ./swarm-phpstan-modular-docs-org.story.md
  - ../../../../Themes/Zero/docs/bmad/stories/quality-gates-phpstan-swarm-2026-09-23.story.md
  - ../../../User/docs/bmad/stories/user-module-independent-of-comment.story.md
  - ../../../Progressioni/docs/wiki/concepts/stipendio-tabellare-relationship.md
  - ../../../Ptv/docs/wiki/concepts/base-scheda-stub-relationships.md
  - ../../../Sigma/docs/wiki/concepts/phpstan-sigma-mass-extra-cleanup.md
  - ../../../Pdnd/docs/bmad/filament-custom-pages.md
---


# PHPStan Modules zero — swarm random 2026-10-21

## Obiettivo

Portare `cd laravel && ./vendor/bin/phpstan analyse Modules` a **0 errori**,
lavorando alla sorgente del problema (scopo e funzionalità del codice, non soppressione),
con swarm/subagent in parallelo e ordine random, dentro BMAD + second brain +
filament blueprint. Aggiornare e riordinare le docs di moduli e temi e rivedere i
prompt in `bashscripts/docs/prompts`.

## Perché (sorgente, non sintomo)

Un errore PHPStan è un contratto implicito violato: tipo sbagliato, firma incompatibile,
dipendenza trasversale non dichiarata, API Filament usata fuori dal contratto Xot.
La correzione deve ripristinare il comportamento previsto (Action, trait, resource,
widget) e, se il codice è morto, rimuoverlo. Baseline dichiarata: 0 errori
(`phpstan-zero-errors-modules.story.md`); ogni errore è una regressione.

## Acceptance criteria

- [ ] `phpstan analyse Modules/<Modulo>` verde per ogni modulo toccato.
- [ ] `phpstan analyse Modules` verde a fine giro (o debito residuo documentato con causa).
- [ ] Nessuna soppressione nuova in `phpstan.neon`; nessun `@phpstan-ignore` senza motivo scritto.
- [ ] User resta indipendente da Comment (composer + codice + test + docs).
- [ ] Docs di moduli/temi aggiornate con indice canonico e frontmatter; nessun duplicato esatto.
- [x] `bashscripts/docs/prompts` riordinati (indice + set canonico, duplicati assorbiti).
- [ ] Pest verde nello scope toccato su host non di produzione (host attuale: NOLWA004, ok).
- [ ] Story di cluster nei docs dei moduli owner; `docs/sprint-status.yaml` aggiornato.
- [ ] Second brain: memoria/regola aggiornata e `qmd update` (se disponibile).

## Vincoli

- Lock `bashscripts/lock/` prima degli edit; moduli con lock di altri agenti: non toccare.
- Docs BMAD sempre in `Modules/<Mod>/docs/bmad/` e `Themes/<Tema>/docs/bmad/`.
- Mai `migrate:fresh`, `--force`, `RefreshDatabase`; host `10.100.200.15` = niente test.
- Array PHP: una chiave per riga. Niente `->label()` hardcoded nelle UI.
- Estendere le basi Xot, mai le classi Filament dirette.
- Forward-only: niente reset/rewrite di storia.

## Ordine random e cluster (prima ondata)

| Cluster | Moduli | Owner |
|---|---|---|
| A | Rating, Activity, Media | subagent phpstan-a |
| B | UI, Notify, Job, Incentivi | subagent phpstan-b |
| C | User (+ decoupling Comment) | subagent phpstan-c |
| D | prompts + docs temi/moduli | subagent docs-d |

Seconda ondata (dopo lo scarico dei run concorrenti): Xot, Ptv, Performance,
Progressioni, Lang, Indennita*, Sigma, Pdnd, Tenant.

## Note di coordinamento

- Un altro processo sta eseguendo `phpstan analyse .` e `analyse Modules` sulla stessa
  macchina: i run full-tree sono rumorosi (errori di parse transitori su file in
  scrittura). La verifica affidabile è **per modulo**.
- I lock `Pdnd`, `Sigma`, `Tenant`, `Lang`, `IndennitaResponsabilita-phpstan-fix` sono
  del 2026-10-06: da considerare stale solo dopo verifica con `lock/check.sh` e
  assenza di processi attivi; non rimuoverli a mano senza motivo.

## Prompts reorg (2026-10-21)

Scope esclusivo: `bashscripts/docs/prompts/` + memoria
`bashscripts/ai/wiki/memories/docs-prompts-canonical-set-20261021.md`.
Nessun codice applicativo, nessuna docs di modulo o tema.

### Fusioni e rimozioni

| File | Azione | Esito |
|---|---|---|
| `18-github-issues.md` | **fuso** in `18-github.md` | Audit in sola lettura assorbito come sezione; il file resta alias `superseded_by: 18-github.md`, `source_of_truth: false`. Risolve la decisione aperta di `prompts-review.story.md`. |
| `INDEX.md` | **convertito in puntatore** | `README.md` e' l'indice canonico; `INDEX.md` resta per i link storici (`status: superseded`). |
| `00-`, `03-`, `05-`, `11-`, `15-`, `24-`, `25-`, `44-`, `46-`, `55-`, `57-`, `98-` | **qmd riscritti** | Da keyword soup (fino a 1573 caratteri) a frasi cercabili sotto 230 caratteri. |
| `prompts-review.story.md` | **riclassificato** | `document_type: story`, `status: archived`, `source_of_truth: false`: non e' un prompt. |

Nessun file eliminato: tutti i nomi storici restano referenziabili. Il set canonico
e' invariato salvo la fusione GitHub: 90 file, 62 canonici, 26 alias (incluso `INDEX.md`), 1 indice, 1 story.

### Indice e organizzazione

- `README.md` nuovo indice canonico: tabelle per serie con colonne file, tema,
  quando usarlo, fase BMAD, owner; alias; documenti non-prompt; regole d'uso;
  contratto documentale; lezioni apprese.
- Numerazione: prefissi = ID storici stabili, non ordine. Le collisioni
  `04`, `10`, `11` sono dichiarate e ammesse; per i prompt nuovi si prende il
  primo numero libero della serie.
- Allineamento ad AGENTS.md: eccezioni maiuscole ammesse solo `README.md` e
  `CHANGELOG.md`; i nomi storici restano dove gia' esistono e non si copiano.

### Link e contraddizioni corrette

- 14 link relativi rotti individuati e azzerati: profondita' errata
  (`../../laravel` e `../../../../laravel` -> `../../../laravel`) in
  `00-start`, `05-livewire`, `11-phpstan`, `19-docs-second-brain`, `46-swarm`,
  `INDEX`/`README`; link a docs Fixcity e Sixteen assenti nel checkout
  convertiti in path condizionali; link `bmad-output/epic-services...` rimosso
  perche' vietato da AGENTS.md e inesistente, sostituito dall'hub BMAD Xot.
- `prompts-review.story.md`: decisione su `18-github-issues` marcata risolta.

### Verifica

```bash
bash bashscripts/quality-gates/audit-prompts.sh          # exit 0, 0 bloccanti
php /tmp/opencode/links.php                              # 0 link relativi rotti
php /tmp/opencode/fmcheck.php                            # 0 frontmatter/related invalidi
php /tmp/opencode/anchors2.php                           # 0 ancore interne rotte
git -C bashscripts diff --check                          # nessun whitespace error
```

Debiti residui: collisioni numeriche storiche non rinominate (link esterni);
alias maiuscoli storici mantenuti; docs Fixcity/Sixteen non presenti nel
checkout. `qmd update` completato: prompt, memoria e story reindicizzati. Il
primo run era abortito su una collisione PK preesistente (4 coppie di `.md`
identici che differiscono solo per maiuscole in `bashscripts/git`,
`bashscripts/fix`, `bashscripts/ai/.github`, fuori scope); il secondo run ha
chiuso tutte le collection. Nessun commit/push.

## Dev Agent Record

- 2026-10-21: creata story orchestratrice; avvio swarm random su cluster A-D.
- 2026-10-21: chiuso il riordino prompt (cluster D): README canonico, fusione
  GitHub, 0 link rotti, audit-prompts verde.
- 2026-10-21 (sessione successiva, stesso ordine permanente): ripreso
  `phpstan analyse Modules` + swarm parallelo (Incentivi/UI/Lang-Tenant/Job-Notify-User/
  Performance-Progressioni-Ptv/ICL-IndennitaResponsabilita + docs-prompts).
  Contesa host: molti processi PHPStan peer su `/tmp/phpstan` → `flock -w 60`
  fallisce con raw vuoto (non interpretare come zero). Full-tree ancora in coda.
  Fix funzionali coordinatore:
  - Incentivi `AttivitaImportoProjector`: ripristino ripartizione via
    `UpdateProjectActivitiesAction` + naming Spatie; story
    `Incentivi/.../attivita-importo-projector-functional.story.md`.
  - Sigma `ExtractZip`: notifica con elenco file, rimosso throw debug; story
    `Sigma/.../extract-zip-notify-files.story.md`.
  - Tenant test: `assertCount(0, …)` al posto di `assertSame([], [])` tautologico.
  - Memoria `ordine-permanente-phpstan-swarm-docs.md` aggiornata (flock + scopo).
- 2026-10-21b: gate full-tree **198 errori** (no Fatal): Sigma ~175 (MassExtra
  variable.unused/assign.overwritten), Progressioni ~42 (HasMany `$this` vs
  `static` dopo migrazione Builder→HasOne), Pdnd 1 (GuzzleProxyPage).
  Swarm parallelo: Sigma MassExtra, Progressioni relationship PHPDoc, Pdnd,
  docs-guardian. Progressioni alone era verde a intermittenza per race sul trait.
- 2026-10-21b docs-guardian (no PHP): indici canonici Progressioni/Sigma/Ptv/Pdnd;
  concept `stipendio-tabellare-relationship` + `base-scheda-stub-relationships`;
  decisione Ptv stipendio **chiusa**; Sigma MassExtra cleanup concept (story già
  parziale); Pdnd `GuzzleProxyPage` documentata; rimosso `Sigma/docs/readme.md`
  duplicato di `README.md`; temi One/Three/Zero invariati (già organizzati).

## Docs temi (2026-10-21)

Scope: `laravel/Themes/{One,Three,Zero}/docs` + memoria second brain. Lock
`docs-temi` acquisiti sui tre alberi docs. Nessun codice applicativo, nessun
commit/push.

### Esito per tema

| Tema | Canonico | Esito | Story |
| --- | --- | --- | --- |
| One | `docs/INDEX.md` | 19 `.lock` stale rimossi, 6 duplicati assorbiti/rimossi, 2 frontmatter aggiunti, indici riscritti, 0 link rotti in indici/README | `laravel/Themes/One/docs/bmad/stories/docs-organization.story.md` |
| Three | `docs/index.md` | `INDEX.md` cancellato da processo concorrente, indice riscritto, 49 link rebasati, `bmad/readme.md` ridotto a ingresso, 0 link rotti in indici/README | `laravel/Themes/Three/docs/bmad/stories/docs-organization.story.md` |
| Zero | `docs/index.md` | 65 file/123 blocchi di conflitto risolti, duplicati case-only assorbiti, `bmad/outputs` e `archive/duplicates` archiviati in `_archive`, 62 link rebasati, 0 link rotti in indici/README | `laravel/Themes/Zero/docs/bmad/stories/docs-organization.story.md` |

### Regole applicate

- Un solo indice canonico per tema; i nomi storici restano alias o finiscono in
  `_archive/` con il contenuto preservato.
- Frontmatter YAML valido e `qmd` in tutti i `.md` attivi: scan finale 0 mancanti
  su One (112), Three (57), Zero (204).
- `filament-blueprint.md` creato nei tre temi: solo basi Xot, niente label
  hardcoded, widget FO montati esplicitamente, tenant/policy nei moduli owner,
  gate PHPStan unico `laravel/phpstan.neon`.
- `architecture/README.md` creato dove la cartella era vuota.

### Verifica

```bash
rg -n '^(<<<<<<<|=======$|>>>>>>>)' laravel/Themes/{One,Three,Zero}/docs --glob '*.md'
find laravel/Themes/Zero/docs -type f | tr 'A-Z' 'a-z' | sort | uniq -d
# frontmatter/qmd: 0 mancanti; indici/README: 0 link relativi rotti
```

### Debito residuo

- Link relativi rotti nei documenti storici (One 115, Three 47, Zero 303):
  puntano a moduli assenti nel checkout o a file rimossi in passate pulizie;
  non sono negli indici/README.
- Le docs di One/Three restano in gran parte dichiarative: i temi sono skeleton.
- `qmd update` eseguito dal coordinatore a fine sessione (tutte le collection aggiornate).
- Nessun test Pest/PHPStan: diff docs-only, nessun codice toccato.
