---
title: PHPStan Modules, regressione da test riespansi dopo il pull
type: story
module: Xot
phase: implementazione, quality gate
status: in-progress
created: 2026-10-20
updated: 2026-10-20
related:
  - phpstan-l10-comprehensive-resolution.story.md
---

# PHPStan Modules: regressione da test riespansi dopo il pull

Coordinamento del run. Le story di lane stanno nel `docs/stories/` di ogni modulo owner e puntano qui con `related:`. Run precedente chiuso a 0 errori: vedi `bmad-output/phpstan-modules-run-2026-10-08.md` (documento storico, resta dov'e').

## Misura

- `cd laravel && ./vendor/bin/phpstan analyse Modules` (2026-10-20 08:59-09:00 UTC, config root immutata): **10053 errori in 435 file**, exit 1, nessun errore generale. Durata 1m30 a cache calda.
- Produzione: 269 errori. Test: 9784 errori. Per modulo: User 2812, Notify 2350, Tenant 764, Cms 742, UI 720, Activity 605, Xot 603, Geo 483, Media 282, Gdpr 240, Lang 229, Job 190, AI 33.
- L'8 ottobre lo stesso comando chiudeva a 0 errori con la stessa `phpstan.neon` (ultima modifica 2026-09-04).

## Causa del salto (verificata su Notify)

- 393 file di test sotto `Modules/*/tests` hanno mtime 2026-10-20 08:57, subito dopo il commit root `c6079ca7e` ("pull submoduli e fix post-pull").
- Nel repo del modulo Notify, HEAD (merge 2026-10-13) ha per quei file degli stub `->skip('<Model> not implemented')` (commit `f49605a37`, 2026-09-24). Il working tree contiene invece i corpi completi, identici ai blob del commit `ad98ccbad` (2026-10-18, non antenato di HEAD).
- Quei test non sono tipizzati rispetto al codice: `Notify/app/Models/Theme.php` ha `$fillable` e `casts()` ma niente `@property` ne' `HasFactory`; i `TestCase` di modulo non hanno gli helper chiamati (`mockAppService`, `notifyArrayGet`, `mockService`...); alcuni SUT non esistono (`Gdpr\Models\GdprConsent`, `UI\Models\Component`, `IndennitaResponsabilita`...).
- Quindi 9784 errori non sono 9784 problemi: sono poche cause alla sorgente. Dati: `scratchpad/baseline-2026-10-20T0900.json`.

## Cause alla sorgente (conteggi baseline)

| Causa | Errori | Correzione alla sorgente |
|---|---|---|
| Modello senza `@property` / `HasFactory<Factory>`: `Cannot call method create() on mixed`, `property.nonObject`, `property.notFound`, `staticMethod.notFound ::factory()` | ~5000 | tipizzare il modello e la factory una volta |
| Helper chiamato su `Tests\TestCase` ma non definito | ~500 | definire l'helper una volta in `tests/TestCase.php` o `tests/Support` |
| `theCodingMachineSafe.function` (`json_encode`, `file_get_contents`...) | ~450 | `use function Safe\<fn>;` |
| `pest.expectation.redundant`, `pest.config.redundantLocalUse`, `ignore.unmatchedLine` | ~430 | rimuovere il superfluo |
| `Jenssegers\Agent\Agent::shouldReceive()` | 110 | `Mockery::mock(Agent::class)` |
| `Xot\Models\BaseMorphPivot` istanziata (astratta) / proprieta' mancanti | ~120 | studiare lo scopo della pivot, usare la concreta |
| Classi inesistenti (SUT fantasma) | ~230 | vedi scala delle decisioni |

## Ordine e partizioni (random, seed 20261020)

Bucket disgiunti in `scratchpad/buckets/*.txt` (colonne: errori, path). Ordine di lancio: activity, user-b, xot, user-a, media-job, tenant, geo, gdpr-lang-ai, notify-b, ui, notify-a, cms. Vista errori per radice: `python3 -I <scratchpad>/show.py <bucket> [full]`.

## Regole per ogni lane

