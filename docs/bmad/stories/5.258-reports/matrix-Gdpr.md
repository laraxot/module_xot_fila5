---
title: Matrice G13 modulo Gdpr
role: report di sola lettura (agente X2)
scope: laravel/Modules/Gdpr
---

# Matrice G13: modulo Gdpr

Agente X2, 2026-10-01. Sola lettura. Esclusi i prompt del gruppo G03 (02, 25, 26, che hanno Gdpr con correzioni). Eseguiti 42 prompt canonici MODULE/REF in ordine `shuf`.

## Inventario

- Struttura: `app/{Actions,Console,Datas,Enums,Filament,Http,Listeners,Models,Providers,View}`. Nessun `Services`, nessun Controller, nessun `Policies` in `app/` (le 5 policy stanno in `app/Models/Policies`).
- Conteggi file php: Actions 7, Datas 1, Filament/Resources 28 (4 Resource), Models 14 (di cui 3 base e 1 probe), tests 42, lang 39 file (cookie-consent, de en es fr it ru), migrations 10, factories 4, seeders 6, Providers 4.
- docs: 344 file `.md`. Root modulo: 13 `.md`, 3 `.code-workspace`, cartella maiuscola `View/`.
- Git: 3 commit totali nel repo del modulo (storia schiacciata, 667 file nel primo), messaggio `.`. Dirty: 1 voce. `git log -S` non e' utilizzabile per ricostruire convenzioni.
- Second brain: `qmd search "Gdpr module"` restituisce solo handoff generici (`qmd://chat/pest-swarm-wave-results.md`), nessuna regola Gdpr.

## Gate pesanti

Strumenti: `rg` NON e' un binario (e' una funzione shell dell'ambiente Claude), quindi gli script bash dei prompt falliscono con "command not found" e restituiscono 0 risultati: falsi PASS. Ho usato un wrapper temporaneo in `/tmp/x2/bin/rg`, fuori dal repo.

| Gate | Comando | Esito |
|---|---|---|
| PHPStan | `heavy-slot.sh ./vendor/bin/phpstan analyse Modules/Gdpr --no-progress` (config usata: `laravel/phpstan.neon`, non `.dist`) | FAIL, 249 errori: 218 in `tests/`, 31 in `app/` |
| Pest | `HEAVY_SLOTS=1 ... pest --test-directory=Modules/Gdpr/tests Modules/Gdpr/tests --no-coverage` | FAIL, 0 test eseguiti: `Pest\Exceptions\TestCaseAlreadyInUse` su `tests/Feature/Auth/RegisterPageTest.php` |
| PHPInsights | `heavy-slot.sh ./tools/phpinsights.sh Modules/Gdpr --format=console --summary` | FAIL (exit 1): code 91.7, complexity 99.7, architecture 82.3, style 95.1; soglie code, architecture, style non raggiunte |
| PHPMD | `./tools/phpmd.sh Modules/Gdpr` | FAIL (exit 2), 57 violazioni in app/ |
| Pint | `vendor/bin/pint --test Modules/Gdpr` | FAIL, 57 file |

Primi 5 errori PHPStan per tipo: `staticMethod.notFound` 70, `property.nonObject` 69, `method.nonObject` 48, `argument.type` 32, `method.internalClass` 12. I primi tre (187 su 249) sono tipici di Larastan disabilitato: in `laravel/phpstan.neon` la riga `larastan/extension.neon` e' commentata (`.dist` la include), quindi `Treatment::whereIn()` e simili sono falsi positivi della config, non difetti del modulo. Errori reali in `app/`: `argument.type` su `Notification::title()/body()` ricevono array (`app/Actions/Registration/Handle*Action.php`).

PHPMD per regola: UnusedFormalParameter 22, CamelCaseParameterName 17, CamelCasePropertyName 15, LongVariable 2, MissingImport 1. Pint: `new_with_parentheses` 20, `phpdoc_align` 14, `fully_qualified_strict_types` 12, `unary_operator_spaces` 11.

Causa del Pest rotto: `tests/Pest.php` fa `pest()->extend(TestCase)->in(Unit, Feature)` e 36 file su 35 `*Test.php` dichiarano anche `uses(TestCase::class)`: doppio binding.

