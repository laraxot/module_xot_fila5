---
title: Miglioramento dei prompt operativi di bashscripts
type: story
module: Xot
phase: BMAD Quick Flow, analisi, implementazione, QA
status: done
created: 2026-10-20
updated: 2026-10-20
tags: [prompts, bashscripts, second-brain, bmad, phpstan]
qmd: "miglioramento prompt bashscripts docs prompts scopo perche quando usarlo passi gate anti-pattern alias canonici lezioni apprese inventario duplicati"
related:
  - ../bmad/stories/docs-prompts-reorganization.story.md
  - ../bmad/stories/5.258-prompts-execute-improve.story.md
  - phpstan-test-wave-regression.story.md
---

# Miglioramento dei prompt operativi di bashscripts

## Richiesta

Ordine dell'utente: "migliora tutti i prompt scritti dentro bashscripts/docs/prompts", concentrandosi su scopo e perche, non solo sulla forma. `bashscripts` e' un repo git a se: nessun commit, reset, checkout, restore o stash.

## Scopo ricostruito

Un prompt serve a evitare un guasto che un agente ha gia' causato. Un prompt che non dice quale guasto previene, quando non va usato e come si prova che ha funzionato viene copiato in una seconda versione che diverge (da qui i 24 alias) e invecchia in silenzio (da qui le affermazioni false trovate sotto). La struttura comune impone quindi: Scopo e perche, Quando usarlo, Passi, Gate di verifica con comando reale, Anti-pattern.

## Inventario (89 file, tutti conservati)

- 63 prompt canonici (struttura comune), 24 alias, `INDEX.md`, `prompts-review.story.md`.
- Nessun file creato, rinominato o cancellato: `git ls-files` 89, sul disco 89, 0 cancellati. Modificati 89 (+3148, -2190 righe). Il totale sale da 4839 a 5798 righe perche' ogni canonico ha ora scopo, gate e anti-pattern, e gli alias spiegano il perche' del nome; `98-daily-report.md` scende da 1378 a 364.
- Riferimenti entranti, verificati con due metodi indipendenti (`rg -uu -P` con confine di parola e `grep -rlP`): i due metodi concordano su 87 file su 89, le due differenze sono `98-daily-report.md` (5 contro 4) e `INDEX.md` (1246 contro 1245), file che i metodi leggono in modo diverso; si e' preso l'unione. Dato che nessun nome e' cambiato, ogni riferimento resta valido. Ancore citate da fuori e ancora presenti: `00-start.md#3-concorrenza-e-sicurezza`, `#vincoli-permanenti`, `#4-gate-iniziali-proporzionati`, `04-filament.md#mappa-classi`. Il solo caso rotto, `03-quality-gates.md#preflight` (citato da una story di Activity), era gia' assente nella versione di partenza: non e' una regressione.

## Duplicati e puntatori

Nessuna coppia con corpo uguale oltre il 95% (gate DUPLICATE = 0). Il criterio era lo scopo, non il testo: il piu' completo resta canonico, gli altri sono alias brevi con `superseded_by` e `canonical`.

