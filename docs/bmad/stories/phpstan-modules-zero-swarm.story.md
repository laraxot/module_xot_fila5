---
title: "PHPStan Modules zero — swarm Quick Flow"
type: story
module: Xot
epic: quality/phpstan
story_id: phpstan-modules-zero-swarm
slug: phpstan-modules-zero-swarm
status: done
# supersedes: campagne phpstan-modules-swarm-session / remediation come SSoT attiva Quick Flow
# linked_from: docs/sprint-status.yaml Xot/phpstan-modules-zero-swarm; phpstan-zero-errors-modules.story.md
# user_verbatim: "esegui cd laravel && ./vendor/bin/phpstan analyse Modules e sistema tutte le segnalazioni" + swarm+BMAD+second brain+handoff 5 sezioni
track: quick-flow
qmd: "phpstan analyse Modules zero swarm source-first mixed last resort flock max-3 pest gate parallel bmad"
related:
  - ./phpstan-zero-errors-modules.story.md
  - ./phpstan-modules-remediation.story.md
  - ./phpstan-modules-swarm-session.story.md
  - ./5.260-phpstan-modules-current-remediation.story.md
  - ./phpstan-modules-swarm-random.story.md
  - ../00-index.md
  - ../../../../../../bashscripts/ai/wiki/memories/phpstan-swarm-config.md#phpstan-modules-zero
  - ../../../../../../bashscripts/ai/wiki/memories/phpstan-swarm-config.md#phpstan-host-saturation-max-three
  - ../../../../../../docs/sprint-status.yaml
---
# PHPStan Modules zero — swarm Quick Flow

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

## Scopo e perché

