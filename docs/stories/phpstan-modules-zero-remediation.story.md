---
title: "[STORY] PHPStan Modules a zero: lane Xot (modulo condiviso)"
type: story
module: Xot
bmad: true
status: review
priority: high
created: 2026-11-26
updated: 2026-11-26
tags: [phpstan, xot, qualita, swarm, test-fixture, safe]
qmd: "phpstan modules zero remediation xot lane swarm HasSchemalessAttributes BaseExtra AppMiddlewareTest PackagesHaveGithubReadmeTest Safe preg_replace alreadyNarrowedType"
---

# PHPStan Modules a zero: lane Xot

## Scopo

Portare `./vendor/bin/phpstan analyse Modules/Xot` a zero errori correggendo la sorgente (tipi
reali, import Safe, asserzioni non ridondanti), senza `@phpstan-ignore`, baseline, `ignoreErrors`
ne' modifiche a `laravel/phpstan.neon`. Xot e' la base condivisa di ogni modulo: i contratti
pubblici (trait, classi `XotBase*`, `BaseExtra`) non cambiano.

La lane e' una delle cinque dello swarm "PHPStan Modules a zero" (un solo scrittore per file).
L'inventario iniziale della lane contava 38 errori in 9 file.

## Causa alla sorgente

Quando la lane e' partita il working tree di Xot era stato riscritto (mtime 17:46:45 dei file
interessati, merge/sync in corso) e 36 dei 38 errori dell'inventario non si riproducevano piu':

- `HasSchemalessAttributes` analizzato "in context of" `BaseExtra`: `BaseExtra` ora usa
  `Modules\Xot\Traits\HasSchemalessAttributes` (prima il trait Spatie `SchemalessAttributesTrait`)
  e il trait espone il contratto con PHPDoc preciso (`@property SchemalessAttributes|null
  $extra_attributes`, `Builder<static>`, `array<string>`, `array<string, mixed>`), con
  `extraAttributesWrapper()` e `syncExtraAttributesWrapper()` definiti nel trait stesso.
- `ExportXlsByCollection`: non istanzia piu' `PhpOffice\PhpSpreadsheet\Spreadsheet` (deprecato,
  imposto da maatwebsite/excel 3.1); passa sempre da `CollectionExport`.
- `XotBaseListRecords`: `createActionLabel()` ora esiste (`?string`), l'etichetta e' passata a
  `label()`/`tooltip()` solo se non nulla.
- `HasCommonScopesProbe`: `@use HasCommonScopes<static>` ora dichiarato dove il trait e' generico.
- Test helper `collisionAuditMissing()` e `actionContractRequired()` ora definiti.

Restavano due errori reali, entrambi in test source-level:

1. `tests/Unit/Docs/PackagesHaveGithubReadmeTest.php:44`: `preg_replace` nativo puo' restituire
   `false`/`null` invece di lanciare (`theCodingMachineSafe.function`). Nel resto del test si usa
   gia' `Safe\*`; mancava l'import di `Safe\preg_replace`.
2. `tests/Unit/HostApp/AppMiddlewareTest.php:116`: `Assert::assertIsString('/home')` e' sempre
   vero (`staticMethod.alreadyNarrowedType`). In questo host `App\Providers\RouteServiceProvider`
   esiste e `HOME` e' una `const string`: il commento "per PHPStan e' mixed" era vero solo negli
   host senza la classe. La stessa scelta e' gia' in ptvx (`url(RouteServiceProvider::HOME)`).

## Cosa e' cambiato

- `PackagesHaveGithubReadmeTest.php`: aggiunto `use function Safe\preg_replace;`. Il cast
  `(string)` resta; in caso di errore PCRE ora c'e' un'eccezione invece di un `null` silenzioso
  trasformato in stringa vuota.
- `AppMiddlewareTest.php`: tolta la variabile `$home` e l'`assertIsString` ridondante, il test
  confronta `url(RouteServiceProvider::HOME)` con `getTargetUrl()` (stesso comportamento). Aggiornato
  il commento di testa (le `assertIs*` restringono solo i `mixed` reali, come `hosts()` senza
  return type, mai costanti gia' tipizzate). Pint ha applicato `new X()` con parentesi.
- Nessuna modifica a trait, `BaseExtra` o altre classi di base nella lane: nessun contratto
  pubblico toccato.

## Verifica

- `phpstan analyse` sui due file: `[OK] No errors`.
- `phpstan analyse Modules/Xot --memory-limit=-1 --no-progress`: `[OK] No errors`.
- Dipendente: `phpstan analyse Modules/User` (`User\Extra` estende `BaseExtra`): `[OK] No errors`.
- `php -l` e `pint` verdi sui due file. Prova isolata (`php -r` con autoload, senza DB) che
  `Safe\preg_replace` sul pattern del frontmatter restituisce `# Titolo\ncorpo` con e senza
  frontmatter, come il `preg_replace` nativo.
- Pest non eseguibile qui (`.env.testing` senza `DB_USERNAME`): il comportamento e' provato per
  lettura, PHPStan e `php -r`. Da lanciare in sviluppo: `HostApp/AppMiddlewareTest.php` e
  `Docs/PackagesHaveGithubReadmeTest.php`.

## Aperto

- `ExportXlsByCollection` dichiara `@contract docs/contracts/export-xls-by-collection.md`, ma il
  contratto vive in `archive/docs-legacy/contracts/export-xls-by-collection.md` (la consolidazione
  docs di Xot lo ha spostato; `docs/contracts/INDEX.md` e `README.md` puntano gia' all'archivio).
  Nessun test fallisce (il gate valida solo i file `type: contract` presenti), ma il riferimento
  machine-readable e' sospeso. Va ripristinato dal proprietario della consolidazione docs di Xot.
- `AppMiddlewareTest` resta condiviso tra host: negli host con `app/` minimale le classi `App\`
  mancano e i test saltano; la versione senza `assertIsString` e' corretta ovunque la classe esista.
- Il gate `BmadStoriesAreMadrFormatTest` chiede sezioni MADR e basename `NNNN-slug`: questa story
  segue l'ordine utente (nome senza numero, sezioni `Scopo`/`Causa`/...), come le altre story non
  numerate della cartella.

## GitHub (tracciamento)

- Issue: https://github.com/festionali/base_restaurant_fila5/issues/79
- Discussion: https://github.com/festionali/base_restaurant_fila5/discussions/80
