# Matrice G13 X4: modulo Media

Agente X4, sola lettura, 2026-10-01. Gruppo saltato: G07 qualita' (Media ha le correzioni). Prompt eseguiti: 38 canonici MODULE/REF (45 meno i 7 di G07). Esecuzione in batch di script indipendenti: l'ordine `shuf` non incide su controlli di sola lettura.

## Inventario

- Struttura: app (Actions 51 file, Datas 4, Filament/Resources 31 file per 3 Resource, Models 9 file di cui 4 Model, Services 4, Support 4, Contracts 2), tests 61 file (Feature/feature, Filament/filament, Unit/unit: doppia grafia), lang 57 file (de, en, it), database/migrations 6.
- Root modulo: 2 `.md`, 2 `.code-workspace`, cartella `View/` maiuscola.
- git log -3: 4dc372b, b51f778, 53d4400 (2026-09-30), messaggio `.`; 1 file modificato non committato.
- Anomalie di struttura: `app/Filament/Clusters/极est/Pages/AwsTest.php` (cartella con carattere cinese, file vuoto da 0 byte, committata in b51f778) accanto a `Clusters/Test/`; `app/conversions/` minuscola gemella di `app/Conversions/`; `SubtitleService.php` duplicato in `app/Services/` e `app/Actions/Stream/`; 5 file `.bak`/`.to_xot`.

## Gate pesanti

GATES_MEDIA

## Prompt eseguiti

