# Matrice G13 X4: modulo UI

Agente X4, sola lettura, 2026-10-01. Gruppo saltato: G06 testing (UI ha le correzioni). Prompt eseguiti: 41 canonici MODULE/REF (45 meno i 4 di G06). Esecuzione in batch di script, indipendenti tra loro: l'ordine `shuf` non ha effetto su controlli di sola lettura.

## Inventario

- Struttura: app (Actions 8 file di cui 2 `.disabled`, Datas 4, Data/ 1, Filament/Resources 2 file senza Resource, Models 7, Services 5, Contracts 3, Livewire 1, Http/Controllers 1), tests 79 file, lang 211 file (13 lingue), database/migrations 4.
- Root modulo: 6 `.md`, 2 `.code-workspace`, cartella `View/` maiuscola.
- git log -3: a72e6b0, 6bcab0a (2026-09-30), 4eedefc (2026-09-29), tutti con messaggio `.`; 1 file modificato non committato.
- Pacchetto reale: `composer.json` richiede solo `owenvoke/blade-fontawesome:*` e `blade-ui-kit/blade-heroicons`.

## Gate pesanti

GATES_UI

## Prompt eseguiti

| Prompt | Controllo | Comando | Esito | Evidenza |
|---|---|---|---|---|
| 55-md-conventions | date nei nomi, frontmatter, root | `find docs -name '*.md' \| grep -E '[0-9]{4}-...'`; `head -1` | FAIL | 8 file con data nel nome; 360/887 md senza frontmatter; 6 md in root (soglia prompt 5); 0 `.txt`; `diff --check` vuoto |
| 97-YAML-FRONTMATTER | parse YAML docs modulo | python `yaml.safe_load` | FAIL | 527 con frontmatter, 5 invalidi: `docs/multi-org-sync-laraxot-provtv.md`, `docs/geo-dependency-violation-interactive-map.md` |
| 01-architecture-patterns | Migration base, Services, DTO, lang | `rg --files-without-match XotBaseMigration`; `find -name Services` | FAIL | migration 3/3 con base (PASS); `app/Services` esiste (5 file); 0 DTO (solo `docs/datas-not-dtos-convention.md`); 209 lang php -l ok |
| 01-confidence-bootstrap | git root, igiene, workspace | `audit-module-root-hygiene.sh`, `audit-module-workspaces.sh` | FAIL | `View/` maiuscola; 2 workspace (`_module_ui_fila5`, `ui`) invece di 1 |
| 13-path-and-naming | Config, Listeners, autoload files, persist | `ls -d Config config`; find | FAIL | solo `config/` (PASS); 0 listener fuori app; `autoload.files` assente; 0 `persist`; cartella `View/` maiuscola in root |
| 14-module-dependency | import di moduli di dominio | `rg -P -oNI 'use Modules\\(?!UI\\)\w+'` | FAIL | 99 Xot (ok), 1 `Modules\User` (`Actions/GetUserDataAction.php`), 2 `Modules\Geo` (`Livewire/Components/Map/InteractiveMap.php`, modulo inesistente); doc `docs/geo-dependency-violation-interactive-map.md` |
| 43-php-files-structure | sintassi, `<?php`, strict_types, namespace, multi-classe | `php -l`; `head -c5`; `rg --files-without-match` | PASS | 0 errori su tutti i php; 121/121 con strict_types; 0 namespace mismatch; 0 file multi-classe |
| 02-controller-to-folio | Controller, Folio, route | `find Http/Controllers`; `rg Controller::class routes` | FAIL | 1 controller (`LanguageController.php`); 0 pagine Folio; 0 route verso controller |
| 25-services-to-actions | Services, `*Service`, QueueableAction | `find -name Services`; `rg 'class \w+Service'` | FAIL | 5 classi (`UIService`, `ThemeService`, `ComponentService`, `NullMapService`, `NullGeocodingService`) in `app/Services`; 3 file referenziano `Services\`; 8 Actions (6 attive) tutte con QueueableAction |
| 26-actions-architecture | execute, return type, logica UI, test | `rg --files-without-match`; loop su Actions | FAIL | execute presente 6/6, 0 senza return type, 0 logica UI; 2/6 Actions senza riferimento nei test |
| 04-datas-not-dtos | cartelle e suffissi vietati | `find -iname dtos -o -name Data` | FAIL | esiste `app/Data/UserData.php` (cartella `Data` vietata dal prompt, accanto a `app/Datas`); 0 `*Dto.php`; 0 residui DTO |
| 07-contracts | posizione contratti | `find app/Contracts`; `find Models/Contracts` | FAIL | 3 file in `app/Contracts` (`MapServiceContract`, `GeocodingServiceContract`, `HasTableLayout`); `Models/Contracts` assente; 0 `*Interface.php` |
| 28-livewire-to-widgets | Livewire residui, widget base | `find -path '*Livewire*'`; `rg Livewire::component` | FAIL | 1 componente `Livewire/Components/Map/InteractiveMap.php` + 2 blade livewire; 15 widget, 0 senza base Xot; 0 `Livewire::component` |
| 06-filament-audit | Resource Form/Infolist/Table | `find Resources -name '*Resource.php'` | N-A | 0 Resource (solo `.gitkeep`, `Pages/BaseListRecords.php`); PHPStan modulo: vedi gate |
| 08-playwright-ui | app raggiungibile, route modulo | `curl -sI $APP_URL`; `curl .../ui/admin` | BLOCKED | `APP_URL` risponde 200 ma `/ui/admin` e `/media/admin` danno 404 (vhost diverso); `route:list` mostra `ui/admin`; nessun browser lanciato |
| 03-quality-gates | pint, phpstan, pest, phpinsights, marker | `pint --test Modules/UI` | FAIL | pint: 6 file da correggere (`phpdoc_separation`, `phpdoc_align`, `single_line_empty_body`, `single_blank_line_at_eof`); gli altri gate: vedi sezione gate; 0 marker |
| 11-phpstan | config immutata, errori, ignore | `git -C laravel diff --stat phpstan.neon`; phpstan | FAIL | 131 errori (vedi gate); il prompt cita `phpstan.neon.dist`, il canonico e' `laravel/phpstan.neon` |
| 11-phpinsights | punteggio | `tools/phpinsights.sh` | vedi gate | GATES_PI_UI |
| 10-ponytail-audit | interfacce a una impl., Actions morte | `rg 'implements'`; loop `rg -l` | PASS | candidati: `HasTableLayoutPage` (0 impl.), `GetAllBlocksAction` (1 solo riferimento). Nessuna cancellazione |
| 24-boy-scout | un difetto locale | lettura phpstan | PASS | `Models/Category.php:46` e `Collection.php:56`: `@mixin Eloquent` classe sconosciuta (ide-helper assente), 2 errori `class.notFound` |
| 22-ide-helper | pacchetto presente | `grep -c ide-helper laravel/composer.json` | FAIL | 0 occorrenze: il pacchetto non e' in `composer.json`; il prompt non e' eseguibile e i modelli usano `@mixin Eloquent` |
| 23-optimize | cache e route | `php artisan about --only=cache`; `route:list --path=ui --json` | PASS | config/events/routes NOT CACHED, views CACHED; route `ui/admin` presente |
| 09-migrations | nomi, base, drop, refresh | `ls migrations \| grep -vE ...`; `rg` | PASS | 3 migration `2026_07_15_1000xx_create_*_table.php` con XotBaseMigration; 0 drop; 0 refresh in codice (solo un commento in `tests/TestCase.php:23`) |
| 21-translations | lang, hardcoded, 5 elementi | `ls lang`; `rg -e "->(label\|title...)\('[A-Za-z]"` | FAIL | 13 lingue; 4 stringhe hard-coded (di cui 1 commento); 12 `trans()` non a 5 elementi; 170 file lang con `navigation`; 0 errori `php -l` |
| 32-model-migration-factory-seeder | matrice | loop su Models | PASS | Category, Collection, FieldOption: factory 1, seeder 2; `BaseModel` astratto senza seeder (giustificato) |
| 33-migrations-audit | duplicati/owner | `ls migrations` | PASS | 3 create distinte, 1 per modello |
| 34-factories-seeders-audit | factory, rand, idempotenza | `find`; `rg -c 'firstOrCreate\|updateOrCreate' database/seeders` | FAIL | 4 factory, 4 seeder, 0 `rand/random`; 0 uso di `firstOrCreate/updateOrCreate` nei seeder (non idempotenti) |
| 35-policies-permissions | policy, stringhe permesso | `find Policies`; `rg -e "->can\('"` | FAIL | 1 policy (`UiBasePolicy`) per 4 model; 0 `can()/authorize()` in app |
| 36-events-jobs-notifications | mappa | `find app/{Events,...}` | N-A | 0 Events/Listeners/Jobs/Notifications |
| 37-providers-container | base provider, binding | `rg --files-without-match` | FAIL | `EventServiceProvider.php` senza base Xot; 4 provider totali |
| 38-config-routes-views | env(), route, testo hard-coded | `rg 'env\('`; `php -l routes` | FAIL | 0 `env()` fuori config, 2 route file ok; 303 testi hard-coded nei blade (regex `>[A-Z][a-z]+ [a-z]+<`, molti falsi positivi attesi) |
| 39-composer-dependencies | validate, autoload, require | `composer validate --no-check-publish` | FAIL | valido con warning: `owenvoke/blade-fontawesome:*` non vincolato; autoload PSR-4 ok; script `post-autoload-dump1` (typo) |
| 07-documentation-standards | link, nomi progetto | script python link relativi | FAIL | 4980 link relativi, 2814 rotti (es. `docs/opening-hours-translation-fix.md -> ../../../../docs/translation_standards_links.md`); 21 file con `Fixcity/Ptvx/PTVX` |
| 12-documentation | README/index, cronologia, YAML | `ls docs/README.md docs/index.md`; `rg -il changelog` | FAIL | README e index presenti; 53 file con cronologia/changelog; 5 YAML invalidi |
| 19-docs-second-brain | duplicati, qmd | `uniq -d basename`; `qmd search` | FAIL | 66 basename duplicati (`00-index.md`/`00-INDEX.md`, `AGENTS.md`, `api.md`, `architecture.md`); `docs/wiki/index.md` MISSING |
| 42-delete-obsolete | candidati | `find -name '*.bak' -o ...` | PASS (report) | 7 candidati: `UserCalendarWidget.php.{fila3,disabled,disabled2}`, `LocationSelector.php.{old,to_geo}`, `ApplyCalendarToPanelAction.php.disabled`, `InteractiveMap.php.old`; gemelli case: `.github/CONTRIBUTING.md`, `docs/00-INDEX.md`, `docs/ARCHITECTURE.md` e altri |
| 44-module-docs-continuous | docs vs codice | `git log -5 -- docs`, `-- app` | PASS | docs toccata 2026-09-30 (a72e6b0), app 2026-09-29; 0 modifiche docs non committate |
| 52-mappa-proprieta-docs | area -> pagina docs | `ls -R docs \| grep -ic area` | FAIL | actions 11, models 1, filament 87, lang 6, database 1, tests 0 |
| 45-full-module-audit | composito | esiti sopra | FAIL | tutti i rilievi sopra con path e comando; matrice area->evidenza gia' in tabella |
| 50-trigger-operativi | citato da 00-start | `grep 50-trigger-operativi 00-start.md` | PASS | 00-start cita il file |
| 54-notify-handoff-storico | solo Notify | n/a | N-A | prompt specifico per Notify |

## Difetti dei prompt

Difetti comuni a UI e Media (verificati eseguendo i comandi):

- Tutti i prompt con `rg -L '<pat>'` (01-architecture, 25, 26, 04, 06-filament, 09, 28, 37, 43): in ripgrep `-L` e' `--follow`, non "file senza match". Il comando elenca tutti i file e il controllo "=> vuoto" non puo' mai passare. Proposta: sostituire ovunque con `rg --files-without-match '<pat>' <path>`.
- `rg` non e' nel PATH degli script non interattivi (e' una funzione della shell di Claude). Proposta: nelle convenzioni di catalog/prompt scrivere "usare `rg` del PATH; se assente `grep -rL`/`grep -rn`" e prevedere il fallback.
- 21 e 35: pattern che iniziano con `->` (`rg -n "->(label|title...)"`, `rg -n "->can\('"`) vengono letti come flag (`unrecognized flag ->`) e il controllo da' 0 falso. Proposta: `rg -n -e "->(label|...)\('[A-Za-z]"`.
- 43 punto 2: `rg -l --pcre2 '\A(?!<\?php)'` dà falsi positivi (rg cerca riga per riga, `\A` combacia a ogni riga): segnala file corretti. Proposta: `for f in $(find app -name '*.php'); do head -c5 "$f" | grep -q '^<?php' || echo "$f"; done`.
- 14: regex `use Modules\\(?!UI|Xot)` richiede `-P`/`--pcre2` e esclude solo i prefissi; il prompt cita la regola "Geo -> UI" ma Geo non esiste. Proposta: generalizzare a "`<Mod>` importa solo se stesso, Xot e i moduli dichiarati in `composer.json`" con comando `rg -P -oNI 'use Modules\\(?!<Mod>\\)\w+' app | sort | uniq -c`.
- 07-contracts: impone `Models/Contracts` ma nessun modulo la usa in modo prevalente: Xot ha 23 file in `app/Contracts`, User 24, Notify 12 (+1 in `Models/Contracts`), UI 3, Media 2; `Models/Contracts` e' presente solo in Lang e Notify (1 file ciascuno). La convenzione reale e' `app/Contracts`. Proposta: riscrivere la regola come "`app/Contracts/*Contract.php`" e lasciare `Models/Contracts` solo per i contratti di Model.
- 25-services-to-actions e 01-architecture: vietano `app/Services`, ma `Services/` e' presente in Xot, UI, Media, Lang, Notify. Proposta: aggiungere sezione "eccezioni ammesse" (adapter/null object di contratti) e un criterio verificabile con `rg -n 'class \w+Service'` senza facciata verso Actions.
- 55 e 00-start: max 5 `.md` in root contro soglia 6 dello script `audit-module-root-hygiene.sh`; UI ne ha 6. Proposta: allineare prompt e script a un solo numero.
- 22-ide-helper: il pacchetto non e' in `laravel/composer.json` (0 occorrenze) e `php artisan list` non ha comandi `ide-helper`; in compenso 2 modelli usano `@mixin Eloquent` e PHPStan segnala `class.notFound`. Proposta: spostare il passo "verifica pacchetto" come precondizione con esito N-A, e aggiungere il controllo `rg -n '@mixin Eloquent'` come difetto.
- 11-phpstan e 03-quality-gates: citano `laravel/phpstan.neon.dist`/`phpstan.neon`; il canonico dichiarato dal coordinatore e' `laravel/phpstan.neon` (esistono entrambi). Comando da usare: `--memory-limit=-1` invece di `2G`. Proposta: indicare un solo file e il comando completo con `heavy-slot.sh`.
- 08-playwright-ui: `APP_URL` risponde 200 ma le route del modulo (`/ui/admin`, `/media/admin`) danno 404 (vhost diverso da quello del repository). Proposta: aggiungere precondizione `curl -s -o /dev/null -w '%{http_code}' $APP_URL/<mod>/admin` con 200/302 e altrimenti BLOCKED.
- 10-pest-xot-base-test: pretende `XotBaseTest` in `tests/Pest.php`; la classe non esiste (Xot ha `XotBasePest`, `XotBaseTestCase`) e il commento di `Media/tests/Pest.php` dichiara che il file non viene caricato. Proposta: sostituire con `XotBasePest`/`uses(<Mod>\Tests\TestCase::class)` per file e controllare con `rg -L` corretto.
- 34/32: il prompt non dice quale cartella `database/factories` o `HasXotFactory` aspettarsi; il controllo di idempotenza (`firstOrCreate|updateOrCreate`) fallisce in entrambi i moduli: o i seeder sono davvero non idempotenti o la regola e' troppo rigida. Proposta: ammettere `truncate`/`upsert` e definire il criterio.
- 07-documentation-standards: il controllo link rompe ovunque (UI 2814 su 4980, Media 493 su 732) perche' molti link puntano a `docs/` di root o a file spostati. Proposta: limitare il controllo ai link verso file dentro il modulo e trattare i link fuori modulo come warning.
- 12-documentation: vieta "cronologia", ma ogni modulo ha `CHANGELOG.md` e docs con "Aggiornato il". Proposta: dire esplicitamente che `CHANGELOG.md` e' ammesso e restringere la regex alle sezioni.
- 19-docs-second-brain: richiede `docs/wiki/index.md` (MISSING; reale `bashscripts/ai/wiki/`) e "nessun duplicato", ma `00-index.md`/`00-INDEX.md` e `AGENTS.md` sono duplicati per basename in sottocartelle diverse. Proposta: confrontare path relativi o ammettere basename ripetuti per `README/index/AGENTS`.
- 54-notify-handoff-storico e 06-filament-audit su moduli senza Resource: nessuna indicazione N-A (UI ha 0 Resource). Proposta: aggiungere "se `find Resources` e' vuoto, esito N-A".
- 45-full-module-audit: elenca 14 prompt da rieseguire senza dire come ordinare gli esiti ne' come gestire gli N-A. Proposta: tabella di output con colonna "N-A motivato" e priorita'.
- 97-YAML-FRONTMATTER: per UI/Media il YAML dei docs e' invalido in 5 e 12 file; il prompt non specifica se vale per i docs di modulo o solo per i prompt. Proposta: indicare lo scope.

Difetti specifici di UI:

- 04-datas-not-dtos: vieta `Data/`, ma `app/Data/UserData.php` convive con `app/Datas`; il prompt non dice come migrare. Proposta: comando di verifica e regola "spostare in `Datas/` e aggiornare namespace".
- 14-module-dependency: UI importa `Modules\Geo` (modulo inesistente) in `Livewire/Components/Map/InteractiveMap.php`; nessun controllo "import verso moduli inesistenti". Proposta: aggiungere `for m in $(rg -P -oNI 'use Modules\\\K\w+' app | sort -u); do test -d ../$m || echo MISSING $m; done`.
- 42-delete-obsolete: l'elenco estensioni (`.bak|.old|*copy*`) non prende `.disabled`, `.disabled2`, `.fila3`, `.to_geo`, presenti in UI. Proposta: aggiungere `*.disabled* *.fila3 *.to_*`.

