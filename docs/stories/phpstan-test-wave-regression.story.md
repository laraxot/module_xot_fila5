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

Da compilare a fine run.

- Lane xot: 603 -> 0 errori sui 28 file del bucket (`phpstan analyse Modules/Xot` esce 0). Causa: test e infrastruttura di test di Xot riportati dal merge come bozze anteriori al ciclo verificato; ripristinate da `6c8a5bb3f` (18 test, `TestCase`, `CreatesApplication`) e correzioni sul posto per 5 sorgenti. Dettaglio e decisioni aperte (servizi risorti, `Helpers/Helper.php` maiuscolo): [phpstan-test-wave-xot.story.md](phpstan-test-wave-xot.story.md).