| Prompt | Controllo | Comando | Esito | Evidenza |
|---|---|---|---|---|
| 55-md-conventions | date, frontmatter, root | `find docs -name '*.md' \| grep -E ...`; `head -1` | FAIL | 13 file con data nel nome; 56/473 md senza frontmatter; 2 md in root (ok); 0 `.txt`; `diff --check` vuoto |
| 97-YAML-FRONTMATTER | parse YAML docs modulo | python `yaml.safe_load` | FAIL | 417 con frontmatter, 12 invalidi (es. `docs/coverage.md`, `docs/phpstan-zero-errors.md`) |
| 01-architecture-patterns | Migration base, Services, DTO, lang | `rg --files-without-match XotBaseMigration`; `find` | FAIL | migration 5/6 con base: manca `2026_01_18_152545_add_columns_to_temporary_uploads_table.php`; `app/Services` esiste; 0 DTO; 55 lang php -l ok |
| 01-confidence-bootstrap | git root, igiene, workspace | `audit-module-root-hygiene.sh`, `audit-module-workspaces.sh` | FAIL | `View/` maiuscola; 2 workspace (`media`, `_module_media_fila5`) |
| 13-path-and-naming | Config, Listeners, autoload, persist | `ls -d Config config`; find | FAIL | `config/` ok; 0 listener fuori app; `autoload.files` assente; 0 `persist`; `View/` maiuscola; `app/conversions` minuscola duplicata |
| 14-module-dependency | import di moduli | `rg -P -oNI 'use Modules\\(?!Media\\)\w+'` | FAIL | 70 Xot (ok); 1 Job (`Filament/Resources/MediaConvertResource/Pages/ListMediaConverts.php`), 1 UI (`Actions/Image/SvgExistsAction.php`), 1 User (`Models/Media.php`) |
| 43-php-files-structure | sintassi, `<?php`, strict_types, namespace | `php -l`; `head -c5`; `rg --files-without-match` | FAIL | sintassi ok; 1 file senza `<?php` e senza strict_types: `Clusters/极est/Pages/AwsTest.php` (vuoto); 3 namespace mismatch: `app/conversions/{videogenerators/Webm,imagegenerators/PowerPoint}.php`, `极est/AwsTest.php`; 0 multi-classe |
| 02-controller-to-folio | Controller, Folio, route | `find Http/Controllers` | FAIL | 2 controller (`BaseController`, `ConvertController`); 0 Folio; 0 route verso controller |
| 25-services-to-actions | Services, `*Service`, QueueableAction | `find -name Services -o -name Support` | FAIL | `app/Services`, `app/Support`, `Actions/Diagnostic/Support`; 2 classi `SubtitleService` (stesso nome in `Services/` e `Actions/Stream/`); 8/49 Actions senza QueueableAction (`S3/GetFileInfoAction`, `SaveAttachmentsAction`, `Image/SvgExistsAction`, ...) |
| 26-actions-architecture | execute, return type, UI, test | `rg --files-without-match 'public function (execute\|__invoke)'` | FAIL | 4 Actions senza execute/invoke (`S3/BaseS3Action`, `AttachMediaAction`, `Stream/SubtitleService`, `Video/GetVideoScreenshotAction`); 0 senza return type; 0 logica UI; 26/49 Actions senza riferimento nei test |
| 04-datas-not-dtos | cartelle e suffissi vietati | `find -iname dtos -o -name Data` | PASS | 0 cartelle vietate, 0 `*Dto.php`, 0 residui; 4 file in `app/Datas` |
| 07-contracts | posizione contratti | `find app/Contracts`; `find Models/Contracts` | FAIL | 2 file in `app/Contracts` (`PathGenerator`, `PathGeneratorContract`); `Models/Contracts` assente; 0 `*Interface.php` |
| 28-livewire-to-widgets | Livewire residui, widget | `find -path '*Livewire*'` | PASS | 0 file Livewire, 0 `Livewire::component`; nessuna cartella `Filament/Widgets` (solo `Resources/MediaResource/Widgets/ConvertWidget.php`) |
| 06-filament-audit | Resource Form/Infolist/Table | `find Resources -maxdepth 1 -name '*Resource.php'` | FAIL | 3 Resource, tutte con Form+Infolist+Table e base Xot; `Media` ha 2 Table (`MediaTable.php`, `MediasTable.php`); 0 estensioni Filament dirette |
| 08-playwright-ui | app raggiungibile, route modulo | `curl -sI $APP_URL`; `curl .../media/admin` | BLOCKED | `APP_URL` 200 ma `/media/admin` 404 (vhost diverso); `route:list` mostra `media/admin`; nessun browser lanciato |
| 29-testing-standards | Pest, TestCase, RefreshDatabase, strict, nomi | `ls tests/Pest.php`; `rg` | FAIL | `tests/Pest.php` presente (`pest.php` assente); 0 `extends TestCase`, 0 RefreshDatabase; 56/56 test con strict_types; 124 `it/test` in 24 file; cartelle doppie `Feature/feature`, `Filament/filament`, `Unit/unit` |
| 10-pest-xot-base-test | XotBaseTest in Pest.php | `rg XotBaseTest tests/Pest.php` | FAIL | 0 occorrenze; `XotBaseTest` non esiste (Xot ha `XotBasePest`, `XotBaseTestCase`); il commento di `Pest.php` dichiara che il file non viene caricato e vieta `tests/Support/`, ma `tests/Support/HasMediaTestStub.php` esiste |
| 20-filesystem-before-assertions | path asserti | `rg base_path tests`; `test -e` | PASS | 12 `class_exists/file_exists`; 0 `base_path()` assertiti mancanti; ultimo commit aggiunge solo file del modulo |
| 53-tdd-fonti-esterne | coverage, regressioni | `php -m \| grep xdebug`; `git log -10 --stat -- tests` | PASS | Xdebug presente; 49 file test toccati negli ultimi 10 commit; `docs/coverage.md` esiste (YAML invalido) |
| 09-migrations | nomi, base, drop, refresh | `ls migrations \| grep -vE`; `rg` | FAIL | 6 migration, nomi ok, 0 drop, 0 refresh; duplicati: due `create_medias_table` (2022_01_01_000011, 2026_07_23_150000) e due `create_temporary_uploads_table` (2023_01_01, 2026_01_18) piu' `2023_01_01_000000` |
| 21-translations | lang, hardcoded, 5 elementi | `ls lang`; `rg -e "->(label\|title\|...)\('[A-Za-z]"` | FAIL | 3 lingue (de, en, it); 14 label/title hard-coded (es. `Filament/Clusters/Test/Pages/AwsTest.php:69` 'S3 Test Results'); 9 `trans()` non a 5 elementi; 34 file lang con `navigation` |
| 32-model-migration-factory-seeder | matrice | loop su Models | PASS | MediaConvert, Media, TemporaryUpload: factory 1, seeder 2-4; `BaseModel` senza factory (astratto, giustificato) |
| 33-migrations-audit | owner, doppioni | `ls migrations` | FAIL | doppioni create su `medias` e `temporary_uploads` (vedi 09) |
| 34-factories-seeders-audit | factory, rand, idempotenza | `rg -c firstOrCreate database/seeders` | FAIL | 3 factory, 4 seeder, 0 `rand`; 0 `firstOrCreate/updateOrCreate` (non idempotenti) |
| 35-policies-permissions | policy, permessi | `find Policies`; `rg -e "->can\('"` | PASS | 5 policy per 3 Resource (+ base); 21 chiamate `can()/authorize()`; test policy da verificare |
| 36-events-jobs-notifications | mappa | `find app/{Events,...}` | N-A | 0 Events/Listeners/Jobs/Notifications (usa `Modules\Job` in 1 pagina) |
| 37-providers-container | base provider, binding | `rg --files-without-match` | FAIL | `EventServiceProvider.php` senza base Xot; 4 provider |
| 38-config-routes-views | env(), route, hard-coded | `rg 'env\('`; `php -l routes` | PASS | 3 match `env(` in `Datas/CloudFrontData.php:19-23` solo in commenti; route ok; 0 testi hard-coded nei blade |
| 39-composer-dependencies | validate, autoload, require | `composer validate --no-check-publish` | FAIL | valido con warning: `intervention/image:*` non vincolato; autoload PSR-4 ok; `post-autoload-dump1` (typo) |
| 07-documentation-standards | link, nomi progetto | script python | FAIL | 732 link relativi, 493 rotti (es. `docs/module-media-1.md -> ./conflitti_merge_risolti.md`); 7 file con `Fixcity/Ptvx/PTVX` |
| 12-documentation | README/index, cronologia, YAML | `ls docs/README.md docs/index.md` | FAIL | README e index presenti; 16 file con cronologia; 12 YAML invalidi |
| 19-docs-second-brain | duplicati | `uniq -d basename` | FAIL | 37 basename duplicati (`00-index.md`/`00-INDEX.md`, `AGENTS.md`, `architecture.md`, `aws.md`) |
| 42-delete-obsolete | candidati | `find -name '*.bak' ...` | PASS (report) | 5 candidati: `Support/Ffmpeg/MediaExporterResolver.php.bak`, `Support/TemporaryUploadPathGenerator.php.bak`, `Services/VideoStream.php.bak`, `Services/SubtitleService.php.bak`, `Actions/Image/SvgExistsAction.to_xot`; gemelli case: `app/Conversions/*` vs `app/conversions/*`, `docs/00-INDEX.md` |
| 44-module-docs-continuous | docs vs codice | `git log -5 -- docs` | PASS | docs e app toccate 2026-09-30 (53d4400); 0 docs non committate |
| 52-mappa-proprieta-docs | area -> docs | `ls -R docs \| grep -ic area` | FAIL | actions 12, filament 19, models 2, lang 3, database 1, tests 0 |
| 45-full-module-audit | composito | esiti sopra | FAIL | rilievi sopra con path e comando |
| 50-trigger-operativi | citato da 00-start | `grep` | PASS | citato |
| 54-notify-handoff-storico | solo Notify | n/a | N-A | prompt specifico per Notify |

