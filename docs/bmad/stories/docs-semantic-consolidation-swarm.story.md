---
title: "Consolidazione semantica docs di moduli e temi (swarm)"
type: story
epic: tooling-quality
module: Xot
status: superseded
superseded_by: "./docs-topic-synthesis-swarm.story.md"
created: 2026-11-25
qmd: "consolidazione docs moduli temi riunire sintetizzare comprimere duplicati archivi topic cluster swarm"
related:
  - ./8.25.docs-consolidation-audit-strategy.story.md
  - ../../../../../../bashscripts/ai/wiki/how-to/modules-ops.md
---
# Consolidazione semantica docs

## Context and Problem Statement

12.468 `.md` in `laravel/{Modules,Themes}/*/docs` (Notify 2897, User 2108, Lang 872, UI 836, ...).
Misura 2026-11-25 11:30: 1842 duplicati esatti di corpo, 1583 file in cartelle archivio
(`archive`, `_archive`, `_da-riconciliare`, `parcheggio`), 838 nomi con suffisso `-N`, 1181 file con
corpo < 300 caratteri, 364 alias/superseded. `docs-organizer.py` per scelta non cancella mai (marca
`superseded`): la ridondanza si accumula. La strategia target esiste dalla story 8.25 ma non e' stata eseguita.

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Perche'

12.468 `.md` in `laravel/{Modules,Themes}/*/docs` (Notify 2897, User 2108, Lang 872, UI 836, ...).
Misura 2026-11-25 11:30: 1842 duplicati esatti di corpo, 1583 file in cartelle archivio
(`archive`, `_archive`, `_da-riconciliare`, `parcheggio`), 838 nomi con suffisso `-N`, 1181 file con
corpo < 300 caratteri, 364 alias/superseded. `docs-organizer.py` per scelta non cancella mai (marca
`superseded`): la ridondanza si accumula. La strategia target esiste dalla story 8.25 ma non e' stata eseguita.

## Coordinamento

`composer-cursor` ha lock `docs-consolidate-20261125-composer` (11:37) su "exact-dup + near-dup".
Questa story fa la parte **semantica** (cluster per argomento, archivi, sintesi) per modulo, con lock
`docs-semantic-20261125-<Modulo>.lock`; regola anti-collisione: non toccare file modificati da altri
negli ultimi 10 minuti, ri-verificare il contenuto prima di cancellare.

## Lane (ordine casuale)

L1 Notify · L2 User · L3 Lang+Activity · L4 UI+Xot · L5 Rating+Media+Tenant+Job ·
L6 Ptv+IndennitaResponsabilita+Sigma+IndennitaCondizioniLavoro+Pdnd ·
L7 Themes Zero/One/Three + Progressioni+Performance+Incentivi.
Ogni lane scrive `docs/bmad/stories/docs-semantic-consolidation.story.md` nel proprio modulo.

## Regole

- Mai toccare: story (`*.story.md`), `raw/`, file `.php`; nessun commit/push.
- Prima di rimuovere un file: riferimenti entranti in tutto il repo (PHP `@see/@contract` inclusi)
  riscritti verso il canonico.
- Un argomento = un documento; fatti, decisioni, regole, comandi conservati; narrazione,
  ripetizioni, report di sessione compressi.
- Nomi kebab-case senza date, frontmatter valido con `qmd`.

## Acceptance criteria

- [ ] Conteggio `.md` prima/dopo per modulo
- [ ] Link rotti (`docs-organizer.py links --report`) non aumentati
- [ ] `md-filenames.py check` senza nuove violazioni; frontmatter parse ok
- [ ] Nessun riferimento entrante rotto (PHP/md/bashscripts)
- [ ] Story per modulo + `qmd update`

## Esito: superseded (11:50)

