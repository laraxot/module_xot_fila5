---
title: Matrice G13 modulo Trade
role: report
scope: 5.258 matrice sola lettura (agente X7)
---

# Matrice G13: Trade

Data 2026-10-01. Gruppo escluso: G08 (db-modelli, Trade e' in carico con correzioni). Sola lettura, nessuna modifica al repo. Prompt eseguiti: 35 (MODULE o REF canonici, ordine `shuf`). `rg` non e' un binario sul PATH (e' una funzione di shell): negli script ho usato un wrapper equivalente.

## Inventario

- Struttura: albero DOPPIO tracciato in git. `Actions/ Config/ Console/ Database/ Datas/ Exceptions/ Filament/ Http/ Models/ Providers/ Resources/ Routes/ Tests/ View/` (maiuscolo, layout nwidart legacy) e `app/ config/ database/ resources/ routes/ tests/` (lowercase, quello caricato da PSR-4 `Modules\Trade\ => app/`). `diff -rq` su Actions, Models, Datas, Filament, Http: copie identiche (solo `.old/.to_do` e Providers differiscono). Il namespace in `app/Actions` e' `Modules\Trade\Actions` (coerente col PSR-4).
- Conteggi: app/Actions 17, app/Datas 1 (2 file con .gitkeep), app/Filament/Resources 2 Resource (10 file), app/Models 5, app/Services 0, tests 0 file PHP (cartelle vuote), lang 0, database/migrations 0 (esiste `database/Migrations` con 2 migrazioni con `up()` classico), docs 3 file.
- git log -3: `b96a697 .`, `7e34fb5 .`, `814aaa7 .` (tutti 2026-09-30, messaggio "."). Working tree: 5 voci non committate (2 Provider modificati, `EventServiceProvider.php`, due `_components.json`) non mie.
- Second brain: `qmd search "Trade Binance bot"` nessun risultato; nessuna regola specifica Trade nel wiki.

## Gate pesanti (da laravel/, via heavy-slot)

| Gate | Esito | Evidenza |
|---|---|---|
| phpstan (`phpstan.neon`, level max, `--memory-limit=-1`) | FAIL | 690 errori. Per tipo: class.notFound 174, argument.type 128, offsetAccess.nonOffsetAccessible 104, binaryOp.invalid 86, return.type 36. Per cartella: app 342, Actions (copia legacy) 245, Filament 59, Providers 18, Http 15. Circa meta dei file sono duplicati dell'albero maiuscolo |
| phpmd (`tools/phpmd.sh`) | FAIL | 388 violazioni: CamelCaseVariableName 264, CamelCaseParameterName 40, LongVariable 30, UnusedLocalVariable 20, CyclomaticComplexity 6 |
| phpinsights (`tools/phpinsights.sh`) | FAIL | Code 80.4, Complexity 93.4, Architecture 64.7, Style 62.6; "code quality score too low". Interfaces 0.0%, Functions 0.0% |
| pest (slot dedicato, `--test-directory`) | vedi sezione Pest in fondo | modulo senza test |

Nota: un primo lancio di pest senza slot dedicato e con `--no-interaction` e' fallito subito ("Unknown option") ed e' stato interrotto: non affidabile, rilanciato con la sintassi corretta.

## Prompt eseguiti

| Prompt | Controllo | Comando | Esito | Evidenza |
|---|---|---|---|---|
| 97-YAML-FRONTMATTER | frontmatter docs modulo | parse yaml su `$M/docs/*.md` | FAIL | 3 md, 0 con frontmatter |
| 55-md-conventions | date nel nome, frontmatter, root md/txt, diff --check | find/grep come da catalogo | FAIL | date 0, senza frontmatter 3/3, root md 1, txt 0, `diff --check` vuoto |
| 01-confidence-bootstrap | root hygiene e workspace | `audit-module-root-hygiene.sh`, `audit-module-workspaces.sh` | FAIL | 14 cartelle maiuscole nel root (UPPERCASE-DIR), 0 `.code-workspace` (atteso 1) |
| 01-architecture-patterns | migrazioni, Services, DTO, lang | find/rg | PASS parziale | XotBaseMigration: tutte (2 file in `database/Migrations`, directory maiuscola); Services 0; DTO 0; lang 0 file (modulo senza traduzioni: N-A) |
| 13-path-and-naming-rules | `Config/` maiuscola, Listeners, autoload, persist, root | ls/find/rg | FAIL | esistono sia `Config/` sia `config/`; 14 dir maiuscole; Listeners fuori da app 0; `persist` 0 |
| 14-module-dependency-direction | import verso altri moduli | rg `use Modules\\` | PASS con nota | Trade importa Xot 5, Cms 3 (`_ModulePanel*.php`, file con prefisso `_`); nessun modulo foglia importa Trade; config cita `Modules\User\Http\Livewire\Auth\FilamentLogin` (classe inesistente) |
| 43-php-files-structure | sintassi, codice prima di `<?php`, strict_types, namespace, 1 classe/file | php -l, loop `head -1`, rg | FAIL | sintassi 0 errori; codice prima di `<?php` 0; senza `strict_types` 37/45; mismatch namespace 0; file multi-classe 0 |
| 02-controller-to-folio-actions | Controller, Folio, Actions, route | find/rg | PASS | 0 Controller, 0 route verso Controller, 17 Actions, 0 pagine Folio |
| 25-services-to-actions | Services/Support, *Service, QueueableAction | find/rg | PASS | 0 cartelle, 0 classi `*Service`, 17/17 Actions con `QueueableAction` |
| 26-actions-architecture-audit | execute/__invoke, tipi, logica UI, test | rg | FAIL | tutte con `execute`; `execute(...)` senza return type 0; UI logic 0; 17/17 Actions senza alcun test (tests/ vuoto); 2 Actions hanno costruttore con `Exchange` e `CheckFearAndGreedIndexAction` chiama HTTP direttamente con `new Client` (non iniettabile in test) |
| 04-datas-not-dtos | cartelle/suffissi DTO, Datas | find/rg | PASS | 0 cartelle vietate, 0 `*Dto.php`, 1/1 Data estende `Data`, 0 riferimenti DTO |
| 07-contracts | Contracts, Interface, suffisso | find | PASS (N-A) | 0 `app/Contracts`, 0 `*Interface.php`, 0 Models/Contracts; modulo senza contratti |
| 28-livewire-to-filament-widgets | Livewire, widget | find/rg | FAIL | 2 file Livewire (`Http/Livewire/Auth/FilamentLogin.php` in entrambi gli alberi), 6 riferimenti; widget 0 |
| 06-filament-audit | Resource, Schemas/Tables, base Xot | find/rg | FAIL | 2 Resource (`BacktestingResource`, `TradeResource`) estendono `Filament\Resources\Resource`, non `XotBaseResource`; 2/2 senza `Schemas/*Form`, `*Infolist`, `Tables/*Table` |
| 08-playwright-ui | app in esecuzione | `curl -sI http://localhost` | BLOCKED | `localhost` risponde 200 ma non e' verificato che sia questa app; test browser fuori dalla sola lettura |
| 29-testing-standards | Pest bootstrap, PHPUnit, RefreshDatabase | ls/rg | FAIL | `tests/Pest.php` assente; 0 file di test (`tests/Feature`, `tests/Unit` vuoti) |
| 10-pest-xot-base-test | Pest.php con XotBaseTest | ls/rg | FAIL | nessun `Pest.php` ne `pest.php`; 0 test |
| 20-filesystem-before-assertions | path asseriti nei test | rg `class_exists`, `base_path` | N-A | 0 test, 0 asserzioni |
| 53-tdd-fonti-esterne | coverage, regressioni, docs/coverage | `php -m`, git log | FAIL | Xdebug presente; ultimi commit con tests: 2 righe ma solo `.gitkeep`; `docs/coverage.md` assente |
| 03-quality-gates | preflight tool, pint, phpstan, pest, phpinsights, marker | vedi gate | FAIL | pint/phpstan/pest/phpinsights presenti; phpstan 690, phpinsights sotto soglia; marker `<<<<<<<` 0 |
| 11-phpstan | neon immutato, errori, ignore | `git diff --stat phpstan.neon.dist`, rg | FAIL | neon immutato (0 diff); 690 errori; `@phpstan-ignore` 0. Il prompt cita `phpstan.neon.dist`, il canonico ora e' `phpstan.neon` |
| 11-phpinsights | punteggio | `tools/phpinsights.sh` | FAIL | 80.4/93.4/64.7/62.6, soglia non raggiunta; baseline non disponibile |
| 10-ponytail-audit | interfacce, classi senza riferimenti | rg | PASS | 0 interfacce; 0 classi con un solo riferimento nel modulo (ma i due alberi si citano a vicenda); candidato morto principale: tutto l'albero maiuscolo duplicato, 3 file `.old/.to_do` |
| 24-boy-scout | difetto locale | lettura phpstan | PASS | `config/trade-filament.php:154` cita `Filament\Http\Middleware\MirrorConfigToSubpackages` (class.notFound, pacchetto non installato); fix: rimuovere la voce o dichiarare la dipendenza |
| 22-ide-helper | pacchetto e comando | `grep composer.json`, `artisan list` | PASS | `ide-helper` in composer.json: 0 occorrenze dirette ma `artisan list | grep ide-helper` = 5 comandi; dry-run models non eseguito (DB sqlite vuoto) |
| 23-optimize | cache e route | `artisan about --only=cache`, `route:list --path=trade --json` | PASS | config/events/routes NOT CACHED, views CACHED; `route:list --path=trade` = `[]` (nessuna route Trade registrata) |
| 07-documentation-standards | link, nomi, project-agnostic | python/rg | PASS | 0 link relativi, 0 nomi di progetto, 0 date nei nomi |
| 12-documentation | README/index, changelog, YAML | ls/rg | FAIL | `docs/README.md` e `docs/index.md` assenti; 0 changelog; 0 frontmatter |
| 19-docs-second-brain | qmd, duplicati, link | qmd, find | FAIL | `qmd search "Trade Binance bot"` 0 risultati: il modulo non e' nel second brain; 0 duplicati |
| 42-delete-obsolete-files-safely | candidati | find | FAIL | 3 candidati: `Console/Commands/TradeWithInterval.old`, `Actions/FirstBotAction.old`, `Config/binance.old`; 22 gemelli case-insensitive (`Config/` vs `config/`, ecc.) |
| 44-module-docs-continuous | docs con codice | `git log -10 --stat -- docs` | FAIL | 4 commit docs su 10, ma messaggi "." e nessuna correlazione al codice; `status docs` pulito |
| 52-mappa-proprieta-docs | area -> pagina docs | `ls docs | rg` | FAIL | 0 aree (Actions, Models, Filament, lang, tests, database) documentate; docs = `analisi-convenzioni.md`, `analisi-moduli-moderni.md`, `prd-trade-refactorizzazione.md` |
| 45-full-module-audit | composito | esito dei prompt sopra | FAIL | rischio alto: albero duplicato, 690 errori phpstan, 0 test, 0 traduzioni, Resource senza base Xot |
| 50-trigger-operativi | citato da 00-start | `grep 50-trigger-operativi 00-start.md` | FAIL | 0 occorrenze: il controllo dichiarato nel catalogo fallisce (00-start non cita il prompt 50) |
| 54-notify-handoff-storico | solo Notify | n/a | N-A | modulo Trade |

## Pest

(vedi aggiornamento finale sotto)

## Difetti dei prompt

1. Tutti i prompt con `rg -L ...` (25, 26, 04, 07, 06-filament, 28, 29, 11): in ripgrep `-L` e' `--follow`, non "file senza match". Il controllo restituisce ogni file e da' falsi FAIL (ho misurato 34/17 invece di 0/17 su Trade, 139 invece di 3 strict_types su Cms). Testo: sostituire con `rg --files-without-match '<pat>' <dir>` oppure `grep -L`.
2. 43-php-files-structure punto 2: `rg -l --pcre2 '\A(?!<\?php)'` senza `-U` valuta `\A` a ogni riga, quindi segnala tutti i file (45/45 su Trade, 142/142 su Cms). Testo: `for f in $(find $M/app -name '*.php'); do head -1 "$f" | grep -q '^<?php' || echo "$f"; done`.
3. `rg` non e' un eseguibile (funzione di shell): negli script non-interattivi dei prompt fallisce con "command not found". Aggiungere nota: usare `grep -rn` o il wrapper `claude --ripgrep`.
4. 01-confidence-bootstrap, 13, 14, 52: assumono layout `app/` + `config/` lowercase e `Modules/<Mod>/`, ma Trade ha un albero duplicato maiuscolo tracciato (nwidart). Mancano due controlli: "albero duplicato" (`diff -rq Actions app/Actions`) e "classi doppie con stesso FQCN" (causa di 245 errori phpstan duplicati). Proposta: aggiungere a 13 il punto `for d in Actions Models Filament Http Providers; do diff -rq $d app/$d; done` => nessuna directory maiuscola duplicata.
5. 11-phpstan: cita `laravel/phpstan.neon.dist`, ma il canonico e' `laravel/phpstan.neon` (la coordinazione l'ha corretto). Il prompt dice "0 errori" senza indicare come trattare moduli senza `Pest.php` o con alberi duplicati; aggiungere "riportare il conteggio per cartella prima di correggere".
6. 10-pest-xot-base-test e 29: pretendono `tests/Pest.php` ma non dicono cosa fare per moduli senza alcun test (Trade): rendere esplicito "modulo senza test => FAIL, creare Pest.php e un test di fumo" o N-A.
7. 06-filament-audit: `XotBaseResource` e' richiesto per ogni Resource, ma Trade usa `Resource` Filament diretto e Cms usa `LangBaseResource`. Controllo mancante: verificare che `LangBaseResource` estenda `XotBaseResource` prima di dichiarare FAIL. Il comando `rg -L 'extends XotBaseResource'` non e' sufficiente (vedi difetto 1).
8. 50-trigger-operativi: il catalogo dice "verificare che sia citato da 00-start" ma 00-start non lo cita (0 occorrenze): o il prompt 00-start va aggiornato o il controllo e' obsoleto.
9. 22-ide-helper: `grep 'ide-helper' laravel/composer.json` da 0 anche con comandi disponibili (pacchetto in `require-dev` di un modulo o di Xot). Proposta: usare `php artisan list | grep ide-helper`.
10. 08-playwright-ui: "SKIP se curl APP_URL non risponde" ma `APP_URL=http://localhost` risponde 200 anche se non e' l'app: usare `php artisan route:list --path=<mod>` come prerequisito (qui `[]` per Trade: nessuna route).
11. 12-documentation / 97 / 55: i controlli di frontmatter falliscono per moduli con docs minime: aggiungere "modulo con < 5 md => N-A".
