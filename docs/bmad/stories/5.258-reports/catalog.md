# Catalogo prompt 5.258

Fonte: `bashscripts/docs/prompts/` (78 file, 408 KB correnti dopo la dedup non committata; base `360bf54e`). Classificazione completa in `catalog.tsv` (colonne: file, classe, dup_of, tema, gruppo).

Conteggi: 78 file = 57 canonici (MODULE 39, REPO 12, REF 6) + 21 doppioni (dup_of valorizzato).

## Convenzioni di esecuzione

- Cwd = root repo `/mnt/nas07/var/www/_bases/base_trade_fila5`. `<Mod>` in `Activity AI Cms Gdpr Job Lang Media Notify Seo Tenant Trade UI User Xot`. `M=laravel/Modules/<Mod>`.
- Sola lettura: i comandi sotto non scrivono. Dove il prompt originale dice "correggi", l'agente di matrice riporta il difetto e non modifica.
- PHPStan: `cd laravel && vendor/bin/phpstan analyse Modules/<Mod> --memory-limit=2G --no-progress` (config implicita `laravel/phpstan.neon.dist`, level max, neon immutabile). Pass = 0 errori.
- Pest: `cd laravel && vendor/bin/pest Modules/<Mod>/tests`. Rischio DB: non lanciare se `.env` punta a DB di dati reali (vedi 03 sezione "0) raggiungibilita' DB"): in tal caso registrare SKIP_DB.
- Sintassi: `find $M -name '*.php' -not -path '*/vendor/*' -print0 | xargs -0 -n50 php -l | grep -v '^No syntax errors'` (pass = output vuoto).
- Lock: `bash bashscripts/lock/check.sh <file>` (exit 0 = libero). Non serve in sola lettura.
- Ogni modulo e' un repo git proprio: `git -C $M status --porcelain=v1 -b`.
- Strumenti NON installati: `vendor/bin/phpmd`, `laravel/tools/phpmd.sh`, `laravel/phpmd-ruleset.xml` (solo `Modules/{AI,Cms,Gdpr,Seo}/phpmd.ruleset.xml`). PHPInsights: `laravel/vendor/bin/phpinsights` presente. `gh` non installato.
- Pest bootstrap: `Modules/Trade/tests/Pest.php` assente; `Modules/Cms/tests/pest.php` e `Modules/Xot/tests/pest.php` minuscoli presenti (violano 10-pest).

## Doppioni e canonico proposto

| Doppione | Canonico | Nota |
|---|---|---|
| start | 00-start | start.md e' v32, 00-start e' v33 (stesso `id`); start.md ha richieste utente grezze (vedi perso) |
| 27-confidence-bootstrap | 01-confidence-bootstrap | identici (7613 byte), `id: confidence-bootstrap` duplicato |
| 04b-controller-to-folio-actions | 02-controller-to-folio-actions | stesso slug `02-...`, stesso `id`; la base 04b aveva in piu' il prompt "Leggi gitmodules.ini ed entra in ogni repository" (righe 4423-4491) |
| 04-filament | 04-datas-not-dtos | titolo "Datas, mai DTO", nome dice filament: contenuto Data/DTO |
| 05-livewire-to-filament-widgets, 05-widget | 28-livewire-to-filament-widgets | 28 e' il piu' completo (procedura, find/rg, validazione, regole permanenti); 05-widget e' una concatenazione di 5 prompt |
| 06-filament | 06-filament-audit | 06-filament (Audit delle risorse) e' la versione compatta, stessa slug |
| 08-ui | 08-playwright-ui | slug `08-ui-playwright` |
| 06-testing-standards | 29-testing-standards | quasi-dup: 06 e' riferimento generico in inglese (518 righe, senza slug), 29 e' l'esecutivo IT; i pattern di 06 vanno in appendice di 29 |
| 10-test | 10-pest-xot-base-test | |
| 20-filesystem | 20-filesystem-before-assertions | |
| 09-migrations-forward-only | 09-migrations | file rotto (vedi difetti) |
| 17-ponytail | 10-ponytail-audit | identici (410 righe base), entrambi contengono il prompt gitmodules path iteration; il canonico gitmodules e' 17-gitmodules-path-iteration |
| 16-git, 17-git | 16-git-forward-only | 16-git e' concatenato con GSD audit; slug `17-git-forward-only` di 17-git |
| 17-gitmodules-sync | 48-gitmodules-sync | 48 e' la sede dove ricollocare il prompt sync v2.0 |
| 18-github | 18-github-issues | 18-github contiene anche "Traduzioni a cinque elementi" (slug `18-translations-five-elements`) |
| 30-documentation-standards | 07-documentation-standards | identici (507 righe), titolo = nome file |
| 15-bmad | 15-bmad-audit | stessa slug; 15-bmad aggiunge triage Quick Flow vs BMAD completo: da fondere |
| 19-docs | 19-docs-second-brain | stessa slug |
| daily-report | 98-daily-report | daily-report (903 righe) contiene v4 piu' una versione precedente concatenata; 98 e' v4 pulito (348 righe) |

Doppioni funzionali non fusi (sovrapposizione parziale, restano canonici separati): 32 (copre 33+34), 11-phpstan e 11-phpinsights (contaminati l'uno dall'altro), 12-documentation / 44 / 19-docs-second-brain, 45 / 46 / 52.

## Checklist per prompt canonico

Formato: controlli numerati; pass = condizione dopo `=>`.

### G01 sessione

**00-start (REPO)** sessione di bootstrap, non per modulo.
1. Marker merge: `/bin/grep -rl '^<<<<<<< ' --exclude-dir=.git --exclude-dir=vendor --exclude-dir=node_modules laravel/Modules/<Mod> bashscripts` => vuoto.
2. JSON funzionali: `python3 -c "import json,sys;json.load(open(sys.argv[1]))" $M/composer.json` (idem `module.json`) => nessun errore.
3. Lock e standing order: `test -e bashscripts/ai/wiki/memories/agent-standing-order.md` => esiste; leggerlo prima di editare.
4. Gate finale del modulo: PHPStan (vedi convenzioni) => 0 errori.
5. Script citati `bashscripts/tools/second-brain-healthcheck.sh`, `docs/wiki/how-to/api-context-length-exceeded-131072.md`: non esistono (MISSING).