Perimetro gia' preso: `composer-cursor` (lock 11:37–11:38, Notify/UI/Activity/User/Xot/Rating/Media/Job,
story `docs-consolidate-redundant-md`) e sessione `f3659729` (lock 11:39:17, gli altri 13, story
[docs-topic-synthesis-swarm](./docs-topic-synthesis-swarm.story.md)). I lock di questa story (11:39:09)
erano successivi al lock globale di composer: errore di coordinamento, lane fermate. Gli inventari
raccolti (mappe dei riferimenti entranti, `@see` gia' rotti) sono passati alle sessioni owner nella sezione sotto.

## Handoff agli owner (cosa e' gia' cambiato prima dello STOP)

| Modulo | md prima → dopo | Fatto | Owner |
|---|---:|---|---|
| Notify | 2897 → 2397 | 399 duplicati esatti + 101 stub/alias cancellati (canonico presente), 338 link interni + ~65 esterni riscritti | composer-cursor |
| Rating | 527 → 418 | 109 duplicati esatti/quasi identici cancellati, link riscritti in 10 file | composer-cursor |
| Job | 413 → 355 | 59 stub di soli link esterni cancellati; URL raccolti in `Job/docs/resources.md` (nuovo) | composer-cursor |
| altri 18 | invariati | solo inventari (sola lettura) | composer-cursor / f3659729 |

Ripristino puntuale: `git -C laravel/Modules/<M> show HEAD:docs/<path> > docs/<path>`; elenchi nello
scratchpad della sessione `8f1ecc86` (`L1/deleted.txt`, `L5/Rating/deleted-by-L5.txt`, `L5/Job/deleted.tsv`).
Unica scrittura rimossa: `UI/docs/external-resources.md`.

Riferimenti ancora da riscrivere (file occupati da altre sessioni al momento della chiusura):
`.claude/docs/project-docs-index.md`, `bashscripts/ai/.agents/docs/project-docs-index.md`,
`Notify/docs/ai-agents/project-docs-index.md`, `docs/wiki/analysis/modules/ui/links.md`,
`docs/wiki/guidelines/modules/xot/links.md`, `Tenant/docs/it/links.md`,
`docs/wiki/analysis/modules/xot/folio-volt-architecture.md`, `docs/wiki/guidelines/modules/xot/{module-consolidated,folio-volt-filament-integration}.md`,
4 file in `Notify/docs/wiki/integrations/_da-riconciliare/` — mappa vecchio→nuovo: `L1/all-map.json`, `L5/Job/deleted.tsv`.

Scoperte utili per gli owner (verificate in sola lettura):
- `@see`/`@contract` gia' rotti da PHP: Performance migration `create_my_logs_table` → `docs/mylog-morph-relation.md` (sta in `bmad/`);
  Xot test `NoSemanticFolioPageDirectoriesTest` → `Themes/One/docs/folio-pages-structure.md` (in `bmad/`);
  8 `@see docs/dal-al-integer-yyyymmdd.md` (esiste solo in `IndennitaCondizioniLavoro/docs/bmad/`); ~30 path citati da PHP in Ptv mancanti.
- Da non spostare: `contracts/*.md` (Activity, Pdnd 35, Incentivi, Progressioni, Media), `Progressioni/docs/bmad/inverse-deps-ptv-sigma-decision.md`
  (11 PHP), Pdnd `adr/{README,INDEX,0000-template}.md` + `contracts/README.md` (test `PackagesHaveContractsAndAdrTest`), Media `html2pdf/`.
- Contenuto inventato (classi inesistenti): Media `file-management-architecture.md`, ICL `bmad/architecture{,-patterns}.md`, Themes One/Three (Filament 4, `ThemeOneChartWidget`).
- Tenant `bmad/architecture.md` e `bmad/brainstorming.md` contengono marker; Tenant `html2pdf/` duplica Media.
- Job `no-phpstan-probe-policy.md` contraddice il codice (`app/Phpstan/FormatSecondsPhpstanProbe.php` esiste).


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