## Prompt eseguiti

| Prompt | Controllo | Comando | Esito | Evidenza |
|---|---|---|---|---|
| 38-config-routes-views | env fuori da config, sintassi route, testi hard-coded | `rg 'env\(' app routes resources`; `php -l routes/*.php`; rg `>[A-Z][a-z]+ [a-z]+<` | PASS | 0 `env()`, 2 route ok, 0 testi nelle view |
| 33-migrations-audit | base, nomi, doppioni | `rg --files-without-match XotBaseMigration`; `ls database/migrations` | FAIL | tutte con XotBaseMigration, ma 4 file `create_consents_table` (prefissi `000001`, `000002`, `000005`, `000006`) e 3 file con prefisso `000001`; dir `_archive_redundant` dentro migrations |
| 45-full-module-audit | composito (02/25/26, 04, 07, 09, 21, 28, 06, 35, 36, 37, 38, 43, PHPStan) | vedi righe singole | FAIL | rilievi: PHPStan 249, Pest non parte, Pint 57, workspace 3, root 13 md; nessun comando del prompt produce la matrice area-rischio: va costruita a mano |
| 14-module-dependency-direction | import tra moduli | `rg -o 'Modules\\[A-Za-z]+' app` | PASS | Gdpr 160, Xot 69, User 19, Tenant 1; Xot e User non importano Gdpr |
| 42-delete-obsolete-files-safely | candidati `.bak/.old/copy`, gemelli | `find`, `sort -f | uniq -di` | PASS | 0 `.bak`; gemelli `docs/00-INDEX.md` e `docs/00-index.md` da segnalare (non cancellati) |
| 35-policies-permissions-audit | policy per Model/Resource | `find app/Policies`; `find app -path '*Policies*'` | PASS (con difetto prompt) | `app/Policies` assente ma 5 policy in `app/Models/Policies` (4 Resource, 4 Model); test `tests/Unit/Policies/GdprPoliciesPermissionTest.php`; 0 stringhe `->can(` |
| 37-providers-container-bindings | base provider, binding | `rg --files-without-match XotBase app/Providers` | PASS | 4 provider tutti su XotBase* (Service, Route, Event, Panel); 0 `bind/singleton`; 0 `Services\` |
| 55-md-conventions | root, date, frontmatter, txt | `ls *.md`; `find docs` | FAIL | 13 `.md` in root (max 5 per prompt, 6 per script), 3 file docs con data nel nome, frontmatter ok su 344, 0 `.txt`, `git diff --check` pulito |
| 44-module-docs-continuous | docs aggiornate con il codice | `git log -10 --stat -- docs` | N-A | storia di 3 commit squashed: confronto impossibile |
| 23-optimize | cache e rotte | `php artisan about --only=cache`; `route:list --path=gdpr --json` | PASS | config/events/routes NOT CACHED, views cached; rotta `gdpr/admin` presente |
| 20-filesystem-before-assertions | path asseriti esistono | `rg 'class_exists|file_exists|is_file|is_dir' tests`; `base_path(...)` | PASS | 0 asserzioni su filesystem |
| 53-tdd-fonti-esterne | coverage, regressioni | `php -m | grep xdebug|pcov`; `ls docs/coverage.md` | PASS | pcov o xdebug presente (2 match), `docs/coverage.md` esiste; 36 file test toccati negli ultimi commit (storia squashed) |
| 09-migrations | base, nomi, down, fresh | `ls`, `rg migrate:fresh` | FAIL | nomi: 1 voce fuori formato (`_archive_redundant`); `RefreshDatabase|migrate:fresh` 4 match, tutti commenti in `tests/TestCase.php` (falso positivo del grep); doppioni come in 33 |
| 32-model-migration-factory-seeder | matrice per Model | loop del prompt | PASS | Consent, Event, Profile, Treatment: factory 1, seeder 1-2, test 5-16; BaseModel/BasePivot/BaseMorphPivot e `GdprPhpstanTraitProbe` senza factory (base/probe giustificabili; il probe in `app/Models` e' sospetto) |
| 43-php-files-structure | sintassi, strict_types, namespace | `php -l`, rg | PASS | 0 errori sintassi, 0 file senza `strict_types`, 0 file con piu' classi, 0 namespace diversi dal path |
| 12-documentation | README/index, link, cronologia | `ls docs/README.md docs/index.md`; script link | FAIL | README e index esistono; link relativi 296 di cui 148 rotti (es. `docs/dependencies.md -> ../../../../docs/dependencies.md`); 22 match `changelog|Aggiornato il` |
| 06-filament-audit | Schemas/Tables per Resource | find, rg | PASS | 4 Resource con Form 1, Infolist 1, Table 1; 0 senza XotBaseResource; 0 estensioni dirette Filament |
| 54-notify-handoff-storico | solo Notify | n/a | N-A | prompt specifico di Notify |
| 22-ide-helper | pacchetto e comandi | `grep ide-helper laravel/composer.json`; `php artisan list` | PASS | 0 match in composer.json root ma 5 comandi `ide-helper` registrati: il pacchetto arriva da un composer di modulo (grep del prompt sbagliato) |
| 08-playwright-ui | app raggiungibile | `curl -sI $APP_URL` | BLOCKED | `APP_URL=http://localhost` risponde 200, ma non c'e' utente seed ne' browser in sola lettura |
| 28-livewire-to-filament-widgets | Livewire residui, widget | find, rg | PASS | 0 file Livewire, 0 `Livewire::component`; 4 widget; 2 match `livewire:` da verificare (uso legittimo nei widget) |
| 50-trigger-operativi | citato da 00-start | `grep 50-trigger bashscripts/docs/prompts/00-start.md` | FAIL | 0 citazioni; i trigger `refacto remember history fix study` stanno in `start.md`, `24-boy-scout.md`, `05-widget.md` |
| 52-mappa-proprieta-docs | area -> pagina docs | `ls docs | grep -i <area>` | FAIL | Actions 2, Models 2, Filament 9, lang 4, database 1, tests 0: manca la pagina docs per tests |
| 01-architecture-patterns | Services, DTO, lang, migration base | find, rg | PASS | 0 `Services`, 0 `*dto*`, 39 file lang senza errori sintassi |
| 10-ponytail-audit | candidati YAGNI | rg | PASS | 0 interfacce con una sola impl, candidato morto `UpdateGdprConsentsAction` (1 sola occorrenza); config 122+11 chiavi |
| 36-events-jobs-notifications | mappa eventi | find, rg | PASS | Events 0, Listeners 1 (`SaveGdprConsents`), Jobs 0, Notifications 0 |
| 11-phpstan | config immutata, ignore | `git diff --stat phpstan.neon*`; rg ignore | FAIL | 0 ignore in app, config non modificata; ma 249 errori (vedi gate) |
| 24-boy-scout | un difetto locale | lettura | PASS | `app/Actions/Registration/HandleRegistrationErrorAction.php:26`: `Notification::title()` riceve array invece di string; verifica PHPStan |
| 19-docs-second-brain | qmd, duplicati, yaml | `qmd search`; `uniq -d` | FAIL | qmd restituisce risultati ma non su Gdpr; 27 nomi file duplicati in docs (es. `00-INDEX.md`/`00-index.md`, `INDEX.md`); `docs/wiki/index.md` MISSING |
| 21-translations | lingue, hard-coded, chiavi | `ls lang`, rg | PASS | lingue de/en/es/fr/it/ru + `en.json it.json`; 0 label hard-coded; `lang/*.php` senza errori; 0 `.navigation` |
| 10-pest-xot-base-test | bootstrap, base | ls, rg | FAIL | `tests/Pest.php` presente, `pest.php` assente; `tests/TestCase.php` estende `XotBaseTestCase` (non `XotBaseTest`, che il prompt cerca in Pest.php); Pest non esegue (TestCaseAlreadyInUse) |
| 29-testing-standards | PHPUnit, RefreshDatabase, strict_types | rg | FAIL | 0 `extends TestCase`, 0 strict_types mancanti, 252 `it/test`; Pest rotto per doppio binding |
| 07-contracts | posizione contratti | find | PASS | 0 `app/Contracts`, 0 `*Interface.php`, 0 `Models/Contracts` |
| 11-phpinsights | punteggi | gate | FAIL | vedi gate (code 91.7, architecture 82.3) |
| 34-factories-seeders-audit | sintassi, random, idempotenza | find, rg | PASS | 4 factory, 6 seeder senza errori; 0 `rand`; 1 file con `firstOrCreate`; 10 file test usano factory |
| 07-documentation-standards | link, date, esempi agnostici | script | FAIL | 148 link rotti su 296, 3 nomi con data |
| 97-YAML-FRONTMATTER-CONVENTION | yaml su docs modulo | python yaml | FAIL | 344 file, 1 yaml non valido; campi richiesti mancanti: role 343, scope 338, execution 343, destructive_operations_allowed 343, completion_criteria 343 (convenzione smentita dai file) |
| 04-datas-not-dtos | cartelle e suffissi vietati | find, rg | PASS | 0 `Data/`, 0 `*Dto`, 1 Data valida in `app/Datas`, 0 residui `DTO` |
| 03-quality-gates | pipeline | Pint, PHPStan, Pest, Insights, PHPMD | FAIL | Pint 57 file, PHPStan 249, Pest non parte, Insights sotto soglia, PHPMD 57; 0 marker merge |
| 39-composer-dependencies | validate, autoload | `composer validate`; python | PASS | valid; PSR-4 `app/`, `database/factories/`, `database/seeders/` esistono; require: `statikbe/laravel-cookie-consent`; 6 script (`post-autoload-dump1` sospetto refuso) |
| 01-confidence-bootstrap | audit root e workspace | `audit-module-root-hygiene.sh`; `audit-module-workspaces.sh` | FAIL | MD-CAP (13 file md, max 6), UPPERCASE-DIR (`View/`), WORKSPACE 3 file (atteso 1); gli script `guard-module-hygiene.sh` e `run-all-gates.sh` non esistono |
| 13-path-and-naming-rules | Config, Listener, persist | ls, find, rg | PASS | solo `config/`, 0 Listener fuori da `app/`, autoload senza `files`, 0 `persist` |

