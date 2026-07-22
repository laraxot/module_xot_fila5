# Helper Functions - Xot Module

**Purpose**: Funzioni helper globali per utilità comuni nel framework Laraxot
**Location**: `Modules/Xot/helpers/Helper.php`
**Loaded via**: `composer.json` → `"files": ["helpers/Helper.php"]` (convenzione di progetto: non `app/Helpers/helper.php`)
**Pattern**: Global functions con `function_exists()` check per evitare collisioni

---

## Funzioni Disponibili (stato reale del file, verificato nel codice)

### `isRunningTestBench(): bool`
Verifica se l'app gira sotto Orchestra Testbench, confrontando (via `FixPathAction`) il path base con `vendor/orchestra/testbench-core/laravel`.

### `dddx(mixed $params): void`
Dump-and-die esteso: raccoglie riga/file chiamante, tempo trascorso da `LARAVEL_START`, memoria di picco e — se il chiamante è una view compilata in `storage/framework/views` — anche il file blade sorgente originale (letto dal commento `/**PATH ... ENDPATH**/`). Termina con `dd($data)`. **Non ritorna nulla** (a differenza di quanto documentavano versioni precedenti di questo file): è puro side-effect di debug.

### `in_admin(array $params = []): bool`
Alias legacy di `inAdmin()`, mantenuto per retro-compatibilità.

### `inAdmin(array $params = []): bool`
Determina se la richiesta corrente è nel contesto admin panel. Logica reale:
1. Se `$params['in_admin']` è settato, ritorna quel valore (cast bool).
2. Se il secondo segmento della route è `admin`, ritorna `true`.
3. Altrimenti, per richieste Livewire (`segments[0] === 'livewire'`) controlla la sessione `in_admin`.

Nota: **non è più un wrapper su `RouteService::inAdmin()`** — `RouteService` è stato migrato a QueueableAction (`Actions/Route/IsAdminRouteAction` e altre, vedi `wiki/decisions/services-to-actions-migration.md`); questo helper globale contiene ora la logica inline, non delega più a nessuna classe Route.

### `params2ContainerItem(?array $params = null): array{0: array<string,mixed>, 1: array<string,mixed>}`
Estrae dai parametri di route (o dalla route corrente se `$params` è `null`) le coppie `containerN => valore` / `itemN => valore` tramite regex, popolando due array separati `$container` e `$item`.

### `xotModel(string $name): Model`
Risolve un'istanza Eloquent dal `morph_map` (`config('morph_map.<name>')`). Lancia `Exception` se la config manca o l'istanza risolta non è un `Model`.

### `authId(): ?string`
ID dell'utente autenticato come stringa, o `null`. Usa `Filament::auth()->id()` con fallback su `auth()->guard()->id()`; qualsiasi eccezione (es. nessun panel Filament corrente) è catturata e ritorna `null`.

### `trans_string(string $key, array $replace = [], ?string $locale = null): string`
Wrapper type-safe su `__()`: normalizza i valori di `$replace` non scalari con `SafeStringCastAction::cast()` prima di passarli alla traduzione, e garantisce sempre un valore `string` di ritorno (se `__()` restituisce un array, ritorna la `$key`).

### `isJson(string $string): bool`
Wrapper su `json_validate()` (PHP 8.3+ nativo).

### `xotSeedModelOnce(string $modelClass): void`
Crea un record idempotente di seed per un modello, passando da `GetFactoryAction` (che risolve la Factory in modo PHPStan-safe) e chiamando `createOne()`. Pensato per seeder/test che devono garantire "almeno un record" senza duplicarlo.

---

## Stub Pest per PHPStan (non funzioni reali runtime)

Il file dichiara anche stub per le funzioni globali di Pest (`actingAs`, `get`, `post`, `put`, `patch`, `delete`, `head`, `options`, `followingRedirects`, `test`, `describe`). Ogni stub lancia `RuntimeException('Stub: ...')` se mai eseguito: servono **solo** a far risolvere i tipi a PHPStan quando Pest non è caricato nel contesto analizzato, non sono implementazioni utilizzabili.

---

## ⚠️ Funzioni NON presenti nel file (rimosse da questa documentazione)

Versioni precedenti di questo documento elencavano `snake_case()`, `str_slug()`, `getFilename()` e `getModuleModels()` come helper di `Modules/Xot/helpers/Helper.php`. **Non esistono in questo file allo stato attuale del codice** — se servono altrove nel monorepo, cercarle con `grep -rn "function getModuleModels" laravel/` prima di assumerne l'esistenza qui.

---

## 🏗️ Pattern Architetturali

### Function Existence Check
Ogni funzione è avvolta in `if (! function_exists('nome')) { function nome(...) {...} }` per evitare fatal error di ridichiarazione quando più moduli/pacchetti definiscono helper con lo stesso nome.

### Dependency Injection nelle funzioni globali
Le funzioni che necessitano di servizi/Action li risolvono con `app(ActionClass::class)->execute(...)` (es. `FixPathAction`, `GetFactoryAction`) invece di istanziarli direttamente, per restare testabili e sostituibili nel container.

---

## 🔗 Related Documentation

- [Actions Pattern](./actions-pattern.md)
- [Migrazione Services -> QueueableAction](./wiki/decisions/services-to-actions-migration.md) — perché `inAdmin()` non delega più a `RouteService`
- [PHPStan Level 10 Compliance Guide](./phpstan-level10.md)

---

**Last Updated**: 2026-07-20
**Verified against**: `laravel/Modules/Xot/helpers/Helper.php` (lettura diretta del sorgente)
