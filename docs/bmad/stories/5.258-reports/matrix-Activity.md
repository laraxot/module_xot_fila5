# Matrice G13: modulo Activity

Agente G13 (sola lettura), 2026-10-01. Gruppo saltato: G02 architettura (Activity ha le correzioni): 01-architecture-patterns, 01-confidence-bootstrap, 13, 14, 43. Prompt eseguiti: 40 canonici MODULE/REF in ordine `shuf` (45 meno i 5 di G02). Script batch non scrittivi; i conteggi sono da `grep`/`find` nel modulo.

## Inventario

- app: Actions 29 file php (+`.gitkeep`), Adapters, Console, Contracts 2, Datas, Enums, Events 1, Exceptions, Filament (3 Resource: Activity, Snapshot, StoredEvent; 14 Pages), Http, Listeners 2, Models 7, Providers 3, Support, Traits, View. Nessuna cartella `Services`, `Jobs`, `Notifications`, `Livewire`.
- tests 151 file, lang 74 file (20 lingue), database/migrations 18 file (10 in root + sotto-cartella `_bak`).
- git log -3: `daddcada` (2026-09-30, messaggio `.`) unico commit sul path; 0 file non committati.

## Gate pesanti

| Gate | Esito | Evidenza |
|---|---|---|
| PHPStan config progetto (`/tmp/5259/phpstan-all.json`) | FAIL | 670 errori, 645 in tests/. Top: `method.internalClass` 237, `property.notFound` 109, `staticMethod.notFound` 80, `argument.type` 60, `method.nonObject` 57 |
| PHPStan + larastan (`phpstan-larastan.json`) | FAIL | 449 errori, 449 in tests/. Top: `method.internalClass` 237, `property.notFound` 103, `binaryOp.invalid` 44, `argument.type` 33, `callable.nonCallable` 11 |
| Pest | FAIL (crash) | `Pest\Exceptions\FatalException: A precedence rule was defined for Modules\Xot\Models\Traits\HasXotFactory::newFactory but this method does not exist` in `Modules/Activity/tests/Feature/TestActivityModel.php:32` (`use HasFactory, HasXotFactory { HasXotFactory::newFactory insteadof HasFactory; }`). `HasXotFactory` (HEAD di Xot, file non modificato) espone solo `factory()` (riga 36): la suite non termina, nessun conteggio test. Causa nel modulo Xot, non in Activity |
| phpmd (`tools/phpmd.sh Modules/Activity`) | FAIL | ultime righe: `UnusedFormalParameter` su `$_attributes` in `SnapshotFactory` (62, 72) e `StoredEventFactory` (65, 75, 85); `LongVariable` in `ActivityMassSeeder.php:160` |
| phpinsights | FAIL | Architecture 70.5 pts su 159 file (Classes 52.2%, Interfaces 1.9%, Globally 44.0%, Traits 1.9%), Misc/style 89.1; errori: code quality, complexity, architecture, style "too low" |

## Prompt eseguiti