## Difetti dei prompt

Trasversali (valgono per quasi tutti i prompt con `rg`):

1. `rg -L` nei comandi di catalog.md e dei prompt: in ripgrep `-L` e' `--follow`, non "files without match". Il comando restituisce quasi tutti i file e il controllo "vuoto" fallisce o passa a caso. Proposta: sostituire con `rg --files-without-match '<pattern>' <path>` (vale per 09, 06-filament-audit, 25, 28, 37, 04, 29, 36).
2. `rg` non e' un binario installato (funzione di shell dell'ambiente): negli script bash ogni `rg ...` stampa "command not found" e il conteggio e' 0, cioe' PASS falso. Proposta: nella sezione convenzioni aggiungere "se `command -v rg` fallisce, usare `grep -rEn`" oppure creare `bashscripts/tools/rg-wrapper.sh`.
3. `rg -o ... -h`: in ripgrep `-h` e' help. Usare `--no-filename`. `rg -l --pcre2 '\A(?!<\?php)'` (43): `\A` vale per riga, quindi matcha tutti i file (76 su 76). Proposta: `for f in $(find ...); do head -c5 $f | grep -q '^<?php' || echo $f; done`.
4. Config PHPStan: il catalog dice che `phpstan.neon` e' MISSING e che il neon reale e' `.dist`; oggi PHPStan usa `laravel/phpstan.neon` (che ha precedenza), con Larastan disattivato: 187 errori su 249 sono falsi positivi Eloquent. Proposta in 11-phpstan e 03: "la config attiva e' `laravel/phpstan.neon`; prima di contare errori verificare `larastan/extension.neon` incluso".