| Gruppo | Canonico | Alias |
|--------|----------|-------|
| Controller verso Folio | `02-controller-to-folio-actions` | `04b-controller-to-folio-actions` |
| Widget Livewire verso Filament | `05-livewire-to-filament-widgets` | `05-widget`, `28-livewire-to-filament-widgets` |
| Audit Filament | `06-filament` | `06-filament-audit` |
| Test | `10-test`, `29-testing-standards` | `10-pest-xot-base-test`, `06-testing-standards` |
| BMAD | `15-bmad` | `15-bmad-audit`, `BMAD_PROMPT` (era l'unico guasto bloccante: nessun frontmatter, e non era BMAD) |
| Git | `16-git-forward-only` | `16-git`, `17-git` |
| Sync repo | `48-gitmodules-sync` | `17-gitmodules-sync` |
| Docs | `19-docs`, `30-documentation-standards` | `19-docs-second-brain`, `07-documentation-standards` |
| Filesystem | `20-filesystem` | `20-filesystem-before-assertions` |
| Bootstrap | `01-confidence-bootstrap` | `27-confidence-bootstrap` |
| Second brain | `57-second-brain` | `57-second-brain-operating-model`, `second-brain-master` |
| Altri | `00-start`, `10-ponytail-audit`, `46-multi-agent-module-swarm`, `97-yaml-frontmatter-convention`, `98-daily-report`, `09-migrations`, `08-ui` | `start`, `17-ponytail`, `56-multiple-ai`, `97-YAML-FRONTMATTER-CONVENTION`, `daily-report`, `09-migrations-forward-only`, `08-playwright-ui` |

Sovrapposizioni di scopo tra canonici risolte per puntatore: `19-docs` (dove scrivere cosa) contro `57-second-brain` (ciclo), e `30` (regole assolute), `55` (verifiche), `12` (come scrivere una pagina), `44` (durante il task).

## Affermazioni stantie corrette (prova sul filesystem)

- `docs/wiki/rules/` non esiste: il canone e' `bashscripts/ai/wiki/rules/`. Corretti i link relativi e i percorsi testuali (12 link rotti e una ventina di percorsi misurati all'inizio), con verifica del file di destinazione.
- `laravel/tools/` esiste (`phpmd.sh`, `phpinsights.sh`, `quality-reminder.md`); `11-phpinsights` diceva che non esiste un wrapper. `phpmd.sh` non e' eseguibile: si lancia con `bash`.
- `laravel/pint.json` e `laravel/CLAUDE.md` non esistono. `bmad-output/sprint-status.yaml` non esiste (il file e' `docs/implementation-artifacts/sprint-status.yaml`).
- Fixcity e Sixteen non esistono in questo repo (moduli: 19; tema: Zero): esempi sostituiti, `62-header-json-content` reso condizionale al precheck del file.
- `find -newermt '-60 minutes'` non funziona (e' bfs): usare `-mmin -60`.
- Le `Modules/*/routes/*.php` non sono "non caricate": `routes/web.php` e `routes/api.php` sono mappate da `XotBaseRouteServiceProvider` (`php artisan route:list --path=api/user/login` risponde); un altro file risponde solo se `web.php` lo include (`require __DIR__.'/socialite.php'`). Corretti `02`, `03`, `38`.
- `mutateFormDataBeforeEdit` non esiste in Filament v5; `CanComment` non esiste; `troubleshooting-login-auth.md` non esiste. Corretti `04-filament`, `07-contracts`, `14-module-dependency-direction`.
- `10-test.md` diceva "mai `uses()->in()` in `Pest.php`" e "ogni file dichiara `uses`": lo stato misurato e' `pest()->extend(TestCase::class)->in(...)` in cinque moduli e `uses(TestCase::class)` in 179 file su 200 in Xot. Il prompt ora riporta regola e stato, senza uniformare in blocco.
- Nella shell degli agent `grep` e' una funzione (`type grep`) che filtra i path ignorati: come secondo metodo si usa `/bin/grep`.

## Lezioni del 2026-10-20 e dove vivono

1. Salto del conteggio PHPStan senza cambi di produzione (10053 errori dopo il pull, 393 file di test con mtime 08:57, 9784 errori in poche cause alla sorgente): `11-phpstan.md`, sezione "Salto improvviso del conteggio", con `find -newermt`, `git diff --stat HEAD -- tests`, `hash-object` piu' `log --find-object` (provato su un blob reale di Notify) e conteggio per identificatore e messaggio. Richiami in `03`, `10-test`, `16-git-forward-only`.
2. Test con SUT assente: scala delle decisioni in `10-test.md`; richiami in `11`, `29`, `53`, `09`, `36`.
3. Concorrenza: gate lock piu' mtime sopra 120 s nel codice in `03-quality-gates.md` (Lock), con le due soglie (file caldo sotto 120 s, lock vivo sotto 60 min) e il limite ai PHPStan paralleli (misurati 33 processi, circa 33 GiB RSS); `46`, `00-start`, `11`.
4. Misure: `rg -P`, mai `2>/dev/null` dove vuoto significa ok, controprova di ogni zero, `/bin/grep`: `20-filesystem.md`; applicato a `14`, `42`, `43`, `45`, `51`, `33`-`37`.
5. Artefatti BMAD solo in `laravel/Modules/<M>/docs/` o `laravel/Themes/<T>/docs/`, nomi senza date, data in frontmatter: `15-bmad.md`; allineati `00`, `19`, `30`, `55`, `99`, `98` e gli altri che citavano `bmad-output/`.
6. `laravel/phpstan.neon` immutabile, nessun baseline: `11-phpstan.md` con comando di prova (`ignoreErrors` e include del baseline commentati; ultima modifica 2026-09-24).

## Verifica (output reale, 2026-10-20)

- `bash bashscripts/quality-gates/audit-prompts.sh --bloated`: 89 prompt, 103 snippet bash, BLOCCANTI 0 (CONFLICT 0, EATEN 0, BROKEN 0, SLUG 0, FRONTMATTER 0), DUPLICATE 0, STUB senza puntatore 0, BLOAT 0, "nessun guasto bloccante". Resta un solo avviso (`prompts-review.story.md` senza `role`).
- Link e path: nessun link relativo rotto; ancore interne tutte valide; restano 4 token di percorso volutamente inesistenti (`helpers/Helper.php` relativo al modulo, `laravel/config/notify-env.php` citato come assente, `sections/header.json` precheck condizionale, `public/manifest.json` esempio).
- `rg -cP '\x{2014}|\x{2013}'` su tutta la cartella: nessun match (controprova positiva su file di prova: trova; `/bin/grep` concorde). Nessuna emoji.
- `grep -rlP '^(<<<<<<< |>>>>>>> )'`: nessun file. `git -C bashscripts diff --check`: pulito. Nessun `*.lock` residuo.

## Aperto (fuori scope di questa story)

- `bashscripts/docs/modular-bmad-story-policy.md` ammette ancora epic in `bmad-output/` e date nei nomi: va allineata alla regola dell'utente.
- `CLAUDE.md` di root e `bashscripts/tools/prompts/README.md` citano ancora `docs/wiki/rules` e gli 8 prompt storici.
- `.mcp.json`: `qmd` punta a un binario inesistente e `github` ha un header `Authorization` segnaposto; `bashscripts/docs/mcp-servers.md` dichiara 10 server contro i 21 attuali.
- `bashscripts/tools/claims-open.py` legge solo `docs/bmad/stories/`: le story in `docs/stories/` (come questa) non risultano come claim.
- `Modules/Xot/tests` e `Modules/Cms/tests` hanno anche `pest.php` minuscolo (duplicato riportato dal pull); alcuni file in `Modules/Xot/docs/` contengono ancora marker di conflitto.
- `worklog.py index` scrive i `.md` di `docs/worklog` senza frontmatter; `docs/worklog/2026/10/09/` fallisce `verify`.
- Reindicizzazione QMD non ottenuta: `bash bashscripts/docs/llm-wiki-qmd.sh update` esce con 0 ma le quattro collezioni (`trade-fila5-prompts`, `-bashscripts`, `-modules`, `-wiki`) puntano a `/mnt/nas07/var/www/_bases/base_ptvx_fila5/...`, un altro progetto: 0 nuovi, 0 aggiornati, e una `search` sul testo nuovo non trova nulla. E' il caso descritto in `55-md-conventions.md` (un `update` senza errori non prova l'indicizzazione). Va ripuntato l'indice a questo repo: decisione dell'utente, non toccata qui.
