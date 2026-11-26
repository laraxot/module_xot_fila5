---
title: "Le operazioni di business nuove si scrivono come Queueable Actions"
type: decision
status: accepted
created: 2025-09-22
updated: 2026-11-26
module: Xot
decision-makers: [team back office]
issues: []
qmd: "0001 actions over services operazioni business queueable action app/Services NoServicesTest"
related:
  - ./0002-queueable-actions-over-framework-jobs.md
  - ./0012-behavioral-contract-governance.md
  - ./0016-action-names-get-not-resolve.md
  - ./0020-architecture-tests-pest-arch.md
---

# Le operazioni di business nuove si scrivono come Actions, non come Services

> Decisione valida per tutti i tenant che usano Xot: il modulo e' condiviso e la regola vale per ogni modulo e tema.

## Contesto

In `Modules/*/app/Services` esistono classi `*Service` nate prima della convenzione (oggi 21 file, vedi «Stato attuale»): contengono logica di business senza un contratto e senza un punto unico a cui agganciare un test. Chi aggiunge un'operazione accanto a una di queste tende a copiarne la forma, difetti compresi. Che forma diamo alle operazioni di business nuove, sapendo che i Service esistenti restano in produzione?

## Driver della decisione

- Un'operazione = un file: il Behavioral Contract ([0012](./0012-behavioral-contract-governance.md)), i suoi test e il docblock `@contract` ([0011](./0011-contract-docblock-reference.md)) hanno un solo bersaglio.
- La stessa classe deve poter girare in modo sincrono o accodato, senza un secondo punto di ingresso per la stessa regola ([0002](./0002-queueable-actions-over-framework-jobs.md)).
- Nessuna riscrittura forzata del legacy: un bugfix su un Service e' una modifica minima sul posto, la migrazione si fa solo se e' nello scope di una story (AGENTS.md, sezione Conflicts, riga C1).
- La regola deve essere verificabile da un test e non solo dichiarata nei docs.

## Alternative scartate

- Action semplice in `app/Actions/<Dominio>/` con un metodo `handle()` e senza `QueueableAction`: sincrona soltanto; l'accodamento richiederebbe un Job parallelo con la stessa logica.
- Estendere i Service esistenti con un metodo per ogni operazione nuova: un file raccoglie piu' operazioni, il contratto non ha un solo bersaglio e il difetto di un metodo si propaga ai vicini.
- Logica nei controller, nei listener o nelle pagine Filament: non riusabile da un comando artisan o da una coda.

## Decisione

Scelta: **Spatie Queueable Actions** (`app/Actions/**`, trait `Spatie\QueueableAction\QueueableAction`, metodo pubblico tipizzato `execute()`), perche' e' l'unica opzione in cui contratto, test e docblock `@contract` puntano a un file solo e l'operazione puo' essere eseguita in modo sincrono o accodata.

Naming di lettura/derivazione: prefisso **`Get*`**, mai **`Resolve*`** ([0016](./0016-action-names-get-not-resolve.md)). Nessun nuovo file in `app/Services`.

## Conseguenze

- Buono: ogni operazione nuova ha il suo contratto e i suoi test si lanciano per group (`vendor/bin/pest --group=<ID>`).
- Buono: un difetto del legacy (un Service senza contratto) non si propaga al codice nuovo.
- Cattivo: per un periodo convivono due stili; chi legge `app/` li vede entrambi e deve sapere quale vale. Per questo AGENTS.md → Conflicts (C1) lo dichiara.
- Cattivo: un Service migrato in Action cambia classe e namespace; ogni chiamante va censito prima (nessuna migrazione automatica).

## Stato attuale

Misurato il 2026-11-26 (lettura del sorgente; Pest non eseguito in questa passata):

- `find Modules -path '*/app/Services/*' -name '*.php'` trova **21 file**: AI 5, Geo 8, Job 1, UI 5, Xot 2 (`RouteService.php` e `Artisan/Handlers/ModuleCommandHandler.php`, entrambi cancellati il 2026-11-20 secondo `debt.php:33-40` e ricomparsi); `Modules/Seo/app/Services` esiste ma e' vuota.
- `Modules/Xot/tests/Unit/Architecture/NoServicesTest.php:70-82` si aspetta **nessuna** cartella `Services` nel codice di produzione (allowlist volutamente vuota, righe 26-29): con i file sopra non regge.
- `Modules/Xot/tests/Arch/ArchitectureTest.php:152-155` impone la stessa regola per namespace, con eccezioni in `arch_debt('services')`; `Modules/Xot/tests/Arch/debt.php:31-40` la dichiara a zero «dal 2026-11-20», cioe' prima che i file comparissero di nuovo.

La decisione non cambia: il codice nuovo segue la convenzione, e i 21 file sono debito da censire in una story del modulo owner. La causa della ricomparsa (merge o sync) non e' accertata qui.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Architecture/NoServicesTest.php`: fallisce finche' esistono cartelle `Services` nel codice di produzione.
- `cd laravel && vendor/bin/pest --testsuite=Arch`: include `Modules/Xot/tests/Arch/ArchitectureTest.php` (regola «a use case is an Action, not a Service»).
- In revisione: una classe nuova sotto `app/Services/` si respinge con un rimando a questo ADR; ogni Action nuova ha `@see` e `@contract` nel docblock e il suo file in `docs/contracts/`, elencato in `docs/contracts/README.md`.