**99-closing-ritual (REPO)** sequenza di chiusura.
1. Docs piu' vicina: `ls $M/docs | head` e `git -C $M status --short docs` => docs del modulo toccata se c'e' stata una modifica.
2. Regola estratta: esiste una nota in `bashscripts/ai/wiki/` o `$M/docs/` per ogni regola emersa => si'/no.
3. `docs/` di root contiene solo indice: `ls docs` => solo `wiki`.
4. Link finali `00-master-prompt.md`, `llm-wiki.md`, `md.md`: MISSING.

**97-YAML-FRONTMATTER-CONVENTION (REF)** audit sui prompt.
1. Parse: `python3 -c "import yaml,re,sys;t=open(sys.argv[1]).read();yaml.safe_load(re.match(r'^---\n(.*?)\n---\n',t,re.S).group(1))" <file>` => nessun errore.
2. Un solo blocco: `grep -c '^---$' <file>` => 2.
3. Campi richiesti `title role scope execution destructive_operations_allowed completion_criteria`: solo 21 file hanno `completion_criteria`, 21 `execution`, 38 usano `execution_mode`. La convenzione contraddice i file (vedi difetti).

**55-md-conventions (REF)** su docs del modulo.
1. Niente date nel nome: `find $M/docs -name '*.md' | grep -E '[0-9]{4}-[0-9]{2}-[0-9]{2}|[0-9]{8}'` => vuoto.
2. Frontmatter: `find $M/docs -name '*.md' -exec sh -c 'head -1 "$1" | grep -q "^---$" || echo "$1"' _ {} \;` => vuoto.
3. Max `.md` in root modulo: `ls $M/*.md | wc -l` => <= 5 (prompt) ma `audit-module-root-hygiene.sh` dice 6 (contraddizione).
4. Root senza `.txt`: `ls $M/*.txt 2>/dev/null` => vuoto.
5. `git -C $M diff --check` => vuoto.

### G02 architettura

**01-confidence-bootstrap (MODULE)** pre-edit.
1. Modulo esiste: `test -d $M` e `git -C $M rev-parse --show-toplevel` => `$M`.
2. Igiene root: `bash bashscripts/tools/audit-module-root-hygiene.sh` (output filtrato su <Mod>) => nessuna riga per <Mod>.
3. Workspace unico: `bash bashscripts/tools/audit-module-workspaces.sh` => <Mod> ok; `ls $M/*.code-workspace | wc -l` => 1.
4. Lock libero sul file target (check.sh).
5. Script citati `guard-module-hygiene.sh`, `run-all-gates.sh`, `docs/MAXIMUM_CONFIDENCE_PROTOCOL.md`: MISSING; usare i due audit sopra.

**01-architecture-patterns (REF)** riferimento agnostico (Core, Migration, Testing, Translation, Quality gates, Anti-patterns). Audit di conformita':
1. Migrations estendono `XotBaseMigration`: `rg -L 'XotBaseMigration' $M/database/migrations -g '*.php'` => vuoto (file senza la base).
2. Nessun `Services`: `find $M -type d \( -name Services -o -name Service \) -not -path '*/vendor/*'` => vuoto.
3. Nessun `DTO`/`Dto`: `find $M -iname '*dto*' -not -path '*/vendor/*'` => vuoto.
4. Traduzioni: `find $M/lang -name '*.php' | wc -l` e `php -l` => nessun errore sintassi.
5. Le sezioni PHPStan L10 multi-agente e "Avvio sessione v30" non sono piu' in questo file (vedi perso).

**13-path-and-naming-rules (MODULE)**
1. `Config/` maiuscola: `ls -d $M/Config $M/config 2>&1` => solo `config`.
2. Listener: `find $M -path '*/Listeners/*.php' -not -path '*/app/Listeners/*' -not -path '*/vendor/*'` => vuoto.
3. Autoload files: `python3 -c "import json;print(json.load(open('$M/composer.json')).get('autoload',{}).get('files'))"` => vuoto o `helpers/Helper.php` esistente.
4. Prefisso `persist`: `rg -n 'function persist' $M/app` => vuoto.
5. Root: nessuna cartella maiuscola (audit-module-root-hygiene.sh).

**14-module-dependency-direction (MODULE)** regola scritta "Geo -> UI": il modulo Geo NON esiste in `laravel/Modules`. Eseguire in forma generale.
1. UI non importa altri moduli di dominio: `rg -n 'use Modules\\(?!UI|Xot)' $M/app --pcre2` per <Mod>=UI => solo Xot.
2. Xot non dipende da moduli foglia: per <Mod>=Xot `rg -n 'Modules\\(Activity|AI|Cms|Gdpr|Job|Lang|Media|Notify|Seo|Tenant|Trade|User)\\' $M/app` => vuoto o motivato.
3. Config/provider: `rg -n 'Modules\\' $M/config $M/app/Providers` => nessun import inverso.
4. Dipendenze dichiarate: `grep -n 'laraxot\|modules' $M/composer.json` coerenti con gli import.

