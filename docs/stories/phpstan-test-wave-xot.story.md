---
title: PHPStan test wave, lane xot
type: story
module: Xot
phase: implementazione, quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - phpstan-test-wave-regression.story.md
  - ../bmad/stories/module-service-test-decision.story.md
  - services-to-actions-xot-small.story.md
  - services-to-actions-xot-route.story.md
  - dcp-243-test-model-module-xot-contro-api-reale.story.md
  - dcp-45-isolamento-db-test-pest-scratch.story.md
---

# PHPStan test wave: lane xot

Fase BMAD: implementazione e quality gate. Coordinamento del run in
[phpstan-test-wave-regression.story.md](phpstan-test-wave-regression.story.md).
Bucket: 28 file di `Modules/Xot` (22 test e fixture di test, 6 sorgenti).

## Misura

| Momento | Errori sui file del bucket |
|---|---|
| Baseline delle 09:00 | 603 |
| Ri-misura prima di editare (PHPStan mirato) | 568 (il trait `CreatesApplication` compariva 12 volte nello stesso punto, 36 righe per 3 errori; `Helper.php` 28 invece di 29; `RouteService.php` 3 invece di 4) |
| Dopo | 0 |

Verifiche finali: `phpstan analyse` sui 28 file del bucket, esito 0; `phpstan analyse Modules/Xot`
(modulo intero, non `Modules`), esito 0; 108 file di altri moduli che importano
`Modules\Xot\Tests\{TestCase,XotBase*,CreatesApplication}`: nessuno peggiore della baseline.
Pest non e' stato lanciato: il DB di test non esiste e `Modules\Xot\Tests\TestCase` apre
transazioni sulla connessione sqlite prima del `setUp` (vedi DCP-222, DCP-243, DCP-45).

## Causa alla sorgente

Un'unica causa spiega 567 dei 603 errori (40 di infrastruttura, 522 di corpi di test, 5 del duplicato per maiuscole):
i file di test e l'infrastruttura di test di Xot nel working tree (e in HEAD del repo Xot, merge `9230d1083`) sono bozze anteriori al ciclo
PHPStan chiuso l'8 ottobre, non le versioni verificate.

