# Matrice G13: modulo AI (agente X5)

Sola lettura. Esclusi i prompt G05 (28, 06-filament-audit, 08-playwright-ui, in carico a G05 con correzioni). 54 e' solo Notify (N-A). Ordine di esecuzione: `shuf` su `catalog.tsv` (45 MODULE/REF canonici). Data: 2026-10-01. Nota ambiente: `rg` non e' installato come binario (esiste solo come funzione della shell Claude): negli script bash i comandi del catalogo falliscono con `rg: command not found`. Ho usato un wrapper locale in `/tmp` (ripgrep 14.1.1 incorporato).

## Inventario

- Struttura: `app/{Actions 36 file, Datas 5, Filament/Resources 8 file (1 Resource), Models 7, Services 6 (+.bak), Support, Contracts, Providers}`, `tests` 19 file (74 test Pest), `lang` 53 file (it 32, en 10, altre 1), `database/migrations` 5 (4 create), `config` (ai.php, config.php).
- Root: 3 `.code-workspace` (atteso 1), cartella maiuscola `View/` non tracciata (`?? View/`), `ruvector.db`, `phpmd.ruleset.xml`.
- git log -3 (2026-09-30): `5ffb15a Merge ... laraxot/dev`, `5f39d99 .`, `a0a5b22 .`. Modulo sporco: solo `View/`.

## Gate pesanti

| Gate | Comando | Esito | Evidenza |
|---|---|---|---|
| phpstan | `heavy-slot.sh ./vendor/bin/phpstan analyse Modules/AI --memory-limit=2G --no-progress --error-format=raw` (lanciato prima della correzione `-1`, stesso `laravel/phpstan.neon`) | FAIL | 34 errori (18 app, 9 tests, 7 database). Per tipo: method.notFound 10, argument.type 10, method.internalClass 4, class.notFound 4, return.type 3 (property.notFound 3) |
| pest | `HEAVY_SLOTS=1 HEAVY_SLOT_DIR=/tmp/heavy-slots-pest heavy-slot.sh ./vendor/bin/pest --test-directory=Modules/AI/tests Modules/AI/tests --no-coverage` | IN CODA (vedi aggiornamento in fondo) | slot unico di macchina occupato da altri agenti. Una prima esecuzione senza slot dedicato e' stata interrotta e scartata (non affidabile) |
| phpinsights | `heavy-slot.sh ./tools/phpinsights.sh Modules/AI --format=console --summary` | FAIL (exit 1, soglie minime non raggiunte) | code 89.6, complexity 92.3, architecture 88.2, style 81.9 |
| phpmd | `./tools/phpmd.sh Modules/AI` | FAIL (exit 2) | 3 violazioni: CyclomaticComplexity (ContextCompressorAction:72, CC 13), LongClassName, LongVariable |
| pint | `heavy-slot.sh ./vendor/bin/pint --test Modules/AI` | FAIL | 22 file; fixer: new_with_parentheses 12, class_definition 5, braces_position 5 |

## Prompt eseguiti