## Difetti dei prompt

Difetti comuni: vedi la sezione "Difetti dei prompt" di `matrix-UI.md` (stessi prompt, stesso ambiente). Quelli confermati su Media:

- Tutti i prompt con `rg -L` (01-architecture, 25, 26, 06-filament, 09, 37, 43): `-L` e' `--follow`; il controllo "=> vuoto" non passa mai. Usare `--files-without-match`.
- 21, 35: pattern con `->` iniziale letto come flag; senza `-e` il risultato e' 0 falso (Media: 14 label hard-coded e 21 chiamate `can()/authorize()` trovate solo con `-e`).
- 43.2: `\A(?!<\?php)` con rg da falsi positivi (5 `Datas/*.php` e `Rules/FileExtensionRule.php` segnalati ma corretti); il vero file senza `<?php` e' `Filament/Clusters/极est/Pages/AwsTest.php` (vuoto). Proposta: test su `head -c5`.
- 10-pest-xot-base-test: `XotBaseTest` non esiste; `Media/tests/Pest.php` spiega che il file non viene caricato dal runner e vieta `tests/Support/`, che pero' esiste. Il prompt contraddice la convenzione reale (`XotBasePest` + `uses()` per file).
- 29-testing-standards: non considera le cartelle di test duplicate per case (`Feature/feature`, `Filament/filament`, `Unit/unit`). Proposta: controllo `find tests -maxdepth 1 -type d | sort -f | uniq -di`.
- 09-migrations e 33-migrations-audit: non chiedono di rilevare piu' migration `create_<tabella>_table` sulla stessa tabella (Media ne ha due per `medias` e due per `temporary_uploads`). Proposta: `ls database/migrations | sed -E 's/^[0-9_]+//' | sort | uniq -d` e il confronto `Schema::create('<t>'` per tabella.
- 43-php-files-structure: non controlla nomi di directory non ASCII e file vuoti: `app/Filament/Clusters/极est/` (file da 0 byte) sfugge a ogni controllo tranne `strict_types`. Proposta: `find app -name '*[! -~]*'` e `find app -name '*.php' -size 0`.
- 13-path-and-naming e 42-delete-obsolete: nessun controllo per gemelle case-insensitive di directory in `app/` (`conversions/` vs `Conversions/` con 3 namespace mismatch). Proposta: `find app -type d | sort -f | uniq -di`.
- 25-services-to-actions: non chiede di rilevare la stessa classe (`SubtitleService`) in due path (`Services/` e `Actions/Stream/`). Proposta: `find app -name '*.php' -exec basename {} \; | sort | uniq -d`.
- 26-actions-architecture: nessuna regola per le classi base/astratte in `Actions/` (`S3/BaseS3Action`, `Stream/SubtitleService`): risultano "senza execute". Proposta: escludere `Base*`/abstract o richiedere `abstract`.
- 28-livewire-to-widgets: assume `Filament/Widgets/`; Media ha widget annidato in `Resources/MediaResource/Widgets/`. Proposta: cercare `*Widget.php` ovunque.