- I due parent del merge `cf1d1f2e8` (`6c8a5bb3f` del 13 ottobre e `44a67c73a`) hanno lo stesso contenuto per
  i 20 file di test e infrastruttura del bucket che oggi differiscono (18 corpi di test, `TestCase`,
  `CreatesApplication`; `PanelRoleSeederTest.php` e' identico). Il merge ne scrive un'altra versione
  (esempio: `XotBaseTransitionTest.php` 104 righe nei parent, 236 in HEAD).
- Il blob corrente di `tests/CreatesApplication.php` coincide con quello di `24e86ba1f`
  (linea del 15-18 ottobre), non con i parent.
- Le bozze sono classi PHPUnit con `Tests\TestCase` + `RefreshDatabase`, oppure Pest con
  `expect()` ridondanti e API del SUT che non esistono. Il ciclo verificato le aveva gia'
  riscritte con `Assert::`, fixture concrete e `markTestSkipped` motivato.

## Scopo capito, per causa

| Causa | Errori baseline | Scopo del codice | Correzione |
|---|---|---|---|
| `tests/TestCase.php` e `tests/CreatesApplication.php` stantii | 40 (TestCase 2, CreatesApplication 36, `PanelRoleSeederTest` 2) | `TestCase` di Xot deve estendere `XotBaseTestCase` (helper `prepareSharedSqliteForTesting`, `mockService`, proprieta' tipizzate `$record`, `$action`...) e `DatabaseTransactions`; `CreatesApplication` carica `.env.testing`, lancia un'eccezione se manca con `APP_ENV=testing` e non forza le connessioni. La versione stantia estendeva `Illuminate\...\TestCase`, puntava a `Modules\SaluteOra\Models\User` (modulo che non esiste in questo repo) e non aveva nessuna di queste cose | ripristinate le versioni verificate da `6c8a5bb3f` |
| Corpi di test non allineati al SUT | 522 | vedi tabella sotto | ripristinate le versioni verificate da `6c8a5bb3f` |
| Duplicato per maiuscole `tests/Unit/metatagdatatest.php` | 5 | stesso test di `MetatagDataTest.php` | allineato al contenuto verificato, con intestazione che spiega il duplicato |
| `Helpers/Helper.php` | 29 | helper globali, ma vedi decisioni aperte: non e' caricato da composer | tipizzazione e rimozione di codice morto, sul posto |
| `app/Services/{UrlService,RouteService,RouteDynService}.php`, `app/Contracts/UserContract.php` | 7 | servizi risorti dal merge, senza chiamanti; contratto utente | correzioni minime sul posto |

Test ripristinati e SUT reale che li rende non validi nella bozza:

| File | Errori | Perche' la bozza non era valida |
|---|---|---|
| `Unit/XotBaseTransitionTest.php` | 119 | `XotBaseTransition` richiede `Model $record` nel costruttore, `getNotificationRecipients()` restituisce `array<string, RecordNotificationData>`, `sendRecipientNotification(RecordNotificationData, array)`, nessun `getRecord()` |
| `Feature/BaseMorphPivotBusinessLogicTest.php` | 99 | istanziava `new BaseMorphPivot()` (astratta) e leggeva proprieta' non dichiarate (vedi sezione pivot) |
| `Feature/ModuleBusinessLogicTest.php` | 81 | (`create()`, `fresh()`, `update()` su `mixed`) `Module` e' un registry Sushi in sola lettura (`getRows()` da nwidart): CRUD, `slug`, `enabled` e factory non esistono; la forma verificata fa `markTestSkipped` con questo motivo. La bozza usava `RefreshDatabase` |
| `Feature/XotBaseModelBusinessLogicTest.php` | 51 | `new BaseModel()` su classe astratta (29 `new.abstract`), `method_exists` e `assertTrue(true)` sempre veri |
| `Feature/ModuleServiceIntegrationTest.php`, `Unit/ModuleServiceTest.php` | 36 + 11 | testano `ModuleService`, rimosso l'8-9 ottobre: lo scopo (`getModels()`) e' in `GetAllModelsByModuleNameAction`, come da `bmad/stories/module-service-test-decision.story.md` |
| `Feature/FixStructureTest.php` | 34 | `file_put_contents`, `mkdir`, `chmod`, `exec`, `file_get_contents` non Safe e concatenazioni su `mixed` |
| `Unit/Actions/Cast/SafeFloatCastActionTest.php`, `Unit/HasExtraTraitTest.php`, `Feature/Actions/Pdf/GetPdfContentByRecordActionTest.php` | 17 + 17 + 15 | 17 `toBeFloat()` ridondanti; modelli anonimi con proprieta' in sola lettura o senza tipo e `class_uses` non Safe; `create()` su `mixed` e proprieta' non dichiarate su modelli anonimi |
| `Unit/HasTableWith*TestClass.php`, `Unit/HasXotTableTest.php`, `HasXotTable.php` (contesto) | 7 + 7 + 6 + 2 | fixture con `array` senza tipo di valore, `Mockery` non tipizzato, `shouldDeferMissing` deprecato |
| `Unit/MetatagDataTest.php`, `Unit/Models/{BaseModelTest,XotBaseModelTest}.php`, `Unit/SendMailByRecordActionTest.php`, `Feature/Filament/XotBaseResourceTest.php` | 5 + 4 + 6 + 3 + 2 | metodi deprecati di `MetatagData` (`getColors`, `getLogoHeight`), `usesSoftDeletes()` inesistente su `BaseModel`, `file_get_contents` non Safe |

I corpi delle bozze restano in git: HEAD del repo Xot (`git -C Modules/Xot show 9230d1083:<path>`). Non ci sono test
neutralizzati con `skip` nuovi: l'unico `markTestSkipped` e' quello gia' presente nella forma verificata di
`ModuleBusinessLogicTest.php`.

## BaseMorphPivot: scopo e decisione

- `Modules\Xot\Models\BaseMorphPivot` e' la base legacy astratta per pivot polimorfiche: estende `MorphPivot`,
  connessione `xot`, chiave `string`, `$fillable` (`post_id`, `post_type`, `related_type`, `user_id`, `note`), cast di `id`,
  `uuid`, timestamp e `*_by`. Le colonne vere le definisce la tabella della pivot concreta, non la base.
- Chi la estende: solo `tests/Fixtures/Models/TestConcreteMorphPivot.php` (tabella `test_morph_pivots`, nessuna migration).
  Nessun sorgente di nessun modulo la estende: ogni modulo ha un proprio `BaseMorphPivot` astratto che parte da
  `XotBaseMorphPivot` (Cms, Gdpr, User) o direttamente da `MorphPivot` (Geo, Job, Lang, Notify). `XotBaseMorphPivot` ha gia'
  `@property` per `morph_type`, `morph_id`, `related_*`, timestamp e `*_by`.
- Perche' e' astratta: e' un punto di estensione, non un modello. Renderla concreta la farebbe sembrare istanziabile e
  aprirebbe `new BaseMorphPivot()` ovunque senza tabella. Non e' stata resa concreta.
- Correzione: il test torna a usare la pivot concreta gia' esistente (`TestConcreteMorphPivot`) e `setAttribute/getAttribute`
  invece dell'accesso a proprieta' magiche. Elimina 43 `new.abstract` e 42 `property.notFound`.
- Tipizzare `@property` sulla base legacy non serve ora (nessun accesso a proprieta' e nessun chiamante): non fatto.
- Errori di altri moduli eliminati da questa correzione: nessuno. Nella baseline tutti gli errori che nominano `BaseMorphPivot`
  (85) stanno in `BaseMorphPivotBusinessLogicTest.php` di Xot. I 77 `new.abstract` citati nel brief sono 43 + 29
  (`BaseMorphPivot` e `BaseModel`, entrambi in Xot) + 5 di `UI\Filament\Widgets\RowWidget`, estranei alla pivot e fuori dal bucket.

## Sorgenti corretti sul posto

- `Helpers/Helper.php` (29 -> 0): `@param`/`@return` con tipo di valore (`array<string, mixed>`, `list<...>`),
  `params2ContainerItem()` senza variabili variabili e senza `@phpstan-ignore` superfluo, `getAllModules()` che
  filtra a `array<string, Nwidart\Modules\Module>`, `getRouteParameters()` che restituisce solo chiavi stringa,
  parametro inutilizzato `$_quotation_marks` tolto da `bracketsToDotted()`/`dottedToBrackets()`, blocco morto di
  `dddx()` rimosso (calcolo di `$file` mai letto, con un `Assert` su `DOCUMENT_ROOT` che in CLI avrebbe lanciato),
  `getRelationships()` riattivato come da blocco commentato (prima restituiva sempre `[]`).
- `app/Services/UrlService.php`: tolto `include_once __DIR__.'/vendor/autoload.php'` dal costruttore (file inesistente:
  in Laravel il warning diventa eccezione). La forma pre-rimozione aveva il costruttore vuoto.
- `app/Services/RouteDynService.php`: `Assert::string($v['name'])` al posto del cast di `mixed` (forma pre-rimozione).
- `app/Services/RouteService.php`: tolta l'assegnazione mai letta di `$routename` in `urlAct()`; `getView()` converte i
  `containers` con `SafeStringCastAction::cast`.
- `app/Contracts/UserContract.php`: ripristinato `use Laravel\Passport\Token;` che il docblock di `createToken()` richiede.

## Duplicati e collisioni di maiuscole (segnalati, non rimossi)

Sul file system sensibile alle maiuscole convivono, nel repo Xot: `Helpers/Helper.php` e `helpers/Helper.php`,
`tests/Pest.php` e `tests/pest.php` (identici), `tests/Unit/MetatagDataTest.php` e `tests/Unit/metatagdatatest.php`
(ora allineati), `tests/Unit/HasXotTableTest.test` e `hasxottabletest.test`. In `docs/`: `00-INDEX.md` e `00-index.md`
(diversi, 64 e 68 righe), `CHANGELOG.MD` e `changelog.MD`, `BRAINSTORM-TestCase-Hierarchy-XotBase.md` e
`brainstorm-test-case-hierarchy-xot-base.md` (due stub che si rimandano a un terzo nome che non esiste). Su macOS e
Windows i due nomi sono lo stesso file: il checkout confligge.

## File saltati per gate

Nessuno. Tutti i file toccati hanno passato il gate lock + mtime (> 120 s) e sono stati sbloccati a fine lavoro.

## Blocchi cross-modulo

Nessuno. `app/Providers/XotServiceProvider.php` e' stato modificato da un'altra sessione durante il run (+30 righe):
non toccato.

## Decisioni aperte per l'utente

1. **Servizi risorti.** Il merge ha riportato `app/Services/*.php` (ArtisanService, ConfigService, HtmlService, ModuleService,
   RouteDynService, RouteService, ThemeService, UrlService, XotService, Translators, Trend) che le story
   `services-to-actions-xot-*` e `module-service-test-decision` danno per rimossi. Hanno zero chiamanti di produzione
   (i riferimenti nelle Actions sono commenti). Ho corretto solo gli errori; la scelta tra rimuoverli di nuovo e tenerli
   e' vostra (regola no-services del progetto: vanno rimossi).
2. **`Helpers/Helper.php` maiuscolo.** Composer carica solo `helpers/Helper.php`. Il file maiuscolo (1188 righe) definisce
   50 funzioni che nessun autoload carica e ha quasi zero chiamanti: codice morto che pero' PHPStan analizza. Non l'ho
   cancellato; andrebbe rimosso o fuso in `helpers/Helper.php`.
3. **Legacy `BaseMorphPivot`.** Usata solo da un fixture di test: candidata a deprecazione in favore di `XotBaseMorphPivot`.
4. **Runtime non provato.** I test ripristinati sono puliti per PHPStan ma non eseguiti. Sotto `pest-scratch-db.sh` il
   `TestCase` con `DatabaseTransactions` fallisce nel `setUp` (DCP-222, DCP-243, DCP-45).
5. **Bug latenti annotati, non cambiati.** `RouteService::urlAct()`: `$routename` vale sempre `''` (la chiamata a
   `Request::route()->getName()` e' commentata), quindi il nome dell'azione non dipende dalla rotta corrente.
   `UserContract::createToken()` documenta `PersonalAccessTokenResult<Token>`, ma `TValue` e' il tipo dei valori degli
   attributi del risultato, non il token.
6. **Duplicati per maiuscole**: vedi sezione sopra.

## Docs toccate

- `docs/00-INDEX.md`: aggiunte le due story del run in "Story recenti" e una nota in "Problemi noti" sul merge del
  2026-10-20 (servizi risorti, collisioni di maiuscole).
- Nessuna doc resa falsa dal fix: `bmad/stories/module-service-test-decision.story.md` torna vera per i test
  (usano di nuovo l'Action) ed e' contraddetta solo dal file `ModuleService.php` risorto (decisione 1). `README.md`
  ("base in `tests/XotBaseTestCase.php` e `tests/TestCase.php`") torna corretta.
