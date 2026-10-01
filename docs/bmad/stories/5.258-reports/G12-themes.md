---
title: "G12 temi: report esecuzione prompt 5.258"
type: report
story: "5.258"
---

# G12 temi

## Inventario

- Four: repo git `laraxot/theme_four_fila5`, branch `dev`, 44 file. Tema Q&A Bootstrap 4 (questions, answers, auth, home, layouts, shared, vendor/pagination), Laravel Mix (`webpack.mix.js`, `package.json` con Vue 2/Bootstrap 4), `dist/` versionato (1,7 MB), `theme.json` type `pub`. Nessuna classe PHP, nessun test, nessuna docs/ (creata).
- AdminLTE e BsItalia: nessun git, solo `collective/fields/group.blade.php`, identico nei due (cmp). Sono i temi realmente attivi: `config/xra.php` ha `adm_theme=AdminLTE`, `pub_theme=BsItalia`. `Four` non e' citato in config, Modules, .env.example: inutilizzato.
- `catalog.tsv` non esisteva: prompt scelti leggendo titolo e procedura.
- Ordine shuf: 24, 16-git-forward-only, 12, 42, 97, 08-ui, 17-git, 08-playwright-ui, 44, 13, 55, 21, 43.

## Esiti

| Prompt | Tema | Esito | Evidenza |
|---|---|---|---|
| 24-boy-scout | Four | PASS | corretti solo docs e workspace (vedi sotto) |
| 16-git-forward-only / 17-git | Four | PASS | merge normale con laraxot/dev (57436f6), commit acaa52a, push ok, `status -sb` allineato; nessun reset/checkout |
| 16-git-forward-only / 17-git | AdminLTE, BsItalia | N-A | senza git, niente remote |
| 12-documentation / 44-module-docs-continuous | Four | FAIL poi PASS | mancava docs/; creato `docs/README.md` |
| 12 / 44 | AdminLTE, BsItalia | FAIL non corretto | nessuna docs/; non creata: fuori dal mandato (solo Four lo e') e tema senza owner git; vedi nota |
| 42-delete-obsolete-files | tutti | N-A | nessuna cancellazione autorizzata; nessun file obsoleto provato |
| 97-yaml-frontmatter / 55-md-conventions | Four | PASS | README.md nuovo con frontmatter valido; unico altro .md e' `README.md` |
| 13-path-and-naming (igiene root) | Four | FAIL poi PASS | audit: workspace mancante, poi nome `_theme_four_fila5.code-workspace` accettato; nessuna cartella maiuscola |
| 13 | AdminLTE, BsItalia | FAIL, BLOCKED | audit: nessun .code-workspace; senza remote il nome non e' derivabile |
| 43-php-files-structure | tutti | N-A | `find -name '*.php' ! -name '*.blade.php'` vuoto; `php -l` non applicabile |
| array una chiave per riga | tutti | PASS | rg su array multi-chiave in blade: 0 match |
| 21-translations | Four | FAIL non corretto | 9 viste con testo inglese hard-coded (es. questions/index "All Questions"); nessun lang/ nel tema, tema inutilizzato: tradurre = inventare chiavi |
| 21 | AdminLTE, BsItalia | PASS | il solo file non ha testo visibile |
| 08-ui / 08-playwright-ui | tutti | BLOCKED-ENV | `php artisan --version` fallisce (`filament-jet.php line 118`, ArtMin96\FilamentJet); app non avviabile; Four non attivo |
| compilazione blade | tutti | BLOCKED-ENV | stesso errore artisan |
| phpstan / pest | tutti | N-A | nessuna classe ne' test |

Difetti rilevati non corretti: `Four/screenshot.jpg` e' un PNG (header `89 50 4E 47`); `dist/` versionato e `.gitignore` con `*.lock` e `package-lock.json`; `Four/layouts/app.blade.php` usa `Theme::asset('pub_theme::...')` (funziona solo se Four e' pub_theme).

## Correzioni

- Four, commit `acaa52a` (pushato su laraxot/dev): `docs/README.md` (scopo, chi lo usa, stato) e `_theme_four_fila5.code-workspace`. Dopo: audit workspace su Four pulito.
- AdminLTE e BsItalia: nessuna modifica.

## Difetti dei prompt

