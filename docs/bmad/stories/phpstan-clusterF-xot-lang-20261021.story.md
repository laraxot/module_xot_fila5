---
title: "PHPStan cluster F 2026-10-21 — Xot e Lang"
type: story
status: done
module: Xot
epic: quality-fleet
story_id: "xot-lang-phpstan-clusterF-20261021"
track: quality/fleet
created: 2026-10-21
updated: 2026-10-21
tags: [phpstan, swarm, cluster-f, xot, lang, factory, phpunit, bmad]
qmd: "phpstan cluster f xot lang zero errori factory astratta phpunit attribute test database guard lock stale 20261021"
related:
  - ./phpstan-modules-swarm.story.md
  - ./phpstan-zero-errors-modules.story.md
  - ../filament-blueprint.md
  - ../../../../Lang/docs/bmad/filament-blueprint.md
---

# PHPStan cluster F 2026-10-21 — Xot e Lang

Fase BMAD: Implement/Verify. Subagent `swarm-clusterF`, lock
`phpstan-clusterF-20261021` su `Modules/Xot` e `Modules/Lang`.

## Obiettivo

0 errori PHPStan level max su `Modules/Xot` e `Modules/Lang`, correggendo alla
sorgente e senza soppressioni, preservando i contratti usati dagli altri moduli.

## Misura

| Modulo | Prima | Dopo | File toccati |
| --- | --- | --- | --- |
| Xot | 3 | 0 | 2 |
| Lang | 0 | 0 | 0 |

Comandi:

```bash
cd laravel
php -d memory_limit=3G ./vendor/bin/phpstan analyse Modules/Xot --no-progress --error-format=table
php -d memory_limit=3G ./vendor/bin/phpstan analyse Modules/Lang --no-progress --error-format=table
```

## Errori, causa e fix

### 1. `XotBaseMorphPivotFactory` senza `definition()`

- Errore: `method.abstract` (non-ignorable) — classe concreta che estende
  `Illuminate\Database\Eloquent\Factories\Factory` senza implementare il metodo
  astratto `definition()`.
- Causa: nel working tree la `definition()` era stata rimossa dalla classe,
  lasciandola concreta. La factory e' dichiarata come base per le factory dei
  MorphPivot specifici, mentre il modello `XotBaseMorphPivot` e' gia' astratto.
- Fix: `abstract class XotBaseMorphPivotFactory extends Factory`. Non viene
  inventata una `definition()` generica: i pivot dei moduli hanno schemi
  diversi e la vecchia definizione usava `morph_type`/`morph_id`, non allineati
  al `$fillable` del modello base.
- Impatto: nessuna sottoclasse e nessun uso di
  `XotBaseMorphPivotFactory` nel repo (`rg`), quindi nessun chiamante interno
  o esterno da aggiornare. Il contratto di estensione resta disponibile per le
  factory concrete dei moduli.

### 2. `GetAllModelsActionTest::$action` restringeva la proprieta' del padre

- Errori: `property.visibility` e `property.nativeType` — `protected
  GetAllModelsAction $action` sovrascrive `public mixed $action` di
  `Modules\Xot\Tests\XotBaseTestCase` (via `Tests\TestCase`).
- Causa: il test riusava lo slot generico del base test case con un tipo piu'
  stretto; le proprieta' PHP sono invarianti e la visibilita' non puo'
  restringersi.
- Fix: proprieta' dedicata `private GetAllModelsAction $getAllModelsAction`,
  con aggiornamento degli usi interni. Lo slot `$action` del base test case
  resta `public mixed` per tutti gli altri test.
- Migliorie collegate nello stesso file (nessun cambio di comportamento):
  - `/** @test */` sostituiti da `#[Test]`: PHPUnit 13 non legge piu' le
    annotazioni nei docblock e il file risultava senza test discoverable.
  - rimossi `RefreshDatabase` e `WithFaker`: l'Action enumera classi dai
    moduli e non usa il database; `RefreshDatabase` viola la regola
    data-sacred ed era comunque inerte (test non eseguiti).

### 3. Lang

Nessun errore prima e dopo. Nessuna modifica al codice. Il lock del modulo era
fermo al 2026-10-06 (15 giorni): rimosso solo dopo verifica che nessun processo
PHPStan stesse analizzando Lang, poi riacquisito con il lock del cluster.

## Impatto sui consumatori

- Nessuna firma pubblica modificata.
- `XotBaseMorphPivotFactory` diventa astratta: era gia' inutilizzabile come
  concreta (metodo astratto non implementato) e non ha sottoclassi nel repo.
- Il file di test e' untracked nel working tree; la modifica non tocca codice
  di produzione.

## Verifica

```bash
php -l Modules/Xot/database/factories/XotBaseMorphPivotFactory.php
php -l Modules/Xot/tests/Unit/Actions/GetAllModelsActionTest.php
./vendor/bin/pint Modules/Xot/database/factories/XotBaseMorphPivotFactory.php \
  Modules/Xot/tests/Unit/Actions/GetAllModelsActionTest.php
./vendor/bin/phpstan analyse Modules/Xot --no-progress   # [OK] No errors
./vendor/bin/phpstan analyse Modules/Lang --no-progress  # [OK] No errors
```

Pest/PHPUnit: tentato `phpunit` diretto e `bashscripts/tools/pest-scratch-db.sh`.
Il bootstrap si ferma in `Modules/Xot/tests/Support/TestDatabaseGuard.php`
perche' le connessioni tenant configurate (`ptv_lara`, `badge`, `performance`,
`ptv_user`, ...) non finiscono per `_test`; lo scratch script sovrascrive solo
`DB_DATABASE` e `DB_DATABASE_USER`, non le connessioni nominate. Gate Pest
documentato come skip per infrastruttura, non per il diff.

## Residui

- Nessun errore PHPStan residuo su Xot o Lang.
- Debito infrastrutturale: `TestDatabaseGuard` blocca i test anche quando il
  test non usa il DB; le connessioni tenant non sono parametrizzabili via
  ambiente nello script scratch.
