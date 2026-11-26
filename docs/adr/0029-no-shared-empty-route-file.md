---
title: "Nessun file di route vuoto condiviso in Modules/Xot/routes/empty.php"
type: decision
status: accepted
created: 2026-11-24
updated: 2026-11-26
module: Xot
decision-makers: [team back office]
supersedes: "0036-route-entrypoints-canonical-empty.md"
issues: []
qmd: "routes empty.php require base_path XotBaseRouteServiceProvider stub module"
---

# ADR: no shared `Modules/Xot/routes/empty.php`

> Decisione valida per tutti i tenant che usano Xot: riguarda i file `routes/web.php` e `routes/api.php` di ogni modulo.

## Contesto

`XotBaseRouteServiceProvider` carica sempre `routes/web.php` e `routes/api.php` del modulo (`Route::…->group($module_dir.'/../../routes/…')`). Alcuni moduli senza rotte tradizionali (UI, Lang, Cms api) avevano:

```php
require base_path('Modules/Xot/routes/empty.php');
```

spesso lasciato da un merge (`<<<<<<<` / `>>>>>>> laraxot/dev`). Secondo il testo originale di questo ADR il file `empty.php` **non esisteva** in Xot: il `require` era coupling falso e, se risolto verso quel lato, fatale a boot. Oggi il file esiste (vedi «Stato attuale»); la decisione non dipende da questo.

Domanda: come deve presentarsi un modulo che non registra rotte?

## Driver della decisione

- Nessuna dipendenza cross-modulo per zero comportamento: un modulo non deve richiedere un file di Xot per «non fare niente».
- Il boot non deve poter fallire per un path fantasma lasciato da un merge.
- Il provider comune assume che i due file esistano (`mapWebRoutes` / `mapApiRoutes`): vanno mantenuti.
- Una sola forma per tutti i moduli (KISS), senza eccezioni per-modulo.

## Alternative scartate

### File `empty.php` condiviso in Xot
- Pro: un solo stub.
- Contro: dipendenza cross-modulo per zero comportamento; path `base_path('Modules/Xot/…')` fragile fuori dal layout atteso; falsa sensazione di contratto.
- Perché no: KISS — un file locale vuoto basta.

### Omettere `routes/web.php` / `api.php`
- Pro: meno file.
- Contro: `XotBaseRouteServiceProvider::mapWebRoutes` / `mapApiRoutes` falliscono se il path manca.
- Perché no: il provider assume i file.

### Disabilitare map* per moduli Folio-only
- Pro: niente stub.
- Contro: eccezioni per-modulo, regressioni già viste quando map* erano commentati (rotte User/socialite mancanti).
- Perché no: stub locale è più economico e uniforme.

## Decisione

1. **Vietato** `require` / `include` di un file rotte condiviso “vuoto” sotto Xot (o altro modulo).
2. Se il modulo non registra rotte: lasciare `routes/web.php` / `routes/api.php` **presenti e minimi** (`declare(strict_types=1);` + commento opzionale). `Route::group` su un file PHP senza `Route::` è già “vuoto”.
3. Non creare `Modules/Xot/routes/empty.php` per “sistemare” i require: sarebbe nascondere il sintomo.

## Conseguenze

- Buono: niente fatale su require fantasma; niente coupling Xot per il nulla; marker di conflitto rimossi nei route file toccati.
- Cattivo: ogni modulo tiene due stub anche se “vuoti” (già vero per Activity/Tenant/Rating).
- Cattivo: la decisione è scritta ma due test la contraddicono (vedi «Stato attuale»).

## Stato attuale

Misurato il 2026-11-26 leggendo il sorgente (Pest non eseguito in questa passata):

- `Modules/Xot/routes/empty.php` **esiste** (aggiunto il 2026-11-24, `return [];` a riga 10); il suo docblock (riga 8) rimanda ancora all'ADR 0036, superseded da questo.
- `Modules/Xot/tests/Unit/Routing/CanonicalEmptyRouteEntrypointsTest.php:22-25` **impone ancora** il `require base_path('Modules/Xot/routes/empty.php');` che questo ADR vieta, in 9 file (righe 10-18: `Job/routes/web.php`, `Lang`, `Media`, `Rating`, `UI` per `api.php` e `web.php`), e alle righe 28-29 che `empty.php` contenga `return [];`. Nessuno dei 9 file contiene oggi quel `require` (grep sulle stringhe esatte), quindi il test fallisce già sul primo file, `Job/routes/web.php`.
- `Modules/Xot/tests/Unit/Architecture/NoSharedEmptyRouteFileTest.php:16-23` impone il contrario (nessun `Modules/*/routes/*.php` contiene `Xot/routes/empty`) ed è il test di questo ADR (riga 6). **I due test si contraddicono.** Inoltre confronta una sottostringa, quindi trova anche il commento «Never require Modules/Xot/routes/empty.php» già scritto in `Modules/Fixcity/routes/web.php:8`, `Modules/Media/routes/web.php:8` e `Modules/Media/routes/api.php:8`: fallisce proprio sui moduli già riallineati.
- `Modules/Fixcity/routes/web.php` è **già riallineato** alla decisione: `declare(strict_types=1);` più un commento, nessun `require` (righe 3-9).

La decisione resta valida. Da fare, a cura di chi possiede i test di guardia di Xot (non toccati in questa passata): rimuovere o riscrivere `CanonicalEmptyRouteEntrypointsTest` (appartiene alla 0036, superseded) e far cercare a `NoSharedEmptyRouteFileTest` un `require`/`include` reale (regex sul codice) invece della sottostringa nei commenti.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Architecture/NoSharedEmptyRouteFileTest.php`: oggi rosso per i commenti sopra, non per un `require` reale.
- `cd laravel && rg -n "^\s*(require|include)(_once)?\b.*Xot/routes/empty" Modules/*/routes`: deve restare vuoto (cerca solo codice, non i commenti; misurato il 2026-11-26: nessun risultato).
- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Routing/CanonicalEmptyRouteEntrypointsTest.php`: **non** è una conferma di questo ADR; è la prova opposta, da eliminare (vedi «Stato attuale»).

## Collegamenti

- Loader: `app/Providers/XotBaseRouteServiceProvider.php`
- Story BMAD citata dalla versione precedente (`0107-no-shared-empty-route-file.story.md`): non presente in `docs/bmad/stories/` il 2026-11-26.
- Sostituisce: [0036](0036-route-entrypoints-canonical-empty.md)