- Tutti (applicabili ai temi): nessuna classe "tema" nel perimetro; la maggior parte dei gate (phpstan, pest, php -l) e' N-A. Proposta: sezione fissa "Se il perimetro e' un tema senza classi: gate = php -l sui .php non blade, compilazione blade, audit root".
- 08-ui e 08-playwright-ui: due prompt per lo stesso scopo con slug quasi uguali (`08-ui-playwright`); 08-playwright-ui e' 288 righe. Nessuna istruzione per ambiente non avviabile. Proposta: "se l'app non si avvia riporta BLOCKED-ENV con l'errore e non insistere".
- 12-documentation: il vincolo "non registrare diario operativo" contrasta con 44 ("registra esempi e comandi reali", "riporta file modificati"). Proposta: in 44 precisare che il report finale va nel messaggio, non in docs.
- 44-module-docs-continuous: cita `docs/chat`, GitHub Issues/Discussions, "esegui l'ingest", "aggiorna il Second Brain" senza comando; nei temi senza docs/ non dice di crearla ne' dove. Il blocco "Regole obbligatorie" ripete le regole dei prompt 16/17/42/43. Proposta: indicare `bash bashscripts/docs/llm-wiki-qmd.sh update` e "se il tema non ha docs/, crea docs/README.md".
- 17-git: dice "non fare commit salvo richiesta esplicita", in conflitto con la standing order di commit+push (16-git-forward-only) e con le campagne swarm. Proposta: dichiarare quale prevale per i task di swarm.
- 16-git / 17-git / 16-git-forward-only: tre file per lo stesso tema; `16-git.md` e' una concatenazione (`# FROM:` ripete l'intero 16-git-forward-only con frontmatter interno). Proposta: tenere un solo file per numero.
- 43-php-files-structure: `find laravel/Modules laravel/Themes ... php -l` ignora i `.blade.php` e non spiega come trattarli; "PHPStan sul perimetro" non applicabile ai temi. Proposta: escludere `*.blade.php` e indicare cosa fare quando l'output e' vuoto.
- 13-path-and-naming-rules: 356 righe, intestazione "Fixcity Fila5" (progetto sbagliato per questo repo). Non specifica la regola del nome `.code-workspace` (prefisso `_` richiesto dall'audit, mentre la docstring dell'audit dice "nome derivato per intero dal remote"): ambiguita' tra `theme_four_fila5.code-workspace` e `_theme_four_fila5.code-workspace`. Proposta: citare `bash bashscripts/tools/audit-module-workspaces.sh <Nome>` come gate unico e correggere il commento dell'audit.
- audit-module-workspaces.sh: i temi senza git (AdminLTE, BsItalia) danno "nessun .code-workspace" senza dire che il nome non e' derivabile. Proposta: classificarli "NO-GIT" invece di errore, o dichiarare quale remote usare.
- 21-translations: due versioni nello stesso file (v1.0 breve + v2.0 "chiave a cinque elementi", frontmatter ripetuto); menziona LangServiceProvider senza path. Per i temi senza `lang/` non dice se tradurre le viste di un tema inutilizzato. Proposta: regola "tema non attivo: segnala, non tradurre".
- 42-delete-obsolete-files: richiede autorizzazione esplicita, quindi mai eseguibile in una campagna di audit; manca un esito "N-A senza autorizzazione".
- 55-md-conventions: "Usa `issues` e `discussions` come liste quando presenti" e' incomprensibile; "nomi stabili senza suffissi numerici" confligge con le story `5.258-...`. Proposta: riscrivere o rimuovere la frase.
- 97-YAML-FRONTMATTER-CONVENTION: richiede `title, role, scope, execution, destructive_operations_allowed, completion_criteria`, ma 08-ui, 12, 17, 19-docs, 43, 21 usano `id/slug/execution_mode/...` senza `completion_criteria`. Il prompt stesso non e' rispettato dai fratelli. Proposta: scegliere uno schema e aggiungere un validatore.
- 24-boy-scout: scope "assigned-files" non spiega cosa fare quando il perimetro e' un intero tema; nessun criterio per "miglioramento minimo" (nel run: doc e workspace mancanti).

## Verifica del coordinatore (2026-10-01 00:40)

- Four: `acaa52a` presente su `laraxot/dev` (`rev-list` 0/0), working tree pulito, audit workspace
  non segnala più Four.
- Incoerenza di configurazione, non corretta (decisione di prodotto, `laravel/config` è della
  sessione coordinatrice): `laravel/config/xra.php` imposta `adm_theme => 'AdminLTE'` e
  `pub_theme => 'BsItalia'`, ma quei due temi sono stub nel repo root con un solo file
  (`collective/fields/group.blade.php`). L'unico tema con repository in `gitmodules.ini` è Four
  (`laraxot/theme_four_fila5`), che nessuna config usa. O mancano i repository dei temi attivi
  in `gitmodules.ini`, o la config punta ai temi sbagliati.
- Audit workspace: AdminLTE e BsItalia restano segnalati. La regola "nome dal remote git" non è
  applicabile a una cartella senza `.git`: difetto della regola (prompt 13 e
  `audit-module-workspaces.sh`), da chiarire nel prompt.