| Prompt | Controllo | Comando | Esito | Evidenza |
|---|---|---|---|---|
| 01-confidence-bootstrap | igiene root, workspace unico | `audit-module-root-hygiene.sh`, `audit-module-workspaces.sh`, `ls *.code-workspace` | FAIL | `UPPERCASE-DIR AI -> View`; 3 workspace (`_ai`, `_module_ai`, `_module_ai_fila5`). Script guard/run-all-gates MISSING |
| 04-datas-not-dtos | cartelle e suffissi DTO, Data valide | `find -iname dtos/Data`, `*Dto.php`, `rg residui` | PASS | 0 cartelle, 0 suffissi, 0 residui; `app/Datas` 5 file |
| 08-playwright-ui | (G05) | n/a | N-A | escluso |
| 09-migrations | base, nomi, drop, RefreshDatabase | `rg --files-without-match XotBaseMigration`, `ls \| grep -vE ...` | PASS | 4 create tutte `XotBaseMigration`, nomi conformi, 0 drop; `RefreshDatabase` solo in commenti ("Vietato") e docs `migrate:fresh` in avvisi |
| 52-mappa-proprieta-docs | area -> pagina docs | `ls docs \| grep -i <area>` | FAIL | Actions 2, database 1, Models 0, Filament 0, lang 0, tests 0 (136 file in `docs/` root) |
| 43-php-files-structure | sintassi, strict_types, namespace, classi per file | `php -l` su tutto, `rg --files-without-match`, script namespace | FAIL | sintassi OK; strict_types mancante in 2/70 (`Actions/PredictionDraftFallbackTemplatesAction.php`, `Actions/AiJsonResponseDecoderAction.php`); namespace e 1 classe/file OK. Il controllo 2 del catalogo ("codice prima di `<?php`") da' falsi positivi (vedi difetti) |
| 54-notify-handoff-storico | solo Notify | n/a | N-A | |
| 34-factories-seeders-audit | factory, seeder, idempotenza, test | `find`, `rg firstOrCreate`, `rg Factory::new tests` | FAIL | 4 factory e 5 seeder, `php -l` OK; nessun `firstOrCreate/updateOrCreate` (0 seeder idempotenti), nessun test usa le factory (0) |
| 42-delete-obsolete-files-safely | .bak, gemelli case | `find -name '*.bak'`, `sort -f \| uniq -Di` | FAIL | 9 `.bak` (7 in `app/`, 2 in `.github/workflows`), 1 ha riferimenti (`PredictionDraftFallbackTemplates.php.bak`); 16 coppie docs che differiscono solo per maiuscole (`00-INDEX.md`/`00-index.md`, `BAD_PRACTICES.md`/`bad_practices.md`, ...) |
| 19-docs-second-brain | qmd, YAML, link, duplicati | `qmd search "AI module"`, parse YAML, link relativi | FAIL | qmd trova risultati ma non specifici del modulo; 4 YAML invalidi su 251 md; 197/511 link relativi rotti (es. `ollama-mcp-integration-vision.md` -> `./ai-module-architecture.md`); 7 basename duplicati |
| 29-testing-standards | Pest.php, PHPUnit, RefreshDatabase, strict, nomi | `ls`, `rg extends TestCase`, `rg RefreshDatabase` | PASS | `tests/Pest.php` presente, 0 `extends TestCase` e `PHPUnit\Framework\TestCase`, 0 uso reale di RefreshDatabase, strict_types 16/16, 74 test `it()/test()` |
| 53-tdd-fonti-esterne | coverage, regressioni, doc | `php -m`, `git log -- tests`, `ls docs/coverage.md` | PASS | Xdebug presente; `docs/coverage.md` esiste; coverage non eseguita (sola lettura/costo) |
| 24-boy-scout | un difetto locale | lettura phpstan/pint | PASS | rilievo: `app/Actions/ContextCompressorAction.php:72` CC 13 (phpmd) e `getenv('OPENAI_API_KEY')` riga 43 invece di `config()` |
| 02-controller-to-folio-actions | controller, Folio, route verso controller | `find Http/Controllers`, `rg Controller::class routes` | PASS | 0 controller con file `.php` sotto `app/Http/Controllers` (cartella con 1 file non-PHP), 0 route a controller, 0 pagine Folio (modulo senza Folio: n/a); 32 Actions |
| 10-ponytail-audit | interfacce con 1 impl, morti | `rg interface`, `rg implements` | FAIL | `Contracts/AiActionHandlerContract` implementata da 0 classi (usata solo dal Registry); `SentimentAnalyzer` 2 impl; 9 `.bak` candidati |
| 11-phpstan | neon non toccato, ignore | `git diff -- phpstan.neon*`, `rg @phpstan-ignore` | FAIL | neon non modificato nel diff, 0 ignore; ma gate: 34 errori (tabella sopra) |
| 26-actions-architecture-audit | execute, tipi, logica UI, test | `rg --files-without-match 'public function (execute\|__invoke)'`, `rg Notification::make` | FAIL | 3 Actions senza `execute`/`__invoke` (`Sentiment/TransformersSentimentAnalyzer`, `Sentiment/BasicSentimentAnalyzer`, `Prompt/AIPromptTemplates`: sono implementazioni/template, non Actions); 0 logica UI; 25/32 Actions senza riferimento nei test |
| 35-policies-permissions-audit | policy per Model | `find app/Policies` | FAIL | nessuna cartella `Policies`, 0 policy per 4 Model di dominio (`AiThread`, `AiMessage`, `AiActionProposal`, `AiToolLog`); 0 test di policy |
| 10-pest-xot-base-test | Pest.php, base | `ls tests/Pest.php`, `rg XotBaseTest` | FAIL (prompt) | `Pest.php` ok, `pest.php` assente; `XotBaseTest` non esiste: `tests/TestCase.php` estende `Modules\Xot\Tests\XotBaseTestCase` |
| 13-path-and-naming-rules | Config/, Listeners, autoload files, persist | `ls -d Config config`, `find Listeners`, `composer.json` | PASS | solo `config/`; 0 listener fuori `app/`; `autoload.files` None; 0 `persist`. Cartella maiuscola `View/` (gia' nel 01) |
| 07-contracts | cartella, Interface, suffisso | `find app/Contracts`, `find *Interface.php` | FAIL | contratti in `app/Contracts/` (2 file: `AiActionHandlerContract`, `SentimentAnalyzer` senza suffisso `Contract`), 0 in `Models/Contracts` |
| 06-filament-audit | (G05) | n/a | N-A | escluso |
| 20-filesystem-before-assertions | path asseriti esistono | `rg base_path tests`, `class_exists` | PASS | 1 uso `class_exists`/`file_exists`; 0 `base_path()` asseriti mancanti |
| 55-md-conventions | date nei nomi, frontmatter, root | `find docs`, `ls *.md`, `diff --check` | FAIL | 8 file con data nel nome su 251; frontmatter su tutti; 3 md e 0 txt in root; `diff --check` pulito |
| 07-documentation-standards | link, nomi progetto | script link, `rg Fixcity` | FAIL | 197/511 link rotti; 8 file docs con nomi di progetto (Fixcity/Ptvx) |
| 03-quality-gates | pipeline completa | vedi gate | FAIL | pint 22 file, phpstan 34, phpinsights sotto soglia, phpmd 3; 0 marker merge; strumenti presenti (phpmd ora esiste) |
| 14-module-dependency-direction | import tra moduli | `rg -o 'use Modules\\\\'` | PASS | solo `Modules\AI` (37) e `Modules\Xot` (29); nessuna dipendenza inversa. "Geo -> UI" non applicabile |
| 21-translations | lingue, hard-coded, sintassi, 5 elementi | `ls lang`, `rg -- "->label('"`, `php -l` | FAIL | 12 lingue ma solo it (32 file) e en (10) complete, le altre 10 hanno 1 file; hard-coded: `Pages/Completion.php:99,104` (`->label('Generate Completion')`), `Pages/FineTuning.php:59` `->title('Error')`; `php -l` OK |
| 28-livewire-to-filament-widgets | (G05) | n/a | N-A | escluso |
| 25-services-to-actions | Services, `*Service`, QueueableAction | `find -name Services`, `rg 'class \w+Service'` | FAIL | `app/Services` 6 file (`AIService`, `AIChatCompletionClient`, ...), `app/Support` e `Actions/Support`; `AIService` in uso (l'unico altro file e' il `.bak`); 3 Actions senza `QueueableAction` |
| 39-composer-dependencies | validate, autoload, require | `composer validate`, parse json | PASS | valido; PSR-4 3 voci coerenti; `require` = `openai-php/laravel`; nessuno script |
| 33-migrations-audit | Model senza owner | matrice Model/migration | FAIL | 6 file Model: 4 con migration; `BaseModel`, `BasePivot` astratti (giustificati). Riferimento `Performance/MyLog` MISSING |
| 22-ide-helper | pacchetto, comandi | `grep ide-helper laravel/composer.json`, `php artisan list` | PASS (prompt errato) | `composer.json` root = 0 match ma `artisan list` mostra 5 comandi ide-helper (pacchetto da dipendenza transitiva/moduli). Controllo `grep` del catalogo da correggere |
| 23-optimize | solo lettura | `php artisan about --only=cache`, `route:list --path=ai --json` | PASS | config/events/routes NOT CACHED, views CACHED; `route:list --path=ai` restituisce anche `_debugbar/*` (filtro non preciso) |
| 50-trigger-operativi | citato da 00-start | `grep -c 50-trigger bashscripts/docs/prompts/00-start.md` | FAIL | 0 citazioni: 50 non e' referenziato da 00-start |
| 37-providers-container-bindings | base, binding, Services | `rg --files-without-match XotBase*Provider` | FAIL | `EventServiceProvider` non estende una base Xot; `singleton(AiActionHandlerRegistry)` unico binding; 0 riferimenti `Services\` nei provider |
| 45-full-module-audit | composito | aggregato dei controlli sopra | FAIL | rilievi con path e comando: workspace x3, `View/`, `Services/`, `.bak` x9, 0 policy, 34 phpstan, 197 link rotti. Il prompt non elenca un formato di matrice verificabile |
| 36-events-jobs-notifications | mappa evento/job | `find Events Listeners Jobs Notifications` | N-A | cartelle assenti (0 file); `$listen = []` vuoto; `rg app/Jobs` d'errore IO: il comando assume che la cartella esista |
| 32-model-migration-factory-seeder | matrice per Model | loop `ls Factory`, `rg seeders` | PASS | 4/4 Model di dominio con factory e seeder; `BaseModel`, `BasePivot` astratti senza |
| 11-phpinsights | nuove issue vs baseline | `tools/phpinsights.sh` | FAIL | punteggi in tabella gate; nessun baseline indicato nel prompt |
| 97-YAML-FRONTMATTER-CONVENTION | parse YAML docs | `yaml.safe_load` | FAIL | 4 invalidi su 251 md |
| 12-documentation | README/index, cronologia, YAML | `ls docs/README.md docs/index.md`, `rg -il changelog` | FAIL | README e index presenti; 8 file con "changelog/release notes/Aggiornato il"; 4 YAML invalidi |
| 38-config-routes-views | env(), route, view | `rg 'env\('`, `php -l routes` | FAIL | 0 `env()` ma `getenv('OPENAI_API_KEY')` in `ContextCompressorAction.php:43` (aggira il controllo); routes 2 file, `php -l` OK, 0 route nominate; 0 testo hard-coded nelle view |
| 44-module-docs-continuous | code + docs insieme | `git log -10 --stat -- docs` | PASS | gli ultimi 10 commit toccano `docs/` (552 file docs nei 10 commit) ma sono commit ".": nessuna correlazione leggibile |
| 01-architecture-patterns | Xot migration, Services, DTO, lang | `rg`, `find` | FAIL | migrations OK, DTO 0, ma `Services` presente (6 file); lang `php -l` OK (52 file) |

## Difetti dei prompt

1. Transversale, `rg -L`: in ripgrep `-L` e' `--follow` (segue i symlink), non "files without match". I comandi `rg -L 'X' ...` di 01-architecture, 43, 04, 06-filament-audit, 25, 26, 28, 29, 37, 09 stampano le righe che CONTENGONO il pattern: il risultato "vuoto" non si ottiene mai. Proposta: sostituire ovunque con `rg --files-without-match 'X' <path> -g '*.php'` (o `rg -L` solo con nota).
2. Transversale, `rg` non e' un binario: nei prompt in script bash dà `command not found` (esiste solo come funzione di shell Claude Code). Proposta: aggiungere in "Convenzioni" `command -v rg || alias`, oppure `grep -rP` come fallback documentato.
3. 43 controllo 2: `rg -l --pcre2 '\A(?!<\?php)'` lavora per riga, `\A` combacia con ogni riga: falsi positivi (flagga file validi come `Datas/SentimentData.php` che iniziano con `<?php`). Proposta: `for f in $(find $M/app -name '*.php'); do head -c5 $f | grep -q '^<?php' || echo $f; done`.
4. 10-pest-xot-base-test: cita `XotBaseTest` che non esiste. La base reale e' `Modules\Xot\Tests\XotBaseTestCase` (usata da AI e Job in `tests/TestCase.php`) e `tests/Pest.php` registra `pest()->extend(TestCase::class)` del modulo, non la base Xot. Proposta: sostituire con "`tests/TestCase.php` estende `XotBaseTestCase`; `Pest.php` fa `pest()->extend(<Mod>\Tests\TestCase::class)`". Controllo: `rg -n 'extends XotBaseTestCase' $M/tests/TestCase.php`.
5. Transversale, pattern che iniziano con `-`: `rg -n "->(label|title...)" ` (21, 35, 38) fallisce con `unrecognized flag ->`. Proposta: `rg -n -- "->label\('[A-Za-z]"`.
6. 36-events-jobs-notifications: `rg --files-without-match ... app/Jobs` va in errore IO se la cartella manca (AI, Job non hanno `app/Jobs`); il prompt non dice cosa fare. Proposta: `[ -d $M/app/Jobs ] && rg ... || echo N-A`. Inoltre la convenzione `Jobs/` e' smentita: i moduli usano Queueable Actions (`app/Actions`, trait QueueableAction).
7. 22-ide-helper: `grep -n 'ide-helper' laravel/composer.json` da' 0 ma il pacchetto e' disponibile (`php artisan list | grep -c ide-helper` = 5). Proposta: usare solo `php artisan list | grep ide-helper`.
8. 25-services-to-actions e 01: non distinguono `Services` da `Support`; `Actions/Support` contiene Actions legittime (`MakeAIRequestAction`). Proposta: vietare solo `app/Services` e `class *Service`, ammettere `Support` per helper senza logica di dominio, indicando il criterio.
9. 42: `sort -f | uniq -di` stampa un solo elemento per gruppo, non indica quale sia il gemello; usare `uniq -Di`. Segnalare i `.bak` (7 in `app/`, 2 in `.github`) come categoria esplicita ("file `*.bak`").
10. 50-trigger-operativi: il catalogo chiede di verificare la citazione da 00-start, ma 00-start non cita 50 (0 occorrenze): il controllo e' FAIL per tutti i moduli, o la regola va spostata in 00-start.
11. 52-mappa-proprieta-docs e 44: criterio "pagina docs per area" basato sul nome file; le docs di AI usano slug diversi. Proposta: accettare indice `docs/index.md` con sezione per area.
12. 03-quality-gates: cita ancora Pint `--test` come "exit 0" ma non indica cosa fare per i moduli con file fuori standard; cita `laravel/phpmd-ruleset.xml` MISSING mentre ora esiste `laravel/tools/phpmd.sh` (usa `Modules/AI/phpmd.ruleset.xml`). Aggiornare con `./tools/phpmd.sh Modules/<Mod>` e `./tools/phpinsights.sh`.
13. Gate pesanti: il catalogo dice `--memory-limit=2G` e `phpstan.neon.dist`; il file effettivo e' `laravel/phpstan.neon` (tracciato, level max, modificato il 2026-10-01 00:37) e ha precedenza sul `.dist`; il "MISSING laravel/phpstan.neon" del catalogo e' ormai errato.
14. 55: root con `ls $M/*.md | wc -l <= 5` ma `ls $M/*.md` non include `.txt`; la soglia reale dello script audit e' 6. Allineare. Inoltre il prompt non gestisce coppie case-diverse (`INDEX.md`/`index.md` coesistono in 16 coppie).
15. 28 e 06-filament-audit (G05) non eseguiti qui; in 21 il controllo "hard-coded" misses `getenv`: aggiungere controllo `getenv\(|putenv\(` al prompt 38.