| Prompt | Controllo | Comando | Esito | Evidenza |
|---|---|---|---|---|
| 11-phpinsights | tool e config | `ls tools/phpinsights.sh phpinsights.php` | PASS | tool e config presenti; punteggi in sezione gate |
| 07-contracts | posizione contratti | `find app/Contracts`, `app/Models/Contracts` | FAIL | 2 in `app/Contracts` e 1 in `app/Models/Contracts` (convivono); 1 `*Interface.php` (`ActivityRecorderInterface`) |
| 45-full-module-audit | composito | esiti di questo report | FAIL | vedi righe sotto |
| 35-policies-permissions | policy vs model | `find -ipath '*Polic*'`; `grep -e "->can('"` | FAIL | 4 policy per 7 model, 0 `can()/authorize()` in app |
| 54-notify-handoff | solo Notify | n/a | N-A | prompt specifico Notify, 0 riferimenti ad Activity |
| 08-playwright-ui | route modulo raggiungibili | `curl -s -o /dev/null -w '%{http_code}' $APP_URL/activity/admin` | BLOCKED | `APP_URL=http://localhost`: 404 su `/activity/admin` (vhost diverso); nessun browser lanciato |
| 32-model-migration-factory-seeder | matrice | `ls app/Models`; `find database/*` | FAIL | 7 model, 5 factory, 6 seeder: 2 model senza factory |
| 39-composer-dependencies | validate | `composer validate --no-check-publish` (in modulo) | FAIL | valido con warning: `spatie/laravel-activitylog` con vincolo `*` |
| 36-events-jobs-notifications | mappa | `find app/{Events,Listeners,Jobs,Notifications}` | PASS | 1 Event, 2 Listener, 0 Job, 0 Notification, 0 Observer |
| 10-pest-xot-base-test | bootstrap Pest | `grep XotBaseTest tests/Pest.php`; `grep -rn '^uses(' tests` | FAIL | `tests/Pest.php` 0 occorrenze di `XotBaseTest` (carica solo `PestHelpers.php`); 80 `uses()` nei singoli file; classe `XotBaseTest` esiste solo in 7 file Xot |
| 29-testing-standards | stile test | `grep -rlE '^(it|test)\('`; `RefreshDatabase` | PASS | 84 file in stile Pest, 0 stile PHPUnit; 3 usi di `RefreshDatabase` (nota in `tests/TestCase.php:22`: usa sqlite condiviso, niente refresh) |
| 37-providers-container | base provider | `grep -rL XotBase app/Providers` | FAIL | `EventServiceProvider.php` senza base Xot; 0 bind/singleton |
| 24-boy-scout | un difetto locale | `grep TODO/FIXME/dd/@mixin` | PASS | 0 TODO, 0 `dd/dump`, 0 `@mixin Eloquent`; da PHPStan: `property.notFound` nei test |
| 10-ponytail-audit | interfacce a una impl., Actions morte | loop `grep -rl` | PASS | candidati: `ActivityRecorderContract` e `ActivityRecorderInterface` (<=1 implementazione), Action `CheckActivityLogWritableAction` (1 solo riferimento). Nessuna cancellazione |
| 12-documentation | README/index, cronologia | `ls docs/README.md docs/index.md`; `grep -il changelog` | FAIL | README presente; `index.md` e `INDEX.md` entrambi; 24 file con cronologia/changelog; `CHANGELOG.md` in root |
| 11-phpstan | config immutata, ignore | `git diff --stat phpstan.neon*`; `grep phpstan-ignore` | FAIL | neon non modificato; 5 `@phpstan-ignore` in app (`ListLogActivities.php` 3, `HasSnapshots.php`, `HasEvents.php` `trait.unused`); 670/449 errori (gate) |
| 55-md-conventions | date nei nomi, frontmatter, root | `find docs -name '*.md'`; `head -1` | FAIL | 13 file con data nel nome; 545/806 md senza frontmatter; 2 md in root (ok); 0 `.txt` |
| 44-module-docs-continuous | docs vs codice | `git log -1 -- docs`, `-- app` | PASS | docs e app toccati 2026-09-30; 0 modifiche non committate |
| 25-services-to-actions | Services, QueueableAction | `find -name Services`; `grep -L QueueableAction app/Actions` | PASS | 0 `Services`, 0 `*Service`; 1 Action senza `QueueableAction`: `ActivityLogger.php` |
| 42-delete-obsolete | candidati | `find -name '*.bak' -o '*.old' -o '*.disabled*'` | PASS (report) | 0 candidati nel modulo; `laravel/_ide_helper.old` in root app (fuori modulo); resta la cartella `database/migrations/_bak` (README + 1 migration) |
| 06-filament-audit | Resource vs base Xot | `find Filament -name '*Resource.php'`; `grep -rL XotBase` | PASS | 3 Resource, 14 Pages, 0 senza base Xot |
| 34-factories-seeders-audit | rand, idempotenza | `grep rand database`; `grep firstOrCreate` | FAIL | 5 factory, 6 seeder; 3 `rand()` in `ActivityMassSeeder.php:69,99,134`; 0 seeder con `firstOrCreate/updateOrCreate/upsert` |
| 97-YAML-FRONTMATTER | parse YAML docs | python `yaml.safe_load` | FAIL | 261 con frontmatter, 1 invalido: `docs/concepts/xotbase-never-extend-filament.md` |
| 22-ide-helper | pacchetto presente | `grep -c ide-helper laravel/composer.json`; `php artisan list` | FAIL | 0 occorrenze in `laravel/composer.json`, ma `vendor/barryvdh/laravel-ide-helper` presente (richiesto da `Modules/Xot/composer.json`) e 3 comandi `ide-helper:*` in artisan: il controllo del prompt punta al file sbagliato; `_ide_helper.old` in `laravel/` |
| 53-tdd-fonti-esterne | HTTP reali nei test | `grep 'Http::fake'` | N-A | 0 chiamate HTTP in app e 0 `Http::fake`; 45 file fixture |
| 04-datas-not-dtos | cartelle vietate | `find app -name Data -o -iname 'DTO*'` | PASS | `app/Datas` presente, 0 `Data/`, 0 `*Dto.php` |
| 23-optimize | cache | `php artisan about --only=cache` | PASS | config/events/routes NOT CACHED, views CACHED |
| 07-documentation-standards | link, nomi progetto | script python sui link relativi `.md` | FAIL | 1818 link relativi, 891 rotti; 59 file con `Fixcity/Ptvx` |
| 33-migrations-audit | duplicati | `grep Schema::create` | PASS | 10 migration, nessuna `Schema::create` duplicata (le migration usano la base Xot); falso positivo iniziale del mio uniq (0 match) |
| 02-controller-to-folio | Controller, Folio, route | `find Http/Controllers`; `grep Controller::class routes` | PASS | 0 controller, 0 Folio, 0 route verso controller |
| 03-quality-gates | pint, marker | `pint --test Modules/Activity` | FAIL | 1 file: `tests/fixtures/CanPaginateHarness.php` (`phpdoc_separation`); 5 `@phpstan-ignore`; gate pesanti in sezione gate |
| 38-config-routes-views | env(), route, testo | `grep 'env('`; `php -l routes` | PASS | 0 `env()` fuori config, `api.php` e `web.php` ok, 0 testi hard-coded nei blade |
| 50-trigger-operativi | citato da 00-start | `grep -c 50-trigger bashscripts/docs/prompts/00-start.md` | FAIL | 0 citazioni (il file esiste); il prompt non cita Activity |
| 21-translations | lang, hard-coded | `ls lang`; `grep -e "->(label|title)('"` | PASS | 20 lingue, 0 errori `php -l`, 0 stringhe hard-coded nei metodi label/title/placeholder |
| 20-filesystem-before-assertions | file reali | `grep assertFile|file_exists tests` | PASS | 8 asserzioni su file, 12 uso di `base_path/__DIR__`, 0 `Storage::fake`: sono lettura del sorgente, non scrittura |
| 52-mappa-proprieta-docs | area -> docs | `find docs -iname '*<area>*'` | FAIL | actions 7, models 3, filament 44, lang 5, database 8, tests 5 (nessuna pagina `tests` come mappa di proprieta') |
| 09-migrations | nome, base, drop | `ls migrations`; `grep XotBaseMigration` | FAIL | `2026_02_13_171410_fix_causer_id_to_uuid.php` non segue `create_*_table`/`update_*_table`; `migrations/_bak/2026_07_01_000000_update_activity_log_schema.php` senza `XotBaseMigration`; 0 drop; `migrate:refresh` solo in un commento (`tests/TestCase.php:22`) |
| 26-actions-architecture | execute, return type | `grep -L 'function execute' app/Actions` | FAIL | `ActivityLogger.php` senza `execute()` (classe di supporto, non Action) |
| 19-docs-second-brain | duplicati, qmd | `uniq -d basename`; `qmd search` | FAIL | 111 basename duplicati (es. `index.md`/`INDEX.md`); `docs/wiki/index.md` assente; qmd risponde |
| 28-livewire-to-widgets | residui Livewire | `find -path '*Livewire*'`; `grep Livewire::component` | N-A | 0 Livewire, 0 widget nel modulo |

## Difetti dei prompt

- 22-ide-helper: controlla `grep ide-helper laravel/composer.json` (0) ma il pacchetto e' dichiarato in `Modules/Xot/composer.json` e installato in `vendor/barryvdh`; i comandi `ide-helper:*` esistono. Proposta: precondizione `php artisan list | grep -c ide-helper` (>0) oppure `composer show barryvdh/laravel-ide-helper`.
- 10-pest-xot-base-test: chiede `XotBaseTest` in `tests/Pest.php`, ma Activity usa `uses()` per file (80) e `Pest.php` solo come helper. Proposta: sostituire con "ogni file di test dichiara la base via `uses()`" e verificare `grep -rL '^uses(' tests`. Aggiungere il passo "se il Pest crasha per un trait Xot, esito BLOCKED con causa" (qui `HasXotFactory::newFactory` mancante).
- 09-migrations: il pattern `create_*_table`/`update_*_table` boccia `fix_*`; la cartella `_bak` e' presente nel modulo e il prompt non dice se va esclusa. Proposta: ammettere `fix_`/`add_`/`drop_` e dichiarare `_bak` fuori scope.
- 11-phpstan/03-quality-gates: citano `phpstan.neon.dist` e `--memory-limit=2G`; esistono `phpstan.neon` e `phpstan.neon.dist`. Proposta: un solo file e `--memory-limit=-1` con `heavy-slot.sh`. Aggiungere che gli errori nei tests/ (qui 645 su 670) vanno contati a parte.
- 07-contracts: impone `Models/Contracts`, ma Activity ha contratti in entrambe le cartelle (2 + 1). Proposta: decidere una sola posizione e dare il comando di verifica con soglia.
- 28-livewire, 06-filament, 53-tdd, 36: nessuna regola N-A esplicita quando il modulo non ha widget/HTTP/Job. Proposta: "se `find` e' vuoto, esito N-A".
- 26-actions-architecture: tratta ogni classe in `app/Actions` come Action con `execute()`; `ActivityLogger.php` e' una classe di supporto. Proposta: ammettere eccezioni dichiarate o spostarle in `Support/`.
- 33-migrations-audit: il controllo duplicati con `Schema::create` non vede le migration che usano `tableCreate` della base Xot. Proposta: cercare entrambe le forme.
- 50-trigger-operativi: "citato da 00-start" non e' piu' vero dopo la dedup (0 citazioni nel 00-start corrente, mentre il report UI aveva PASS). Proposta: aggiornare 00-start oppure togliere il controllo.
- 07-documentation-standards, 55, 19, 12: stessi difetti gia' registrati in matrix-UI (link fuori modulo, `CHANGELOG.md`, basename duplicati, `docs/wiki/index.md` assente); confermati anche su Activity.
- Convenzioni di catalogo: `rg` non e' nel PATH degli script (funzione di shell); la shell di Claude e' zsh e `--include=*.php` va in "no matches found" se non e' tra apici: indicare `bash -c` e apici.