Per prompt:

- **10-pest-xot-base-test, 29-testing-standards**: richiedono `XotBaseTest` in `tests/Pest.php`; il codice usa `XotBaseTestCase` in `tests/TestCase.php` e Pest.php estende `Modules\Gdpr\Tests\TestCase`. Inoltre il prompt dice "ogni file dichiara `uses()`" e "Pest.php fa `in()`": le due regole insieme causano `TestCaseAlreadyInUse` (Gdpr: 0 test eseguibili). Proposta: "Si usa UNA sola strada: `pest()->extend(TestCase::class)->in(...)` in Pest.php; vietato `uses(TestCase::class)` nei singoli file. Verifica: `rg -l 'uses\(.*TestCase' tests` => vuoto". Aggiungere anche il comando Pest corretto con `--test-directory=Modules/<Mod>/tests` (senza, "A facade root has not been set").
- **35-policies-permissions-audit**: indica `app/Policies`; 9 moduli su 12 con policy usano `app/Models/Policies` (solo Seo, User, Xot hanno anche `app/Policies`). Proposta: "cercare in `app/Models/Policies` (convenzione prevalente) e `app/Policies`".
- **07-contracts**: impone `Models/Contracts` e vieta `app/Contracts`; il codice usa `app/Contracts` in 9 moduli (User 24, Xot 23, Notify 12, Activity 2...) contro `Models/Contracts` in 3 (1 file ciascuno). Proposta: dichiarare `app/Contracts` come canonica oppure motivare la migrazione; il controllo 1 (`app/Contracts` vuoto) fallirebbe su quasi tutti i moduli.
- **09-migrations / 33**: il controllo `rg 'RefreshDatabase|migrate:fresh' $M` conta commenti ("no RefreshDatabase") come violazioni; usare `rg -n '^\s*(use .*RefreshDatabase|.*uses\(RefreshDatabase)'`. Manca un controllo sui prefissi duplicati (`ls | cut -c1-21 | sort | uniq -d`) e sui nomi duplicati di tabella: Gdpr ha 4 `create_consents_table`. Il nome `YYYY_MM_DD_HHMMSS_` dichiarato nel prompt non e' la convenzione reale (`2024_01_01_000001_`).
- **97-YAML-FRONTMATTER-CONVENTION**: richiede `role scope execution destructive_operations_allowed completion_criteria`; i docs di Gdpr (344 file) non li hanno (99%): la convenzione non e' realistica per i docs di modulo. Proposta: limitare i campi obbligatori ai prompt in `bashscripts/docs/prompts/` e per i docs di modulo richiedere solo `title`.
- **55-md-conventions / 01-confidence-bootstrap**: soglia `.md` in root "5" nel prompt, "6" nello script; Gdpr ne ha 13 e il prompt non dice cosa fare (spostare in `docs/`). Proposta: unica soglia e comando di verifica `ls $M/*.md | wc -l`.
- **22-ide-helper**: `grep ide-helper laravel/composer.json` da' 0 anche se il pacchetto e' installato (arriva da un composer di modulo). Proposta: `php artisan list | grep -c ide-helper`.
- **50-trigger-operativi**: il catalog dice che `00-start` lo cita; non e' vero (0 match). Proposta: aggiungere il riferimento in `00-start.md` o cambiare il prompt in "citato da start.md".
- **44-module-docs-continuous, 53-tdd**: richiedono `git log -10 --stat`, ma i repo di modulo hanno 3 commit squashed con messaggio `.`: il controllo non e' valutabile. Proposta: usare `git status --short docs` e confronto `docs` vs `app` per mtime.
- **14-module-dependency-direction**: cita solo Geo (inesistente). Proposta: regola generica "Xot non importa nessun altro modulo; UI importa solo Xot; i moduli di dominio non importano moduli foglia in direzione inversa" con comando `rg` per ogni coppia.
- **01-confidence-bootstrap**: script `guard-module-hygiene.sh`, `run-all-gates.sh`, `docs/MAXIMUM_CONFIDENCE_PROTOCOL.md` non esistono; mancano al prompt: `bash bashscripts/tools/audit-module-root-hygiene.sh` e `audit-module-workspaces.sh` come comandi ufficiali.
- **08-playwright-ui**: non indica dove trovare utente seed e come lanciare Playwright; `APP_URL=http://localhost` risponde 200 ma nessun comando del prompt e' eseguibile in sola lettura.
- **45-full-module-audit**: elenca 14 prompt da eseguire ma non dice l'ordine ne' come aggregare; con PHPStan e Pest rotti non indica se bloccare. Proposta: tabella di output con colonna "gate bloccante".
- **19-docs-second-brain**: `qmd search "<tema modulo>"` restituisce risultati non pertinenti (handoff generici) e il pass "almeno 1 risultato" e' sempre vero. Proposta: pass = almeno un risultato il cui path contiene il nome del modulo.