1. Mai modificare `laravel/phpstan.neon`. Niente baseline, niente `@phpstan-ignore`, niente config alternative. Rimuovere ignore superflui e' consentito. `mixed` solo come ultima risorsa. Niente `Assert::assertTrue(true)` come segnaposto.
2. **Scopo prima dell'errore.** Per ogni causa leggi test, SUT e docs del modulo (`rg` in `Modules/<M>/docs`; qmd MCP non disponibile), scrivi in una riga cosa doveva garantire il codice, poi correggi alla sorgente, non nel call-site.
3. Pest resta Pest (`bashscripts/ai/wiki/rules/phpstan-pest-tests-stay-pest.md`): niente classi PHPUnit, niente bridge `PestFunctionBridge.php`. `$this` nelle closure lo fornisce `pestphp/pest-plugin-phpstan`.
4. Niente `*Service` nuovi: logica nuova in Spatie QueueableAction (`app/Actions/**`, `execute()`). Un Service esistente con errori si corregge sul posto; la conversione si registra in story se supera ~3 chiamanti.
5. DB di test `quaeris_data_test` non esiste e i test girano su MySQL, mai sqlite. Non creare migration, tabelle o colonne (regola progetto: chiedere prima). Verifica = PHPStan sui file toccati + `php -l`; Pest solo per test senza DB, se girano.
6. **Concorrenza** (altre sessioni agent scrivono nello stesso repo, vedi memoria `concurrent-agents-same-repo`). Gate nel codice al primo tocco di ogni file, mai a occhio: `F=<path>; bashscripts/lock/check.sh "$F" && [ $(( $(date +%s) - $(stat -c %Y "$F") )) -gt 120 ] && bashscripts/lock/lock.sh "$F" || echo SKIP`. Se SKIP, non toccare e annota. `bashscripts/lock/unlock.sh` a fine file. Rileggi il file subito prima di ogni Edit.
7. Niente commit, reset, checkout, restore, stash: i working tree dei moduli sono sporchi e di altri. Leggere la storia e' lecito (`git -C Modules/<M> show HEAD:<path>`).
8. Perimetro: file del proprio bucket. Sorgenti (non test) di qualunque modulo solo se servono alla radice, sotto gate, minimi, e elencati nel report. Mai `Modules/*/vendor`.
9. **Docs/BMAD** (regola `bashscripts/ai/wiki/rules/bmad-docs-in-module.md`, hook attivi): una story nel `docs/stories/` del modulo owner, gia' esistente, chiamata `phpstan-test-wave-<bucket>.story.md`. Mai in `bmad-output/` (bloccato). **Nomi `.md` senza date ne' suffissi numerici** (hook `md-filename-guard`): la data va nella frontmatter (`created`, `updated`). Kebab-case; non creare moduli, temi o cartelle `docs` nuove; non cancellare ne' rinumerare story esistenti: collegare o marcare superseded. Dentro: scopo capito per causa, cosa e' stato corretto, cosa e' rimasto. Correggi anche le docs del modulo rese false dal tuo fix. Niente emoji ne' em dash, italiano, header in sentence case.
10. PHPStan mirato, uno per volta per lane: `cd laravel && ./vendor/bin/phpstan analyse <file...> --memory-limit=2G --no-progress --error-format=raw`. Mai `analyse Modules` intero (lo lancia l'orchestratore).
11. Gli hook del repo possono bloccare la prima scrittura di un file con richieste di "fatti" (GateGuard): rispondi con i fatti richiesti nel testo e ritenta; non disattivarli.

## Scala delle decisioni per un file di test

1. **SUT esiste e il test e' valido**: tipizza il SUT alla sorgente. Colonne dalla migration/`$fillable`/`casts()` (mai inventate) in `@property`; `/** @use HasFactory<XFactory> */ use HasFactory;` solo se la factory esiste o la tabella c'e' in una migration; generics dei trait. Helper mancante: implementalo una volta, tipizzato, con lo scopo che il nome implica (guarda come lo usano gli altri test).
2. **Meccanico**: `Safe\` functions, ridondanze Pest, ignore superflui, Mockery tipizzato al posto di `shouldReceive` su classi non-facade.
3. **SUT assente** (classe non trovata, tabella senza migration, API non nel prodotto): il test e' una specifica fantasma. Non inventare classi, tabelle o migration. Ripristina la forma neutralizzata gia' usata dal repo: confronta `git -C Modules/<M> show HEAD:<path>`; se HEAD ha lo stub, riusalo; altrimenti intestazione che spiega + `it('<descrizione>')->skip('<X> not implemented')`. Il corpo vecchio resta in git: annota commit e path nella story.
4. **Test valido ma il comportamento reale e' diverso**: allinea il test al comportamento documentato. Se il comportamento reale e' un bug di prodotto, annotalo in story senza cambiare in silenzio il prodotto.

## Report finale di ogni lane (max 250 parole)

Bucket; errori prima/dopo sui suoi file; cause corrette con conteggi; file neutralizzati con motivo; file saltati per gate; blocchi cross-modulo; decisioni aperte per l'utente; path della story.

## Esito

Misura finale (2026-10-20, dopo la baseline di 10053 errori delle 09:00): `cd laravel && ./vendor/bin/phpstan analyse Modules --error-format=json` esce 0 con `totals` `errors` 0 e `file_errors` 0, nessun errore generale. Non e' un falso zero: 8855 file PHP nel perimetro, 251 s di CPU, circa 15000 voci di cache toccate, e lo stesso comando alle 09:00 dava 10053. Prima del run intero un giro modulo per modulo (19 moduli, ordine casuale, uno alla volta dal gate `flock` + `nice`) ha dato 18 moduli a 0 e un solo errore in Geo (`HereService` chiamava `TenantService`, rimosso dalla conversione dei Service), sparito con il ritiro di `HereService` e riconfermato a 0 su `Modules/Geo`. `laravel/phpstan.neon` non e' stato toccato dagli agenti (ultima modifica dell'utente, commit `606a380b6`, 10:28) e nessun `.neon` e' stato creato. Il run dell'utente delle 12:27 non conta: e' stato interrotto dall'OOM (vedi la nota sotto).

Lane chiuse a 0 e riverificate dal coordinatore sui file del bucket: media-job (472), xot (603), tenant (764), user-b (1406), activity (605), notify-b (1175), ui (720), notify-a (1175), geo (483), user-a (1406). Restano da ricevere i report finali delle lane cms e gdpr-lang-ai, i cui moduli risultano pero' a 0 nel giro. Finche' un'altra lane o sessione scrive su `Modules/`, la misura vale per l'istante del run: rilanciare prima di dichiarare chiuso.

Decisioni lasciate all'utente, raccolte dai report di lane:

- `laraxot/dev` riporta a ogni pull test-bozza e `Services` gia' ritirati: senza riallineare il remoto o un guard architetturale la prossima merge riapre il problema.
- Test messi in `skip` perche' il codice che provavano non esiste (corpi in git): Notify `Theme` ed `EmailTemplate` (tabelle senza migration), User `api/users`, Activity `LoginListener::handle()`.
- Bug di prodotto non toccati: `SendNotificationAction::handle()` contro `execute()` della coda; `MailTemplateVersion` usa `template_id` ma le migration creano `mail_template_id`; `ChangeProfilePasswordAction` non chiede la password corrente; `Tenant` senza cast per `settings` e `trial_ends_at`.
- `TestCase::setUp()` di User ha ancora un ripiego su SQLite, contro la regola MySQL.
- `.gitignore` di modulo con `phpstan*` (Media, UI `docs/`) ignora le story di lane: servono `git add -f` o una modifica del pattern.
- `.lock` tracciati in git nel repo Notify (4 file) e `.neon` di modulo arrivati col pull (Activity x5, User x2, Xot x3, Geo, Gdpr, Job, Cms, Setting): da togliere dal repo a cura tua.

- Lane xot: 603 -> 0 errori sui 28 file del bucket (`phpstan analyse Modules/Xot` esce 0). Causa: test e infrastruttura di test di Xot riportati dal merge come bozze anteriori al ciclo verificato; ripristinate da `6c8a5bb3f` (18 test, `TestCase`, `CreatesApplication`) e correzioni sul posto per 5 sorgenti. Dettaglio e decisioni aperte (servizi risorti, `Helpers/Helper.php` maiuscolo): [phpstan-test-wave-xot.story.md](phpstan-test-wave-xot.story.md).

## Nota OOM

- 2026-10-20 12:27 UTC: `cd laravel && ./vendor/bin/phpstan analyse Modules` dell'utente termina con `Child process was killed by signal 9 (SIGKILL)` e "Result is incomplete because of severe errors". Non e' un errore di codice e non produce un conteggio.
- Causa (dmesg/journal): il kernel ha ucciso `php8.4` (worker PHPStan, anon-rss ~535 MB) alle 12:27:28 per `global_oom`. Memoria: 91842 MiB totali, 5121 MiB disponibili, swap 8190/8191 MiB, PSI memoria some avg10=35.3 e full avg10=28.8.
- In quei minuti giravano 3 `analyse Modules` completi in parallelo di altri strumenti (codex app-server due volte, opencode una), ciascuno con 18-20 worker (~8-11 GiB per run): 85 processi phpstan, ~26 GiB RSS. Le lane Claude facevano run piccoli.
- `laravel/phpstan.neon` righe 12-14: `parallel`/`maximumNumberOfProcesses`/`jobSize`/`processTimeout` sono tutti commentati, quindi vale il default (nproc = 24, 18-20 worker).
- Regola adottata: coda `flock` unica per ogni run su piu' di ~5 file, cartella, modulo o `Modules`, con controllo di run vivi e `MemAvailable` ([11-phpstan.md](../../../../../bashscripts/docs/prompts/11-phpstan.md#passi-metodo-swarm), [46-multi-agent-module-swarm.md](../../../../../bashscripts/docs/prompts/46-multi-agent-module-swarm.md)). Un run morto per SIGKILL non vale come misura.
- Decisione aperta per l'utente (solo lui tocca il neon): attivare `parallel.maximumNumberOfProcesses` in `laravel/phpstan.neon` per limitare i worker per run. Gli agenti non modificano il file.