**43-php-files-structure (MODULE)**
1. Sintassi (comando in convenzioni) => vuoto.
2. Codice prima di `<?php`: `rg -l --pcre2 '\A(?!<\?php)' $M/app -g '*.php'` => vuoto.
3. strict_types: `rg -L 'declare\(strict_types=1\)' $M/app -g '*.php'` => vuoto (eccezioni motivate).
4. Namespace vs path: `rg -n '^namespace ' $M/app -g '*.php'` e confronto con `Modules\<Mod>\` + dir; difetti = mismatch.
5. Piu' classi per file: `rg -c '^(final |abstract )?class ' $M/app -g '*.php' | grep -v ':1$'` => vuoto.

### G03 controller e actions

**02-controller-to-folio-actions (MODULE)**
1. Controller HTTP: `find $M/app -path '*Http/Controllers*' -name '*.php'` => vuoto (eccezioni: base/API motivate).
2. Pagine Folio: `find $M -path '*views/pages*' -name '*.blade.php' | head`.
3. Actions: `find $M/app/Actions -name '*.php' | head`.
4. Route verso Controller: `rg -n 'Controller::class|Controller@' $M/routes` => vuoto.
5. Il vecchio contenuto "sync gitmodules v2.0" non appartiene qui (vedi perso).

**25-services-to-actions (MODULE)**
1. `find $M/app -type d \( -name Services -o -name Support \)` => vuoto.
2. `rg -n 'class \w+Service\b' $M/app` => vuoto.
3. Riferimenti a vecchi namespace: `rg -n 'Services\\' $M/app $M/tests $M/config` => vuoto.
4. Actions usano `QueueableAction`: `rg -L 'QueueableAction' $M/app/Actions -g '*.php'` => vuoto o motivato.
5. Regola no-services: `bashscripts/ai/wiki/rules/no-services-rule.md` (esiste).

**26-actions-architecture-audit (MODULE)**
1. `find $M/app/Actions -name '*.php' | sort`.
2. Nome verbo-oggetto e metodo: `rg -n 'public function (execute|__invoke)' $M/app/Actions -g '*.php'`; file senza => difetto.
3. Tipi: `rg -n 'function execute\([^)]*\)\s*\{' $M/app/Actions` (manca return type) => vuoto.
4. Logica UI: `rg -n 'Notification::make|redirect\(|view\(' $M/app/Actions` => vuoto.
5. Test: per ogni Action `rg -l '<ActionName>' $M/tests` => almeno un riferimento.

### G04 data e contracts

**04-datas-not-dtos (MODULE)**
1. Cartelle vietate: `find $M -type d \( -iname dataobjects -o -iname datatransferobjects -o -iname dtos -o -name Data \) -not -path '*/vendor/*'` => vuoto.
2. Suffissi: `find $M -type f \( -name '*Dto.php' -o -name '*DTO.php' \)` => vuoto.
3. Datas valide: `rg -L 'extends (Spatie\\LaravelData\\)?Data' $M/app/Datas -g '*Data.php'` => vuoto.
4. Riferimenti residui: `rg -n 'DTO|Dto\b|DataObjects' $M/app $M/tests` => vuoto.
5. Il blocco "Filament Rules" e' stato rimosso da questo file (vedi perso).

**07-contracts (MODULE)**
1. `find $M/app/Contracts -name '*.php' 2>/dev/null` => vuoto (devono stare in `Models/Contracts`).
2. `find $M -name '*Interface.php' -not -path '*/vendor/*'` => vuoto.
3. `find $M -path '*Models/Contracts/*.php' ! -name '*Contract.php'` => vuoto.
4. Tipi: usare contratti non classi astratte (skill `prefer-contracts-over-abstract-classes`).

### G05 filament e ui

**28-livewire-to-filament-widgets (MODULE)**
1. `find $M -type f \( -path '*/Livewire/*.php' -o -path '*/Http/Livewire/*.php' -o -path '*/views/livewire/*.blade.php' \)` => vuoto.
2. `rg -n 'Livewire\\|livewire:' $M --glob '!vendor' --glob '!docs'` => solo usi legittimi dei widget Filament.
3. Widget: `find $M -path '*/Filament/Widgets/*.php'`; `rg -L 'XotBaseWidget|XotBaseSchemaWidget|XotBaseChartWidget' $M/app/Filament/Widgets` => vuoto.
4. Provider e route senza riferimenti a componenti rimossi: `rg -n 'Livewire::component' $M/app` => vuoto.

**06-filament-audit (MODULE)** (include la parte "Completezza Filament Resource", persa).
1. Resource: `find $M/app/Filament/Resources -maxdepth 1 -name '*Resource.php'`.
2. Per ogni `<Name>Resource`: esistono `Schemas/<Name>Form.php`, `Schemas/<Name>Infolist.php`, `Tables/<Plural>Table.php` (find nella cartella `<Name>Resource/`).
3. Base Xot: `rg -L 'extends XotBaseResource' $M/app/Filament/Resources -g '*Resource.php'` => vuoto; idem `XotBaseResourceForm|Infolist|Table`.
4. Nessuna estensione diretta Filament: `rg -n 'extends (Filament\\Resources\\Resource|Resource)\b' $M/app` => vuoto.
5. PHPStan modulo => 0 errori.

**08-playwright-ui (MODULE)** richiede app in esecuzione: SKIP se `curl -sI $APP_URL` non risponde. Con app: login con utente seed, aprire le route del modulo (`php artisan route:list --path=<mod>` richiede DB), controllare console/richieste fallite e responsive. Pass = nessun errore console. Altrimenti marcare "non eseguibile in sola lettura".

### G06 testing

**29-testing-standards (REF)**
1. Pest bootstrap: `ls $M/tests/Pest.php` => esiste.
2. Nessun PHPUnit: `rg -l 'extends TestCase' $M/tests` => vuoto.
3. Niente RefreshDatabase: `rg -n 'RefreshDatabase|migrate:fresh' $M/tests` => vuoto.
4. strict_types: `rg -L 'declare\(strict_types=1\)' $M/tests -g '*.php'` => vuoto.
5. Nomi descrittivi: `rg -c '^(it|test)\(' $M/tests -g '*.php'`.

**10-pest-xot-base-test (MODULE)**
1. `ls $M/tests/Pest.php` => esiste; `ls $M/tests/pest.php` => assente (Cms, Xot falliscono; Trade manca Pest.php).
2. `rg -n 'XotBaseTest' $M/tests/Pest.php` => presente.
3. `rg -l 'PHPUnit\\Framework\\TestCase' $M/tests` => vuoto.
4. Test per artefatti inesistenti: esecuzione Pest (se DB sicuro) => 0 fail.
5. La parte "PHPMD" concatenata qui appartiene a 03/11.

**20-filesystem-before-assertions (MODULE)**
1. `rg -n 'class_exists|file_exists|is_file|is_dir' $M/tests -g '*.php' | wc -l`; test con `expect(class_exists(...))` verso classi: `rg -o 'class_exists\(\\?([A-Za-z\\]+)::class' $M/tests` poi `test -e` del file.
2. Per ogni path asserito in test: `rg -o "base_path\('([^']+)'\)" $M/tests` e `test -e` => esiste.
3. Nessun file creato per soddisfare asserzioni: `git -C $M log --diff-filter=A --name-only -5` ispezione.

**53-tdd-fonti-esterne (MODULE)**
1. Coverage disponibile? `cd laravel && vendor/bin/pest Modules/<Mod>/tests --coverage` richiede Xdebug/PCOV: `php -m | grep -i 'xdebug\|pcov'`.
2. Test di regressione per ultime correzioni: `git -C $M log -10 --stat -- tests`.
3. `rg -n 'RefreshDatabase' $M/tests` => vuoto.
4. Documento coverage: `ls $M/docs/coverage.md`.

### G07 qualita

**03-quality-gates (MODULE)** pipeline Pint, PHPStan, Pest, PHPMD, PHPInsights.
1. Preflight: `test -x laravel/vendor/bin/{pint,phpstan,pest}` => ok; PHPMD assente => registrare "strumento mancante".
2. Pint: `cd laravel && vendor/bin/pint --test Modules/<Mod>` (mai `--parallel`) => exit 0.
3. PHPStan (convenzioni) => 0 errori.
4. Pest (convenzioni) o SKIP_DB.
5. PHPInsights: `cd laravel && vendor/bin/phpinsights analyse Modules/<Mod> --no-interaction --config-path=phpinsights.php` => nessun errore di score minimo (se `phpinsights.php` esiste: `ls laravel/phpinsights.php`).
6. Marker: `/bin/grep -rl '^<<<<<<< ' $M` => vuoto.

**11-phpstan (MODULE)** livello max senza toccare config.
1. `git -C laravel diff --stat -- phpstan.neon.dist` => vuoto.
2. PHPStan modulo => 0 errori; riportare totale e prime 10 righe.
3. `rg -n 'ignoreErrors|@phpstan-ignore' $M/app | wc -l` (ignore senza identifier = difetto): `rg -n '@phpstan-ignore(-line|-next-line)?\s*$' $M/app` => vuoto.
4. Guida: `bashscripts/ai/wiki/rules/phpstan-l10-fix-workflow.md` (esiste).

**11-phpinsights (MODULE)** vedi punto 5 di 03. Pass = nessun file con issue "Complexity" o "Architecture" nuove rispetto al baseline.

**10-ponytail-audit (MODULE)** audit YAGNI.
1. Interfacce con una sola implementazione: `rg -l 'interface ' $M/app` poi `rg -c 'implements <Nome>' $M/app`.
2. Classi astratte senza figli, Actions mai chiamate: `rg -c '<Classe>::class|<Classe>\b' $M` = 1 => candidate morte.
3. Config non usate: chiavi in `$M/config/*.php` senza `rg 'config\(.<chiave>'`.
4. Riportare solo candidati, non cancellare (42-delete-obsolete).

**24-boy-scout (MODULE)** lettura: scegliere un difetto locale gia' emerso da PHPStan/Pint e descriverlo. Pass = rilievo con file, motivo, verifica.

**22-ide-helper (MODULE)**
1. `grep -n 'ide-helper' laravel/composer.json` (pacchetto presente?).
2. `cd laravel && php artisan list | grep ide-helper` (richiede `.env` valido, ora presente).
3. Dry run non esiste: riportare solo se `php artisan ide-helper:models --nowrite -N` per `Modules\<Mod>\Models` genera diff (richiede DB: SKIP se non raggiungibile).

**23-optimize (MODULE/REPO)** `cd laravel && php artisan optimize:clear` e `php artisan optimize` modificano cache: in sola lettura limitarsi a `php artisan about --only=cache` e `php artisan route:list --path=<mod> --json | head`. Pass = nessun errore.

### G08 db e modelli

**09-migrations (MODULE)**
1. Una migration di creazione per Model: per ogni `$M/app/Models/*.php` cercare `rg -l "Schema::create|tableCreate" $M/database/migrations`.
2. Base: `rg -L 'XotBaseMigration' $M/database/migrations -g '*.php'` => vuoto.
3. Nessun `down()` distruttivo: `rg -n 'dropIfExists|drop\(' $M/database/migrations` ispezionare.
4. Nomi `YYYY_MM_DD_HHMMSS_create_<plurale_snake>_table.php`: `ls $M/database/migrations | grep -vE '^[0-9]{4}_[0-9]{2}_[0-9]{2}_[0-9]{6}_(create|update|add)_'` => vuoto.
5. Niente `migrate:fresh|refresh|RefreshDatabase`: `rg -n 'migrate:fresh|migrate:refresh|RefreshDatabase' $M` => vuoto.

**21-translations (MODULE)**
1. Lingue: `ls $M/lang`; confronto chiavi tra lingue (script php o `diff <(php -r ...)`): chiavi mancanti => difetto.
2. Hard-coded: `rg -n "->(label|title|placeholder|helperText)\('[A-Za-z]" $M/app` => vuoto.
3. Chiavi a cinque elementi `modulo::risorsa.sezione.campo.attributo` (vedi frontmatter di 21): `rg -n "trans\('[^']+'" $M/app | rg -v '::[a-z_]+\.[a-z_]+\.[a-z_]+\.[a-z_]+'`.
4. File di lang: `php -l` su `$M/lang/*/*.php` => vuoto.
5. File con ".navigation" da completare (richiesta utente persa da start): `rg -l '\.navigation' $M/lang`.

**32-model-migration-factory-seeder (MODULE)** matrice per Model: migration (09), factory `$M/database/factories/<Model>Factory.php`, seeder `$M/database/seeders/`, test. Comando: `for f in $M/app/Models/*.php; do n=$(basename $f .php); echo "$n $(ls $M/database/factories/${n}Factory.php 2>/dev/null|wc -l) $(rg -l "$n" $M/database/seeders|wc -l)"; done`. Pass = pivot/value model giustificati.

**33-migrations-audit (MODULE)** come 09, con matrice Model senza owner e doppioni. Riferimento `laravel/Modules/Performance/.../MyLog.php`: MISSING (modulo Performance assente).

**34-factories-seeders-audit (MODULE)**
1. `find $M/database/factories -name '*.php'` e `php -l`.
2. `rg -n 'rand\(|random' $M/database/seeders` (dati casuali fragili).
3. Idempotenza: `rg -c 'firstOrCreate|updateOrCreate' $M/database/seeders`.
4. Test factory: `rg -l 'Factory::new|factory\(' $M/tests`.

**35-policies-permissions-audit (MODULE)**
1. `find $M/app/Policies -name '*.php'`; Model con policy: confronto con `$M/app/Models`.
2. Stringhe permesso sparse: `rg -n "->can\('|authorize\('|hasPermissionTo\('" $M/app` e verificare enum/costanti.
3. Resource senza policy: per ogni Resource `rg -l 'Policy' $M/app`.
4. Test positivi e negativi: `rg -l 'Policy|can\(' $M/tests`.

**36-events-jobs-notifications (MODULE)**
1. `find $M/app/{Events,Listeners,Jobs,Notifications} -name '*.php'`.
2. Listener registrati: `rg -n 'Event::listen|\$listen|ShouldQueue' $M/app`.
3. Job: `rg -L 'tries|backoff|timeout' $M/app/Jobs -g '*.php'` (mancanza = rilievo).
4. Mappa evento->listener->job->notifica in tabella.

**37-providers-container-bindings (MODULE)**
1. `find $M/app/Providers -name '*.php'` + `php -l`.
2. Provider estende `XotBaseServiceProvider`: `rg -L 'XotBaseServiceProvider' $M/app/Providers`.
3. Binding superflui: `rg -n '->bind\(|->singleton\(' $M/app/Providers`.
4. Riferimenti a vecchi Services: `rg -n 'Services\\' $M/app/Providers` => vuoto.

**38-config-routes-views (MODULE)**
1. `rg -n 'env\(' $M/app $M/routes $M/resources -g '*.php'` => vuoto (solo `config/`).
2. `find $M/routes -name '*.php'` + `php -l`; nomi route: `rg -n "->name\(" $M/routes`.
3. Namespace view: `rg -n "loadViewsFrom|view\('" $M/app | head`.
4. Traduzioni nelle view: `rg -n '>[A-Z][a-z]+ [a-z]+<' $M/resources/views -g '*.blade.php'` (testi hard-coded).

**39-composer-dependencies (MODULE)**
1. `cd $M && composer validate --no-check-publish` => exit 0 (richiede composer).
2. Autoload PSR-4: `python3 -c "import json;print(json.load(open('$M/composer.json'))['autoload'])"` e `test -d` di ogni dir.
3. Pacchetti inutilizzati: per ogni `require` fare `rg -l '<namespace>' $M/app` (ricerca testuale non basta, vedere provider/config).
4. Script rotti: ogni `scripts` che punta a file: `test -e`.

### G09 git e github

**16-git-forward-only (REPO)**
1. `git -C $M status --porcelain=v1 -b` => riportare branch, dirty.
2. `git -C $M remote -v` => elencare tutti i remote.
3. Marker: `git -C $M diff --check` e `/bin/grep -rl '^<<<<<<< ' $M` => vuoto.
4. `git -C $M log --oneline -5` per contesto; nessuna operazione distruttiva.
5. Contraddizione standing order: il prompt dice "non fare commit salvo richiesta", lo standing order impone add/commit/pull/push su tutti i remote a fine modulo.

**17-gitmodules-path-iteration (REPO)**
1. `grep -n '^path' gitmodules.ini | head` (formato custom).
2. Per ogni path: `git -C <path> rev-parse --show-toplevel`, `status --porcelain=v1 -b`, `remote -v`.
3. Confronto: `ls laravel/Modules laravel/Themes` vs path dichiarati => segnalare mancanti/non dichiarati.
4. Tabella: path, root git, branch, remoti, stato, azione.

**48-gitmodules-sync (REPO)** (sede del sync v2.0 perso).
1. Come 17-path-iteration, piu' `git -C <path> fetch --dry-run` solo se autorizzato.
2. Ahead/behind: `git -C <path> rev-list --left-right --count HEAD...@{u}`.
3. Stato bloccante: DIRTY, LOCKED, DIVERGED, UNRELATED_HISTORIES (vedi skill `gitmodules-sync-paths`); mai rebase/force.
4. Script canonico: `bashscripts/lock/phpstan-analyze-modules.sh` e skill `gitmodules-sync-paths` (esistono); `bashscripts/tools/claims-open.py`: MISSING.

**18-github-issues (REPO)** `gh` non installato: pass = riportare "non eseguibile" con prova `which gh`. Alternativa: `git -C $M remote -v` per ricavare owner/repo; nessuna modifica remota.

**51-conflitti-git-current-change (REPO)**
1. `/bin/grep -rl '^<<<<<<< \|^>>>>>>> ' $M --exclude-dir=vendor --exclude-dir=node_modules`.
2. `git -C $M diff --check`.
3. `bash bashscripts/tools/check-conflict-markers.sh` => exit 0 (2 = merge in corso).
4. Pass = nessun marker; altrimenti elenco file con numero di blocchi.

### G10 docs e processo

**07-documentation-standards (REF)**
1. Nomi senza date (vedi 55).
2. Root docs: `ls $M/docs | head -30`; max file in root modulo (audit-module-root-hygiene.sh).
3. Link relativi validi: `rg -o '\]\((\.\.?/[^)#]+)' -r '$1' $M/docs --no-filename` poi `test -e` risolto rispetto al file.
4. Esempi project-agnostic (no nomi di progetto): `rg -n 'Fixcity|Ptvx|PTVX' $M/docs` => vuoto.
5. Link citati `02-workflow.md`, `03-quality.md`, `01-architecture.md`, `docs/file.md`, `docs/old-pattern.md`: esempi, non file reali.

**12-documentation (MODULE)**
1. `ls $M/docs/README.md $M/docs/index.md 2>&1`.
2. Link rotti (comando 07.3).
3. Niente cronologia: `rg -n 'changelog|release notes|Aggiornato il [0-9]' $M/docs -i` => vuoto.
4. YAML parse su ogni md di `$M/docs` (97).

**15-bmad-audit (REPO)**
1. `ls bashscripts/ai/wiki/BMAD-README.md` (esiste); `docs/wiki/bmad-method-v63.md` MISSING.
2. `ls _bmad* .bmad* bmad* 2>/dev/null` e `ls docs/bmad`.
3. Story del modulo: `ls $M/docs/bmad/stories 2>/dev/null` o `$M/docs/stories`.
4. Link/script citati in `docs/bmad`: `test -e` => difetti.

**19-docs-second-brain (MODULE)**
1. `qmd search "<tema modulo>" --limit 5` => almeno 1 risultato.
2. `docs/wiki/index.md` MISSING; indice reale `bashscripts/ai/wiki/`.
3. YAML parse e link (07.3).
4. Nessun duplicato: `find $M/docs -name '*.md' | xargs -n1 basename | sort | uniq -d` => vuoto.

**42-delete-obsolete-files-safely (MODULE)** audit senza rimozione.
1. Candidati: file con nome `*.bak|*.old|*~|*copy*`: `find $M -type f \( -name '*.bak' -o -name '*.old' -o -name '*copy*' \) -not -path '*/vendor/*'`.
2. Gemelli case-insensitive: `find $M -type f | sort -f | uniq -di`.
3. Per ogni candidato `rg -l '<nome>' laravel` => riferimenti.
4. Riportare solo; non cancellare.

**44-module-docs-continuous (MODULE)** processo: `git -C $M log -10 --stat -- docs` e `git -C $M status --short docs`. Pass = ultime modifiche di codice accompagnate da modifica docs.

**47-rules-ondemand (REPO)**
1. `test -e bashscripts/ai/wiki/rules/00-TRIGGER_MAP.md` (esiste); `docs/wiki/rules/00-TRIGGER_MAP.md` MISSING.
2. `qmd search "trigger map" --limit 3` => risultato.
3. Stub: `ls bashscripts/ai/.agents/rules`; link canonici esistenti.

**52-mappa-proprieta-docs (MODULE)** tabella area->owner->percorso: per ogni sezione (Actions, Models, Filament, lang, tests, database) `ls $M/docs | rg -i '<area>'`. Pass = ogni area ha pagina docs nel modulo.

### G11 swarm e report

**45-full-module-audit (MODULE)** audit composito: eseguire i comandi di 02/25/26, 04, 07, 09/33, 21, 28, 06-filament-audit, 35, 36, 37, 38, 43 e PHPStan. Output: matrice area->evidenza->rischio->azione->verifica. Pass = nessun rilievo senza percorso e comando.

**46-multi-agent-module-swarm (REPO)** 1. `ls laravel/Modules` vs assegnazioni; 2. `bash bashscripts/lock/status.sh` (locks attivi); 3. `find laravel -name '*.lock' -not -path '*/vendor/*'`; 4. tabella agente->scope->stato->handoff. Pass = nessun file con due agenti.

**50-trigger-operativi (REF)** trigger `refacto remember history fix study`: verificare solo che il prompt sia citato da `00-start`; nessun comando.

**54-notify-handoff-storico (MODULE, solo Notify)** 1. `ls laravel/Modules/Notify/docs | head`; 2. matrice model-migration-factory-seeder (32) per Notify; 3. `rg -n 'channel|via\(' laravel/Modules/Notify/app | head`; 4. `ls laravel/Modules/Notify/lang`. Per gli altri moduli: N/A.

**56-multiple-ai (REPO)** 1. `bash bashscripts/lock/status.sh`; 2. story attiva: `ls $M/docs/bmad/stories | tail -3`; 3. `git -C $M status --short` per attribuire modifiche; 4. PHPStan senza neon alternativi: `git -C laravel diff --stat -- phpstan.neon.dist` => vuoto.

**98-daily-report (REPO)** 1. `git -C $M log --since=midnight --format='%an|%h|%s'`; 2. contributori distinti; 3. Volume: `git -C $M log --since=midnight --shortstat | tail -3`; 4. report in `bashscripts/docs/worklog/` (esiste dir? `ls bashscripts/docs`: NO, MISSING `docs/worklog`). Pass = report per un solo contributore.

## MISSING (difetti dei prompt)

Script e strumenti:
- `bashscripts/quality-gates/verify-llm-wiki.sh` (gate finale di 15+ prompt: 02, 04b, 04, 05, 07, 09, 10, 11, 14, 16, 20, 00-start...). Esistono solo `merge-markers/`, `class-load-fatals/`, `audit-module-theme-root-files.sh`.
- `bashscripts/tools/guard-module-hygiene.sh`, `bashscripts/tools/run-all-gates.sh` (01, 27); `bashscripts/tools/second-brain-healthcheck.sh` (00-start, start); `bashscripts/tools/claims-open.py` (standing order).
- `laravel/tools/phpmd.sh`, `laravel/tools/phpmd.phar`, `laravel/phpmd-ruleset.xml`, `docs/phpmd.xml`, `laravel/vendor/bin/phpmd` (03, 00-start, 10-pest, 11). PHPMD non e' eseguibile.
- `laravel/phpstan.neon` (00-start, 03, 11, start): il file reale e' `laravel/phpstan.neon.dist`.
- `laravel/.env.testing` (00-start, start). `gh` CLI (18, 98-daily-report, 99).

Documenti:
- `AGENTS.md` in root (letto per primo da ~20 prompt; esistono `bashscripts/ai/AGENTS.md`, `bashscripts/ai/wiki/AGENTS.md`).
- `docs/chat/INDEX.md` e `docs/chat/` (protocollo operativo di ~20 prompt; lo standing order dice `docs/chat/` congelato).
- `docs/wiki/concepts/agent-bootstrap-compact.md`, `docs/wiki/rules/00-TRIGGER_MAP.md`, `docs/wiki/index.md`, `docs/wiki/log.md`, `docs/wiki/bmad-method-v63.md`, `docs/wiki/rules/{migration-filename-from-model-name,pest-bootstrap-pascal-case-only,phpstan-neon-immutable,post-edit-quality-gate}.md`, `docs/wiki/memories/response-style-sintetico-conciso-italiano.md`, `docs/wiki/how-to/api-context-length-exceeded-131072.md`. Gli omonimi esistono sotto `bashscripts/ai/wiki/` (concepts, rules, memories): path root errato, `docs/wiki/` di root esiste ma e' una cartella vuota. Anche `bashscripts/docs/root-script-policy.md` e `modular-bmad-story-policy.md` (citati dalle regole di bridge) non esistono.
- Link di frontmatter `depends_on`/`related`: `YAML-FRONTMATTER-CONVENTION.md` (reale: `97-YAML-FRONTMATTER-CONVENTION.md`), `00-master-prompt.md`, `00-MASTER-v30.md`, `MANIFEST.md`, `START.md`.
- `docs/MAXIMUM_CONFIDENCE_PROTOCOL.md`, `docs/sprint-status.yaml`, `docs/stories/`, `docs/wiki/second-brain/`, `docs/chat/start-md-accumulated-backlog-2026-09-08.md`, `docs/mylog-morph-relation.md`, `docs/planning-artifacts/investigation-worklog-mai-generato-2026-08-07.md`, `docs/worklog/**` (98, daily-report), `docs/decision-log.md`, `docs/roadmap.md`.
- Link morti nei titoli concatenati: `llm-wiki.md`, `md.md` (99, 00-start), `17-ponytail-audit.md`, `17-merged.md`, `16-merged.md`, `16-gsd-audit.md`, `18-merged.md`, `18-translations-five-elements.md`, `11-merged.md`, `11-phpstan-level-max.md`, `05-merged.md`, `05-module-completeness.md`, `05-phpstan-patterns.md`.
- Moduli citati ma assenti da `laravel/Modules`: Geo (14), Performance (09, 33: MyLog, IndennitaResponsabilita), Rating (01-architecture), Limesurvey, Ptv (daily-report; `Modules/Ptv` e' citato anche nello standing order).

## Difetti trasversali

1. Concatenazioni: 05-widget (4 `MERGED FROM`, 28 delimitatori `---`), 10-ponytail-audit/17-ponytail/16-git/18-github (3 `MERGED FROM` + `ORIGINAL MERGED CONTENT`), 08-playwright-ui, 10-pest, 11-*, 13, 14, 16-git-forward-only, 20-filesystem-before-assertions (1 `MERGED` e `# FROM:`; ciascuno ripete 2-4 volte lo stesso prompt con frontmatter diversi). Violano la regola "numero = un file" di `qmd://concepts/prompts-sibling-hygiene.md`.
2. Titolo/slug diversi dal nome: 04-filament ("Datas, mai DTO"), 05-widget (slug 05-livewire-...), 06-filament (slug 06-filament-audit), 08-ui (slug 08-ui-playwright), 09-migrations (slug `09-migrations-forward-only`), 10-ponytail-audit e 17-ponytail (slug `17-gitmodules-path-iteration`), 11-phpstan (slug `11-phpstan-level-max`, titolo = nome), 14-module-dependency-direction (titolo "Ingest della documentazione"), 15-bmad (slug 15-bmad-audit), 16-git (slug 16-git-forward-only), 17-git (slug 17-git-forward-only), 18-github (slug `18-translations-five-elements`, titolo = nome), 19-docs, 20-filesystem, 04b e 02 (stesso slug e id), 21-translations (slug `translations-audit` vs nome), 99 (slug `closing-ritual`), 00-start e start (stesso id `laraxot-prompts-623a4377c7e2`), 01 e 27 confidence (id `confidence-bootstrap` duplicato).
3. Frontmatter rotto: 03-quality-gates (chiavi `version`, `language`, `updated_at`, `description` duplicate, due `# 03` v3.33.0 e v3.34.0, marker corretti ma doppio blocco), 09-migrations-forward-only (30 righe: due frontmatter, `source_of_truth` due volte, riga `description` ripetuta, nessun corpo), 06-testing-standards e 07/30 (`slug` assente, titolo = nome), 29 file con piu' di 2 delimitatori `---` (blocchi frontmatter nel corpo: `for f in *.md; do [ $(grep -c '^---$' $f) -gt 2 ] && echo $f; done`).
4. Convenzione 97 vs realta': richiede `execution` e `completion_criteria`, ma solo 21 file li hanno; 38 usano `execution_mode`. Aggiornare 97 o i file (propongo aggiornare 97).
5. 06-filament-audit corrente: il blocco "Audit Filament" ripetuto due volte di seguito; manca "Completezza Filament Resource".
6. Contraddizioni con `agent-standing-order.md`: (a) `docs/chat/` come canale di coordinamento nei prompt vs "congelato, solo story BMAD"; (b) 17-git "non fare commit salvo richiesta" vs commit/push per modulo su tutti i remote; (c) gate "su file" (03, 02) vs "modulo intero" (standing order 5); (d) max 5 `.md` in root (00-start) vs soglia 6 nello script audit; (e) `docs/sprint-status.yaml` come tracker vs story in `docs/bmad/stories`; (f) richiesta di aggiornare `docs/` di root (07, 44) vs "docs di root solo indice".
7. Contenuto rimasto non agnostico: nomi progetto `Fixcity Fila5`, `Ptvx Fila5`, `PTVX Fila5` nel campo `project` (stessi prompt, valori diversi).
8. 14-module-dependency-direction cita solo Geo -> UI; Geo non esiste. 21-translations e 06-filament-audit citano wiki non presenti.
9. 98-daily-report e daily-report contengono `Daily Worklog Generator — v4` due volte nello stesso file (daily-report) e regole in conflitto sul contributore.
10. Prompt "regola" senza checklist eseguibile nel testo: 22, 23, 24, 42, 47, 50, 52, 54, 56 (corpo di 6-10 righe, comandi non nominati).

## Contenuto unico perso dalla dedup (base 360bf54e)

Righe riferite a `git -C bashscripts show 360bf54e:docs/prompts/<file>`. Calcolo: righe della base assenti dal file corrente E da tutti i 78 file correnti (>25 caratteri).

| File | Blocchi unici rimossi (titolo, righe base) | Ricollocare in |
|---|---|---|
| 02-controller-to-folio-actions | "Prompt Migliorato - Verifica e Sincronizzazione Repository da gitmodules.ini" 180-780 (v2.0: architettura monorepo, setup, ciclo, validazione marker, report, POST-SYNC PHPStan); "gitmodules.ini sync con locking multi-agente" 781-1100; "Verifica Completa 23 Submoduli (v3)" 1101-1333; "Verifica e Sincronizzazione (v3 FINAL)" 1334-1684; "verifica repository da gitmodules.ini" 1685-2015; "Gitmodules Sync v5.4.1" 4292-4422 e "Supplemento da 02-gitmodules-sync.md" 4241-4291. Il corpo 2122-4422 ripete lo stesso materiale (dedup interna possibile) | 48-gitmodules-sync (tenere v3 FINAL + v5.4.1, scartare le copie) |
| 04b-controller-to-folio-actions | stessi blocchi di 02 (180-2015, 2122-4422) piu' "Leggi gitmodules.ini ed entra in ogni repository" 4423-4491 | 17-gitmodules-path-iteration |
| 01-architecture-patterns | "Prompt Migliorato - PHPStan L10 Zero Errors con Coordinazione Multi-Agente" 721-1023 (v2.1); "PHPStan L10 Zero Errors (Optimized v2)" 1024-1370; "PHPStan su tutti i moduli" 1371-1459; ripetuti 2192-2867; "Avvio sessione v30" 1460-1487 e 2931-2955; "Supplemento da 01-phpstan.md" 2956-3255 | 11-phpstan (multi-agente v2.1 + Optimized v2); "Avvio sessione v30" scartare (superato da 00-start v33) |
| 04-datas-not-dtos | "Filament Rules - Project-Agnostic Framework Rules" 191-640 (e copia 853-1302); "Gestione lock" 641-735 (e 1303-1317) | 06-filament-audit (Filament Rules); 03-quality-gates sezione lock (Gestione lock) |
| 06-filament-audit | "Completezza Filament Resource" 138-160 (copia 799-821): Schemas/Form, Schemas/Infolist, Tables per ogni Resource, estensioni XotBase; "Testing Standards - Pest PHP" 161-677 (copia di 06-testing-standards, nessuna perdita) | 06-filament-audit (sezione Completezza) |
| 00-start | 328-339: 1 solo `.code-workspace` per root modulo (nome dal remote), max 5 `.md` in root, niente cartelle maiuscole in root, file di lang con `.navigation` da completare, convenzioni `.md` (no date, frontmatter, indicizzazione) | 55-md-conventions (md); 13-path-and-naming-rules (workspace/root); 21-translations (`.navigation`) |
| start | 264-340: richieste utente grezze (collisioni git, phpstan Modules + ide-helper, `.txt` in docs -> `.md`, niente git lfs e `.gitattributes`, `HasXotFactory` contiene gia' `HasFactory` e `newFactory()`, rename `getXot*` -> `get*` in `HasXotTable`/`XotBaseListRecords` con elenco metodi, preferire `$this->getTable...()` a valori hard-coded) | 03-quality-gates (git lfs, `.txt`, marker); 28-livewire-to-filament-widgets/06-filament-audit (rename `getXot*`); 04-datas-not-dtos non pertinente |
| 03-quality-gates | 14 righe: marker merge `<<<<<<< HEAD` / `>>>>>>> laraxot/dev` in 8 punti (file corrotto, risolti correttamente) e richieste grezze 199-213, 368-400 (phpstan Modules, git lfs, `.gitattributes` png/svg, no `Modules/*/app/Http/Livewire`, root modulo senza cartelle maiuscole e senza `bashscripts graphify-out tools scripts .agents .claude-audit`) | 03-quality-gates (git lfs, root hygiene), 28-livewire (no Http/Livewire) |
| 07-contracts | 6 righe: frontmatter (`id`, `description`, `repository_layout`, `path_policy`) e testo `Contracts nel percorso corretto` | nessun contenuto operativo perso |
| 10-ponytail-audit, 17-ponytail, 16-git, 18-github, 11-phpstan | 2-4 righe ciascuno (frontmatter/duplicati) | nessuna |
| Altri 29 file toccati | nessun contenuto unico (solo copie identiche presenti anche altrove) | nessuna |

Nota: 00-start corrente ha ancora la sezione "Filosofia operativa" e un blocco "Bootstrap operativo" (righe 239-300) gia' duplicati: valutare quale tenere.

## Verifica

- Esistenza path: `test -e` su 120 path citati; elenco MISSING sopra.
- Perdita: script python di confronto righe base vs 78 file correnti (soglia 25 caratteri, riga non vuota).
- Frontmatter: `yaml.safe_load` sul primo blocco di ogni file: unico errore di chiavi duplicate in 03-quality-gates.