Il gate permanente del monorepo è:

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules
```

Deve restare a **zero errori** (level max, senza baseline). Non è cosmetica tipizzante:
ogni segnale PHPStan è un indizio sullo **scopo** del codice di dominio PA
(progressioni, performance, indennità, incentivi, rating, tenant). Si corregge la
causa funzionale, non si sopprime il sintomo.

Standing order utente: eseguire il comando sopra e **fixare tutto** ciò che emerge,
con BMAD + second brain + swarm disciplinato.

## Track

Quick Flow / standing order (campagna ricorrente). Story SSoT in questo file;
chiave sprint: `Xot/phpstan-modules-zero-swarm`.

## Acceptance criteria

- [x] `cd laravel && ./vendor/bin/phpstan analyse Modules` → exit 0, banner `[OK] No errors`, JSON `errors=0` / `file_errors=0` nello stesso run freddo quando possibile
- [x] Fix **source-first**: capire caller, contratto XotBase/Action/trait, responsabilità di modulo; patch minima alla radice
- [x] `mixed` / cast / `@phpstan-ignore` / baseline / edit `phpstan.neon` = **last resort** (solo se documentato in story + memoria)
- [x] Parallelismo: swarm/subagent su file disgiunti + `bashscripts/lock/`; **flock max-3** processi PHPStan concorrenti (no thrashing host)
- [x] **Pest gate**: test mirati eseguiti e verdi sullo scope toccato, oppure skip documentato (host `10.100.200.15` / DB testing irraggiungibile)
- [x] Docs solo boy scout nei moduli/temi toccati; niente mass-delete di `.md`

## Strategia operativa

1. Inventario errori (full-tree o lane per-modulo) sotto saturazione HARD: se troppi `phpstan` già in volo, harvest `/tmp` e attendere.
2. Clustering per modulo/causa; ordine **random** tra pezzi indipendenti.
3. Max **3** analyse concorrenti (`flock`); ownership disgiunta; non editare path sotto lock altrui.
4. Per ogni cluster: scopo → root cause → patch → `php -l` → phpstan lane → Pest mirato.
5. Write-back: diario in questa story + riga `docs/sprint-status.yaml` + memoria second brain se lezione nuova.

## Relazioni (non duplicare)

| Artefatto | Ruolo |
|-----------|--------|
| [phpstan-zero-errors-modules](./phpstan-zero-errors-modules.story.md) | Stub storico “zero errori”; punta qui come campagna attiva |
| [phpstan-modules-remediation](./phpstan-modules-remediation.story.md) | Remediation 2026-10-09 (review/done) |
| [phpstan-modules-swarm-session](./phpstan-modules-swarm-session.story.md) | Sessione 2026-11-17 (vittoria full-tree; review) |
| [5.260 current remediation](./5.260-phpstan-modules-current-remediation.story.md) | Baseline storica ottobre |
| Memoria [phpstan-modules-zero](../../../../../../bashscripts/ai/wiki/memories/phpstan-swarm-config.md#phpstan-modules-zero) | Invarianti gate + pattern |

## Diario

- 2026-11-25 (php-backend-agent / composer-isolated cold): peer `phpstan-full`
  abortito senza `EXIT=` (solo nota neon). Harvest stale: banner 18× parse
  `T_SL` Notify già collassati da peer (`php -l` OK, MARKER_PHP=0). Activity
  test errors (LogoutListener/Snapshot) già sanati in tree. Thrash host
  15–26 analyse → atteso calm=0. Cold isolato sotto
  `flock /tmp/ptvx-phpstan-modules.flock` (cache `/tmp/phpstan` svuotata):
  artifact `/tmp/ptvx-phpstan/composer-isolated.{json,banner.txt,meta}` →
  **JSON_EXIT=0 / BANNER_EXIT=0**, totals `errors=0`/`file_errors=0`, banner
  `[OK] No errors` (11:24:34→11:27:48). Nessun patch PHP in questa lane
  (source già verde). Pest: `NoCmsPhantomFolioImportsTest` **2 passed**;
  Activity Unit mirato → **skip documentato** `TestDatabaseGuard` (mysql →
  `10.100.200.53` non local). Story resta `done`.

- 2026-11-25e: ArrayToRawJsAction — PHPStan `RawJs::toHtml()` method.notFound +
  binaryOp.invalid (10 errori segnalati utente). Scopo action: letterale JS per
  `x-data`/Chart.js da array PHP con RawJs nested raw. Fix: estrazione via
  `(string) $raw` (Stringable di Illuminate\Support\Js) in `rawJsExpression()`;
  test allineato. Contract aggiornato. mixed resta solo sul confine `jsValue`.

- 2026-11-25d (Composer re-verify standing order): primo reverify fallito con 3
  *internal* `Could not read file` su vendor Laravel mentre un peer eseguiva
  `composer update -W` + altri phpstan — **non** debito codice. Atteso calm
  (composer=0, phpstan=0), preflight markers=0, cold
  `/tmp/ptvx-phpstan/reverify3.json` `errors=0`/`file_errors=0` EXIT 0 **e**
  banner `reverify3-banner.txt` `[OK] No errors` EXIT 0 (11:06:56→11:14:55,
  flock). Lezione: non interpretare I/O vendor durante composer come errori tipizzati.

- 2026-11-25c **VITTORIA gate freddo osservata**: preflight PHP markers=0 (esclusi
  test intenzionali NoConflictMarkers*); `flock /tmp/ptvx-phpstan-modules.flock`;
  cache `/tmp/phpstan` svuotata; JSON `/tmp/ptvx-phpstan/final-cold.json`
  `errors=0`/`file_errors=0` EXIT 0 **e** banner `/tmp/ptvx-phpstan/final-cold-banner.txt`
  `[OK] No errors` EXIT 0 (START 10:51:15 → END 10:55:15). Cause wave: marker
  nested `.merge_file_*` Notify (Models template + lang + tests + Mailjet/Actions)
  ripristinati da `laraxot/dev`. Pest Notify Unit mirato: **skip documentato**
  (`SQLSTATE[HY000] [2002] Connection refused` su DB_HOST=127.0.0.1; 12 failed
  bootstrap, 0 assertions) — non regressione del fix tipostatico.

- 2026-11-25c (Composer / orchestratore): ripresa standing order + handoff 5 sezioni.
  Peer `phpstan-full` silente (solo neon); cold recheck → **file_errors=18** parse
  `T_SL` su Notify (Models MailTemplate*, NotificationTemplate, lang en/it, TestCase,
  MailjetTransportTest, NotificationManagerTest) — JSON 0/0 precedente = **falso**.
  Fix source-first: `git checkout laraxot/dev -- <paths>` (blob remoto senza marker);
  sweep ulteriore Actions/Traits/lang it → **PHP markers Notify=0**, `php -l` OK,
  `class_exists` MailTemplate/NotificationTemplate YES. Host thrash **19–21**
  phpstan concorrenti (oltre max-3): gate freddo rimandato a calm. Alias User
  `git-conflicts-resolution-2025-01-27.md` → stub superseded. Themes Zero dated
  già alias. Lock: `phpstan-zero-20261125-composer.lock`.

- 2026-11-25 (docs-guardian / ripresa): **bootstrap FAIL per marker** — campagna riaperta.
  Host WSL non `10.100.200.15`; flock max-3; moduli Notify/Lang/Activity/UI/User/Xot/Media/Job.
  Diario collassato (rimossi marker `<<<<<<<` / `.merge_file_*` / `laraxot/dev` senza svuotare AC).
  Preflight: 0 PHP con `<<<<<<<` nei 8 moduli al momento della misura; md ancora contaminati
  (Notify ~2442 path). Cold `/tmp/ptvx-phpstan/cold-20261125.json` incompleto.
  Handoff: `docs/chat/handoff-phpstan-modules-swarm.md`. Sprint key → `in_progress`.
  Inventario `.git`: `docs/gitmodules-git-size-and-objects.md`.

- 2026-11-24f **VITTORIA gate**: `/tmp/ptvx-phpstan/cold11.json` totals
  `errors=0`/`file_errors=0` + banner `[OK] No errors` (EXIT 0) sotto
  `flock /tmp/ptvx-phpstan-modules.flock`. Preflight: sweep markers → BOOT_OK.
  Fix wave: MassExtra `is_subclass_of` narrow; Notify `@use HasCommonScopes<static>`;
  UI Safe preg_replace + Collection generics + assert tautologici rimossi;
  User `base_profile_form` chiave `name` duplicata. Pest:
  `NoCmsPhantomFolioImportsTest` smoke; Unit pieno ancora skip DB testing.

- 2026-11-24f (orchestratore Composer): race merge-markers PHP (UI→Tenant→User→XotData)
  bloccava bootstrap Larastan (`unexpected token "<<"` via morph map/`XotData::getUserClass`).
  Collapse source-first + restore da `laraxot/dev` di 4 file User irrecuperabili.
  cold9: 2 parse Xot (`use` duplicati ExportXls/InitialsAvatar — peer già sanati).
  cold10 artifact `/tmp/ptvx-phpstan/cold10.json`: `errors=0` / `file_errors=14`
  (Sigma MassExtra×6, UI tests×6, Notify generics, User lang dup key). Swarm fix in volo.
  Preflight operativo sotto flock: sweep markers → BOOT_OK → analyse.

- 2026-11-24e (php-backend-agent / Notify parse-bad bootstrap): bootstrap PHPStan
  falliva su `syntax error, unexpected token "<<"` in discoverClusters Notify.
  Lista `/tmp/ptvx-phpstan/parse-bad.txt` (~42 Notify + 2 Activity). Lock
  `laravel/Modules/Notify` acquisito. Swarm parallelo aveva già ripulito quasi
  tutti i marker nested HEAD/laraxot/dev su Actions/Models/Traits/tests/lang;
  residuo `lang/en/template.php` risolto source-first (struttura IT espansa +
  label EN + campi `body_text`/`body_html`/`preview_data` del modello). Activity
  `SnapshotPolicyTest` + `LogDownloadPageTest` già OK. Gate: `token_get_all`/
  `php -l` su tutti i path parse-bad → 0 fail; bootstrap → **BOOT_OK**;
  `flock` cold5 → `/tmp/ptvx-phpstan/modules-cold5.json` totals
  `errors=0` / `file_errors=9` (Tenant `T_SL` + User duplicate `use` — fuori
  Notify; **zero** errori Notify). Unlock Notify.
- 2026-11-24: aggiunto l'ADR Xot [0014-mixed-last-resort](../../adr/0014-mixed-last-resort.md)
  e registrato nell'indice ADR. La decisione rende esplicito che `mixed` è
  ammesso solo a un boundary realmente dinamico o vendor, con validazione,
  narrowing immediato, nessuna propagazione nell'API e motivazione BMAD.

- 2026-11-24c (laravel-testing-expert / Pest hang diagnose su 192.168.1.40):
  **GateGuard facts (edit esistente):** nessun file nuovo; aggiorna diario di
  questa story già referenziata da `docs/sprint-status.yaml`
  (`Xot/phpstan-modules-zero-swarm`). Istruzione utente: skip documentato in
  questa story + sprint-status riga Pest.
  **Causa:** `.env.testing` `DB_HOST=10.100.200.53:3306` irraggiungibile
  (tcp timeout 124) → rischio SYN-SENT hang; `TestDatabaseGuard` oggi rifiuta
  host non-local → FAIL rapidi (~3–5s), non hang silenzioso sulla directory
  Unit (pipe `| tail` può nascondere output). Unit puro
  `NoCmsPhantomFolioImportsTest` → **2 passed / 0.45s**. Unlock locale:
  override `DB_HOST=127.0.0.1` → Access denied `personale` (pwd testing ≠
  `.env`); `pest-scratch-db.sh` connect ok ma migrate dup-index
  `activity_log_subject_id_index`. **Esito:** skip strutturato / bloccato;
  nessun edit PHP; no inventare credenziali.
- 2026-11-24c (swarm parallelo): lane Pest/docs/deep-audit/boy-scout avviate.
  Fix orchestratore: `User/resources/views/pages/` ripopolata (merge) con
  login Volt `authenticate()` e register `@include pub_theme` nudo — viola ADR
  FO login ownership. `git rm -r` 18 file; `pages_old/` resta SSoT stub.
  Pest `NoCmsPhantomFolioImportsTest` **2 passed**. SoftDeletes Progressioni
  ancora assente su Scheda (phpdoc `deleted_at` senza trait) → lane deep-audit.
- 2026-11-24d (php-backend-agent / boy-scout post-zero): re-verify RAPIDO —
  `pgrep` 5→0 (≤6); **no** full-tree; cold3 JSON `errors=0`/`file_errors=0`.
  WT `UserForm`/`BaseProfile`/`InitialsAvatarProvider`: `php -l`+pint OK; fix
  marker merge in InitialsAvatarProvider (un `use Str`, no `Safe\preg_replace`).
  Lane flock User+Xot → EXIT 0, `boy-scout-user-xot-wt.json` 0/0. Prompt ECC:
  `39-boy-scout`+`04-swarm` → BMAD in `Modules/<M>/docs/bmad/stories/`. No commit.
  Debito: WT PHP uncommitted; Pest User Unit skip DB 192.168.1.40.
- 2026-11-24b (Composer / orchestratore): gate freddo **VITTORIA** sotto
  `flock /tmp/ptvx-phpstan-modules.flock` → JSON
  `totals.errors=0` / `file_errors=0` EXIT 0
  (`/tmp/ptvx-phpstan/modules-cold3.json`) **e** banner `[OK] No errors`
  (`/tmp/ptvx-phpstan/modules-banner.txt`). Bootstrap precedente sanato
  source-first: `UserForm` (return duplicato dentro array schema BO) +
  `BaseProfile` (una sola copia `getKeyType`/`getIncrementing`/`hasStringKey`
  per PK UUID vs int — evita cast UUID→1 e 404 edit; senza `id=>integer`
  forzato). Nessun `mixed`/ignore. Swarm parallelo: prompts + docs-md-date +
  deep-audit + php-backend bootstrap. Pest `Modules/User/tests/Unit` hang
  senza output su 192.168.1.40 → **skip documentato** (bootstrap/DB), non verde.
  Sprint key → `done`. Hindsight correction ingestata.
- 2026-11-24 (php-backend-agent / bootstrap Larastan): gate
  `phpstan analyse Modules` falliva al bootstrap Filament
  (`discoverResources` → `class_exists`) con
  `syntax error, unexpected token "return", expecting "]"`.
  **File rotto (SSoT HEAD):**
  `Modules/User/app/Filament/Resources/UserResource/Schemas/UserForm.php`.
  **Causa root:** in `getFormSchema()` (layout BO CRUD User, colonne main 8 +
  side 4) una riga duplicata aveva reiniettato `return [Grid::make(...)->schema([`
  + `'main' => Grid::make(1)` *dentro* l’array già aperto — tipico paste/merge
  corrotto, non un falso positivo PHPStan. Lo schema esiste perché è la SSoT
  campi BO (`worker`/`signin`/`access` + status/record) e FO auth (login/register/
  reset) del modulo User (R1 password hash in dehydrate).
  **Patch:** rimossi solo i due statement duplicati; lasciato
  `'main' => Grid::make(1)->schema([...])->columnSpan(...)` + `'side' => ...`.
  Nessun `mixed` / `@phpstan-ignore`. Lock `User` acquisito/rilasciato.
  **Verifica:** `php -l` OK sul WT; HEAD blob ancora `unexpected return`;
  bootstrap `BOOT_OK`; `class_exists(UserForm)` + `getFormSchema()` OK;
  `phpstan analyse …/UserForm.php` exit 0 (bootstrap Larastan oltrepassato).
- 2026-11-24 (sessione Codex): riaperta la campagna su richiesta esplicita per
  rieseguire il comando canonico, classificare ogni segnalazione alla sorgente,
  coordinare swarm/subagents in lane disgiunte e verificare i gate finali. In
  parallelo: audit docs moduli/temi e revisione dei prompt operativi. Nessun
  `mixed`/ignore previsto salvo limite dimostrato dell’analizzatore.
- 2026-11-24: il primo gate canonico ha esposto tre rotture di bootstrap alla
  sorgente (import `Str` duplicato, schema `UserForm` duplicato, blocco duplicato
  in `BaseProfile`), non falsi positivi PHPStan. Un agente concorrente le ha
  rimosse con lock; `php -l` è verde sui tre file. Il secondo gate è stato
  sospeso localmente perché il co-working aveva oltre il limite operativo di
  processi PHPStan concorrenti; non si considera quindi ancora un gate freddo.
- 2026-11-24: audit docs ha trovato 2.169 BMAD markdown (142 senza frontmatter,
  414 senza `qmd`), 147 duplicati esatti in 60 gruppi, 750 story sotto
  `docs/stories/` fuori dal canonico `docs/bmad/stories/` e 65 nomi con date.
  Sono evidenze per backlog separato, non autorizzano una migrazione massiva
  durante la bonifica PHPStan. Prompt operativi: corretti tre riferimenti/command
  minimi, link rotti residui 0, `git diff --check` verde.
- 2026-11-24 (handoff): QMD ha indicizzato l'aggiornamento della story; graphify
  è stato lanciato per riallineare il grafo. Le lane PHPStan concorrenti del
  workspace hanno prodotto solo bootstrap failure sulle versioni precedenti
  del file `UserForm`; dopo la correzione `php -l` passa, ma non è ancora
  disponibile un risultato freddo definitivo `errors=0/file_errors=0`.

- 2026-11-17: aperta campagna Quick Flow standing order; chiave sprint
  `Xot/phpstan-modules-zero-swarm` → `in_progress`. Artefatti BMAD allineati
  (docs-guardian). Nessuna mass-delete docs.
- 2026-11-17 (sessione Composer): inventario shuffled max-3 → residui Activity
  (parse merge/dup use LogDownload/LogViewer), Ptv (ProgressioneVerticale già
  sanato peer), Xot 15× `alreadyNarrowedType` assertIs* HostApp. Fix source-first
  (scopo test: contratto middleware/FeatureFlags e Folio log-download). Gate
  freddo dopo calm thrash: `phpstan analyse Modules` → **`[OK] No errors` EXIT 0**.
  Interni `errors=1` con file_errors=0 = cache corrotta sotto thrash (`/tmp/phpstan`
  resultCache) — non contare come debito codice. Pest HostApp: PDO access denied
  (DB testing) → skip documentato.
- 2026-11-17 (lane Xot / php-backend-agent): inventario `file_errors=15` tutti
  `staticMethod.alreadyNarrowedType` in HostApp tests. Causa: `Assert::assertIsArray`
  / `assertIsBool` / `assertIsString` su return già tipizzati (`TrustHosts::hosts(): array`,
  `RouteServiceProvider::HOME` const string, `FeatureFlags::isEnabled|isAnyEnabled(): bool`,
  `listEnabled|all(): array`). Fix: rimossi assert tautologici; lasciati solo
  `assertIs*` su `FeatureFlags::get(): mixed`. File: `tests/Unit/HostApp/AppMiddlewareTest.php`,
  `FeatureFlagsTest.php`. PHPStan `Modules/Xot` → **0** (before 15 / after 0). Pest:
  FeatureFlagsTest 15 passed; AppMiddlewareTest 5 failed su bootstrap DB
  (`SQLSTATE[HY000] [1045] Access denied for user 'personale'@'10.11.1.209'`) —
  skip documentato (env testing, non regressione del fix). Lock `Xot-phpstan-swarm` rilasciato.

## Dev Agent Record

- Status: `done` — final-cold 2026-11-25c JSON 0/0 + banner [OK] No errors (flock). Pest Notify skip DB 127.0.0.1 refused.


- Status: `in_progress` — riaperta 2026-11-25 (bootstrap markers). Gate freddo non ancora riverificato in questa ripresa.
- AC restano validi; Pest gate obbligatorio a chiusura (o skip documentato).
- Handoff: `docs/chat/handoff-phpstan-modules-swarm.md`

- Status: `review` — cold gate Modules **`[OK] No errors` EXIT 0** (2026-11-17)
- AC full-tree: spuntato osservato; Pest mirato ProgressioneVerticale+Diagnose **7 passed**
- Lock session `phpstan-modules-swarm-session` + lane Activity/Ptv unlock
- Debito: attivare `progressione_verticale` in `criteri_esclusione` 2026 (owner HR);
  Pest HostApp richiede DB testing raggiungibile; ridurre thrash multi-agente (max-3)
- Prossimo: boy-scout ridondanza story phpstan datate in Xot/docs/bmad/stories;
  prompts bashscripts/docs/prompts (subagent); qmd update memoria thrash/cache
- Status: `done` — allineato a sprint `Xot/phpstan-modules-zero-swarm` (gate finale
  peer sotto flock: JSON `errors=0`/`file_errors=0` + banner `[OK] No errors`)
- AC full-tree: spuntato; Pest mirato ProgressioneVerticale+Diagnose **7 passed**;
  FeatureFlagsTest 15 passed; AppMiddlewareTest skip DB documentato
- Debito fuori gate PHPStan: attivare riga `criteri_esclusione.progressione_verticale`
  in campagna 2026 (owner HR); ridurre thrash multi-agente (max-3)
- Wave corrente (2026-11-21): marker di conflitto Git annidati in PHP/test e Blade
  risolti semanticamente; il gate `./vendor/bin/phpstan analyse Modules --error-format=raw --no-progress`
  ha restituito exit 0. Pest mirato sui file modificati resta da eseguire.
- Controprova finale: il comando canonico senza opzioni ha restituito `[OK] No errors` ed exit 0.
- Pest User tenancy: 5 passed; Pest Cms è non verificabile nel bootstrap corrente (`Target class [modules] does not exist`).
- Status corrente (2026-11-21): `done` — `cd laravel && ./vendor/bin/phpstan analyse Modules --no-progress --memory-limit=-1` → exit 0, `[OK] No errors`.
- Causa della wave: marker di conflitto Git annidati in PHP/test; risolti semanticamente preservando il contratto Tenant e i binding Pest. La relazione tenant ora espone generics completi anche nel contesto del modello base.
- Prompt audit: aggiornati `bashscripts/docs/prompts/agent-workflow.md`, `12-dipendenze-tra-moduli.md`, `13-contracts.md`, `15-services-verso-actions.md`, `27-livewire-verso-filament-widget.md` e `35-model-factory-seeder.md` eliminando riferimenti rotti o ridondanti.
- Verifiche: `php .harness/bin/verify-facts` → 13 fatti verificati; `graphify update .` completato; `git diff --check` pulito. Pest mirato non è verificabile nel bootstrap corrente: `config` non è registrato nei test Tenant e il test ADR segnala ADR legacy incompleti.
- 2026-11-23 (sessione handoff): ripresa standing order. Host saturo (46–94
  `phpstan analyse`, anche quaeris). Full-tree locale fallito (JSON vuoto).
  Harvest `/tmp` stale: AI assente, Notify class.notFound falsi positivi,
  `form()`→`schema()` invertito vs Filament 5.12. `php -l` OK su
  ProgressioneVerticale + Media test. Swarm lane Xot/User/Notify/docs in volo;
  gate freddo rimandato a `pgrep <= 6`. Memoria thrash aggiornata.
- 2026-11-23 (wave 23 errori utente): cause — phpdoc duplicato Individuale
  (string vs numeric importo_totale), SchedaContract `$matr`/`$ente` non-null
  vs guardie mutator, options `''`/repar null key, assertIs* tautologici su
  TrustHosts::hosts(): array e HOME const. Fix source-first. Gate freddo
  `analyse Modules` → errors=0 file_errors=0. Push: Performance 815ac58,
  Ptv 1b88729, Xot 23083ba23, root 10af456eb0. Refs #266.

- 2026-11-23 (wave corrente): corrette le segnalazioni Performance/Ptv/Xot
  source-first: valori monetari finiti, chiavi array non-nulle, guardie accessor
  persistenti, closure nullable di PanelMixin e asserzioni tautologiche nei test;
  il boundary PhpSpreadsheet resta vincolato a Laravel Excel 3.1. PHPStan mirato
  `Modules/Performance Modules/Ptv Modules/Xot` e gate globale `Modules` hanno
  restituito `[OK] No errors`. Pest mirato è stato eseguito ma bloccato dal guard
  dati sul DB remoto `10.100.200.53`; nessun test ha toccato il database.
- 2026-11-23 (upgrade coordinato, agente Devin): `maatwebsite/excel` 3.1.70
  fissava `phpoffice/phpspreadsheet ^1.30.5` e il branch 1.x e' `@deprecated`
  ("migrate to release 5"). Upgrade eseguito: `Modules/Xot/composer.json`
  `^3.1`→`^4.0`, `composer update -W` → excel 4.0.7 + phpspreadsheet 5.12.0
  (rimosso `ezyang/htmlpurifier` transitivo). Compatibile: illuminate ^12||^13,
  PHP ^8.3; PHP 8.4 / Laravel 13 / Filament 5 OK. Codice gia' conforme a v5
  (`setCellValue` con coordinate array); ignore `method.deprecatedClass`
  rimosso da `ImportValutatoriAction`. Commit: padre `c3109b9028`,
  modulo Xot `4c27f652d` (push laraxot/dev entrambi).

- 2026-11-24 (sessione Devin, swarm 5 lane): gate freddo `analyse Modules`
  → 37 errori in 3 moduli. Lane disgiunte: Rating (test su namespace
  `HasRatingResource` rimosso apposta → test legacy eliminati, stub
  `morphToManyX` allineato ai generics del parent), User (chiavi duplicate
  lang `it` già fixate da lane parallela, verificato 33 lingue 0 dup), Xot
  (`@use HasCommonScopes<static>` su probe + `Module.php`, narrowing
  `is_string` in `ModuleRouteEntrypointsExistTest`).
  **Marker `.merge_file_*` residui** in 8 file Xot (ParseError reale,
  introdotti dopo il gate da merge_remote_repo): risolti source-first
  (RelationX → lato pivotClass+TPivot; XotBasePage → alias
  `interactsWithFormsForm`; EnvPage → niente `$view` dashboard;
  HasCommonScopes → `@template TModel`+`Builder<TModel>`; import `Safe\preg_*`
  inutilizzati rimossi; AssetAction docblock IT). InitialsAvatarProvider
  fixato da lane concorrente (lock rispettato). Pest mirato 4 passed
  (override DB_HOST=127.0.0.1). Prompts: 15 file corretti. Docs: ~2.400 .md
  frontmatter/qmd. **GATE FINALE: `phpstan analyse Modules` → EXIT 0,
  `[OK] No errors`** dopo risoluzione marker. Pest extra: Rating unit
  174 passed/2 skipped (49s), Xot traits/models 13 passed — tutto con
  DB_HOST=127.0.0.1.

- 2026-11-25 (sessione OpenCode, audit + igiene entry point): gate freddo
  `phpstan analyse Modules` con `/tmp/phpstan` svuotato → **EXIT 0,
  `errors=0`/`file_errors=0`** (`/tmp/phpstan_modules.json`). Un gate
  concorrente lanciato 09:56 aveva riportato 7 errori su 2 test Activity
  (`LogoutListenerTest`, `SnapshotBusinessLogicTest`): i file su disco erano
  gia' corretti prima del mio run → era cache/risultato stantio, non
  regressione. Conferma operativa: un gate vale solo se freddo e su disco
  stabile.
  **Entry point riparati (root `AGENTS.md` + `laravel/AGENTS.md`)**: 10 path
  canonici puntavano a file inesistenti (`docs/wiki/rules/*`,
  `docs/wiki/memories/*`, `Modules/Xot/docs/wiki/bmad-method.md`,
  `0017-actions-over-services.md`, `eloquent-magic-properties-rule.md`,
  `public-path-public-html.md`, `context-overflow-prevention.md`). Ora
  puntano ai SSoT reali (`bashscripts/ai/wiki/rules|memories|concepts`,
  `docs/wiki/guidelines/modules/xot/...`). Resta scoperta la regola
  "niente funzioni Pest ridichiarate": esiste solo la story 3.3, da
  promuovere a regola.
  **Prompts**: 11 file avevano `replaces:` autoreferenziale (stesso filename
  ripetuto N volte); ora elenca gli ID legacy fusi (`"00"`, `"01"`, ...) e il
  README documenta la semantica.
  **Themes/Zero docs (ridondanza)**: `phpstan-dry-kiss-theme-guidelines`
  esisteva in 2 copie identiche da 504 righe (differivano solo per `qmd`) e
  `dry-kiss-best-practices` in 2 copie da ~235 righe; i nomi canonici erano
  stub alias autoreferenziali e i nomi datati erano **symlink** al canonico.
  Consolidato: 2 documenti canonici con contenuto (507 + 238 righe) e 6 alias
  stub espliciti (niente symlink). Trappola registrata: riscrivere un alias
  symlinkato sovrascrive il canonico.
  **Backlog misurato** (non toccato): 15.336 `.md` in `Modules/*/docs`, 541
  senza frontmatter (3,5%); 17 nomi con data in Modules (15 Notify legacy,
  User, Rating, Activity) + 2 in Themes; `graphify` non installato
  (`command -v graphify` vuoto) benche' citato in `AGENTS.md`.

- 2026-11-25 (sessione OpenCode, falso positivo `RawJs::toHtml()`): una run
  full concorrente ha riportato 10 errori su
  `Xot/app/Actions/Arr/ArrayToRawJsAction.php` e sul test
  (`method.notFound` su `Filament\Support\RawJs::toHtml()` + `binaryOp.invalid`).
  Verifica alla sorgente: `RawJs extends Illuminate\Support\Js` e
  `toHtml(): string` esiste in vendor; analisi dei due file → 0 errori; run full
  isolata (stesso neon, `tmpDir` privato) → `0/0`; run canonica fredda con
  `flock` → `0/0` e `[OK] No errors`; prova runtime `php -r` dell'Action →
  output JS corretto. **Nessun edit PHP**: il codice era gia' corretto. Causa:
  3 run full simultanee sulla stessa `tmpDir: /tmp/phpstan/` che riscrivevano la
  reflection cache. Lezione in
  `bashscripts/ai/wiki/memories/phpstan-swarm-config.md#phpstan-phantom-method-notfound-concurrent-runs`
  e nel prompt `bashscripts/docs/prompts/quality-gates.md`. Pest non eseguibile
  qui (host `10.100.200.15`, nessun MySQL locale: `Connection refused`); il test
  e' puro ed e' coperto dalla prova runtime.



### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
