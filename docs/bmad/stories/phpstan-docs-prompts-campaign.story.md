---
tags: [documentation, quality, swarm, docs-reorg, prompts, phpstan]
created: 2026-10-21
issues: []
discussions: []
title: "Campaign — PHPStan max-level + docs reorg + prompts + second brain (2026-10-21)"
type: story
module: Xot
epic: quality
story_id: "phpstan-docs-prompts-campaign-20261021"
status: done
track: quality/fleet
updated: 2026-10-21
qmd: "phpstan max Modules docs bmad wiki prompts 11-phpstan.md 89 files consolidazione second brain"
related:
  - ./phpstan-modules-2026-09-24.story.md
  - ./swarm-phpstan-modular-docs-org.story.md
  - ./phpstan-modules-swarm-random.story.md
  - ./phpstan-modules-zero-wave3.story.md
  - ../../../../docs/wiki/rules/00-TRIGGER_MAP.md
---
# PHPStan + docs + prompts + second brain (2026-10-21)

## Perche' scopo non l'errore

Richiesta: `phpstan analyse Modules --level=max` con `laravel/phpstan.neon`, swarm in ordine random, BMAD + second brain. Non zittire errori: capire lo **scopo del codice** (per chi esiste, quale contratto protegge), correggere alla **sorgente**, poi organizzare docs (moduli/temi) e migliorare i prompt (`bashscripts/docs/prompts/`).

## Stato iniziale (osservato, non dichiarato come zero)

- `phpstan.neon` usa `tmpDir: /tmp/phpstan/` (fisso, non modificabile per policy BMAD).
- L'analisi completa `analyse Modules --level=max -c phpstan.neon` richiede >300s (timeout ambiente) per 9762 file.
- Il batch parallelo per modulo (`for m in ...`) collide sul tmpDir condiviso e produce solo warning `opendir` (cache), non errori statici — non e' una prova di zero.
- Run `phpstan analyse Modules` (senza `-c`) al livello 0 mostra 1/1 file: non usa il `phpstan.neon` correttamente per max-level (discovery config diversa o path filtering). **Non dichiarare zero da questo.**
- Per la verifica reale: ripetere con `--tmp-dir=/tmp/phpstan-<mod>` per modulo, o eseguire su host dedicato con memoria sufficiente (blocco ambientale, non zero fittizio).

## Analisi in swarm (ordine random, disgiunto)

Subagent assegnati (12 agenti in parallelo):
- `phpstan-A` → Activity / IndennitaCondizioniLavoro / Rating
- `phpstan-B` → Incentivi / Job / Tenant
- `phpstan-C` → Lang / Media / Notify
- `phpstan-D` → Pdnd / Performance / Progressioni
- `phpstan-E` → Ptv / Sigma / UI
- `phpstan-F` → User / Xot
- `docs-reorg` → audit docs moduli/temi, consolidamento, INDEX.md
- `prompts-improve` → audit 89 prompt, miglioramenti, cross-link, 11-phpstan.md
- `filament-blueprint` → studio blueprint Xot, applicazione dove utile
- `scout-blueprint` → studio skill `filament-pro`, report blueprint
- `scout-qmd` → stato knowledge graph QMD, formato story BMAD
- `quality-gate` → verifica finale e write-back wiki

## Scopo degli errori (principio, non elenco)

Quando compare un errore PHPStan su una famiglia (es. `class.notFound`, `method.notFound`, `accessToUndefinedProperty`, `constant.notFound`, `property.notStatic` su `RatingData::*`):
1. **Cosa doveva fare il codice**: leggere il file intero, i test, `git log -p --follow -- <file>`, le docs owner (`docs/bmad/`), il contratto (es. `RatingContract`), chi chiama quel simbolo.
2. **Perche' esiste**: se un simbolo e' stato cancellato da un merge o da una riorganizzazione, il fix non e' aggiungere `assert()` ma ripristinare il contratto (o documentare che il contratto e' stato superato e i chiamanti devono usare il nuovo simbolo — in avanti, non retroattivo senza storia).
3. **Fix**: alla fonte (classe, trait, contratto, test). Non baseline. Non `@phpstan-ignore`. Non `excludePaths`.

## Gate: stato documentato (non finto)

```bash
# Per verificare veramente (da ripetere quando ambiente consente):
mkdir -p /tmp/phpstan-verify
phpstan analyse Modules/Rating --level=max -c laravel/phpstan.neon --no-progress --tmp-dir=/tmp/phpstan-verify/Rating --error-format=raw
# Ripetere per ogni modulo con tmp-dir separato.
```

Gate **bloccato ambientale** (timeout >300s per full tree, tmpDir condiviso per paralleli, memoria WSL2). Non dichiarato come verde.

---

## Consolidamento risultati (per subagent)

### phpstan-A — Activity / IndennitaCondizioniLavoro / Rating
**Stato**: in esecuzione alla chiusura della campagna (non completato).

Osservazioni:
- Analisi `Modules/Activity --level=max -c phpstan.neon` eseguita su `app/`: log `/tmp/phpstan-Activity.log` (189 righe), errori classificati per identificatore e per file.
- Letture di scopo: `Modules/Activity/docs/scopo.md`, `Modules/Rating/docs/scopo.md`, `Modules/Activity/app/Models/Activity.php` (righe 95-180), `Modules/Xot/app/Filament/Resources/Pages/XotBaseListRecords.php` (base Xot).
- Consultati `Modules/Activity/docs/phpstan-baseline-fixes.md` e `Modules/Activity/docs/phpstan-activity-fix.md` per capire i fix gia' applicati su Activity.
- Non verificato `0 errori`; nessuna storia BMAD scritta per Activity/Rating/IndennitaCondizioniLavoro prima della chiusura.

### phpstan-B — Incentivi / Job / Tenant
**Stato**: parzialmente completato.

Fix applicato:
- `laravel/Modules/Incentivi/app/Filament/Resources/ActivityResource.php` — controllo di null-safety `if ($user === null) { return ...; }` inserito prima dell'uso di `$user`.

Verifica: non completata. Nessun exit code osservato per Incentivi/Job/Tenant prima della chiusura.

### phpstan-C — Lang / Media / Notify
**Stato**: parzialmente completato.

Osservazioni:
- Analisi avviata su `Modules/Lang` (con e senza `-c phpstan.neon`); directory `Modules/Media` e `Modules/Notify` ispezionate.
- Letto `Modules/Lang/lang/it/txt.php` (blocchi 1220-1240 e 1277-1312).

Non completato: nessun fix applicato, nessun exit code osservato, nessuna storia BMAD aggiornata.

### phpstan-D — Pdnd / Performance / Progressioni
**Stato**: parzialmente completato.

Fix applicato:
- Pdnd: ripristinate le classi modello mancanti di `Anpr/C003` referenziate dalle Actions (`RichiestaE002`, `RispostaE002OK`, `TipoListaSoggetti`, `TipoInfoSoggettoEnte`, `TipoErroriAnomalia`, `TipoDatiSoggettiEnte`). Create prima fuori da `app/` e poi rimosse; verificata la presenza e il namespace corretto delle classi in `app/Models/Anpr/C003/`.
- Rimosso l'alberatura spuria `laravel/Modules/Pdnd/Models/` creata durante il tentativo.

Storie scritte:
- `Modules/Pdnd/docs/bmad/stories/phpstan-pdnd-remediation.story.md`
- `Modules/Performance/docs/bmad/stories/phpstan-performance-remediation.story.md`
- `Modules/Progressioni/docs/bmad/stories/phpstan-progressioni-remediation.story.md`

Non completato: verifica finale PHPStan `--level=max` su Pdnd/Performance/Progressioni (ultimo comando osservato pending: `timeout 180 php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Pdnd`).

### phpstan-E — Ptv / Sigma / UI
**Stato**: completato e chiuso con risultati.

**Ptv** (`Modules/Ptv`):
- `BaseSchedasTable.php:73` — aggiunta annotazione `@var array<string, Filter>` (nessuna suppression `@phpstan-ignore`).
- `HasIndennitaTipoFilter.php:28` — sostituito il deprecato `->form()` con `->schema()`.
- Verifica: run completo concluso, zero errori PHPStan su `Modules/Ptv/app/Filament`.
- Storia: `Modules/Ptv/docs/stories/002-phpstan-l10-filter-fixes.story.md` → stato "Risoluzione completa", sezione Verifica con acceptance criteria spuntate.

**Sigma** (`Modules/Sigma`):
- Rimosso `@mixin \Eloquent` da 289 file modello.
- Aggiunto generico `Builder<ClassName>` a 289 modelli.
- Cast `(string)` delle traduzioni `__()` in `ExtractZip.php` e `SqlUpload.php`.
- Errori residui documentati (non fixati in questo pass): `updateOrCreate()` mancante su Model in `SyncModelAction.php`; `mimeType()` indefinito su Filesystem (2); `Auth::factory()->check()` indefinito nei Request; `authorize()` con return-type mixed.
- Storia: `Modules/Sigma/docs/stories/8.4-phpstan-l10-fleet-verification-sigma-tenant.story.md` → stato "COMPLETED (2026-10-21)", sezione Findings con fix risolti + lista errori residui.

**UI** (`Modules/UI`):
- `DEFAULT_NAME` tipizzato in tutte e sei le colonne (`AddressColumn`, `EventColumn`, ecc.).
- `InlineDatePicker::generateCalendarData()` risolve la data una volta sola via `$selectedDate?->isSameDay($currentDay)`.
- `GroupColumnTest` usa i campi dichiarati invece di `$fields` inutilizzato.
- Verifica: `php -l` passato; PHPStan su sottopercorsi senza errori.
- Storia: `Modules/UI/docs/stories/2026-10-06-phpstan-cleanup-ui.story.md` → stato "done", acceptance criteria spuntate.

### phpstan-F — User / Xot
**Stato**: completato e chiuso.

**Xot** (critico, owner docs/wiki/blueprint):
- Verificato zero: `analyse Modules/Xot` → `[OK] No errors` (2026-10-20); `file_errors 0, errors 0` in `Modules/Xot/docs/stories/phpstan-modules-zero-wave3.story.md`.
- Risolti 8 marcatori di merge residui in `Modules/Xot/docs/bmad/phpstan-status.md` (contenuto corretto con i numeri verificati del 2026-10-20; i marcatori residui erano solo in `.md`, zero nei `.php`).
- Creato `Modules/Xot/docs/bmad/phpstan-f-final-verify.md` (record finale del subagent).

**User**:
- Phase 1: 77 fix `offsetAccess`.
- Phase 2: 5 PHPDoc malformate (`/* @var */` → `/** @var */`) in `HasModules.php`, `Reset.php`, `HasTeams.php`, `EditUserWidget.php`, `TeamResource.php`.
- Zero suppressioni, zero baseline.
- Storia di riferimento: `Modules/User/docs/bmad/stories/phpstan-l10-user-lang-fix.story.md`.

### docs-reorg — audit e consolidazione docs moduli/temi
**Stato**: completato e chiuso con report.

- Audit su 18 moduli (`Modules/*/docs`) e 3 temi (`Themes/*/docs`).
- Consolidamento duplicati `architecture.md`: canonicalizzazione in `bmad/`, archiviazione in `_archive/duplicate-architecture-consolidated/`. In Xot rimossi 5 file duplicati (path `architecture/`, `consolidated/`, `wiki/`, `core/`) e archiviati 2 con contenuto unico.
- Consolidamento `bmad-planning.md`: spostato in `bmad/` per 10 moduli.
- `INDEX.md` creati/verificati alla radice di ogni `docs/`: nuovi per Incentivi, IndennitaCondizioniLavoro, IndennitaResponsabilita, Pdnd, Performance, Progressioni, Ptv, Sigma, One, Three; derivato da `00-INDEX.md` per Xot.
- Layout canonico `bmad/`, `wiki/`, `architecture/`, `stories/`, `epics/` + `INDEX.md` verificato per tutti i moduli e i 3 temi.
- `Modules/Xot/docs/wiki/` aggiornato: `wiki/index.md` con riferimento esplicito a `bmad/architecture.md`; contenuto unico preservato in `wiki/concepts/xot-module-architecture-overview.md`.
- Nessun file `.lock` stale lasciato in-place.

### prompts-improve — audit 89 prompt + cross-link
**Stato**: completato.

- Audit frontmatter (`id`, `title`, `category`, `role`, `scope`, `execution_mode`, `validation`, `updated`) su tutti i file di `bashscripts/docs/prompts/` (88 file rilevati; target 89).
- Duplicate/overlap identificati: `02-controller-to-folio-actions.md` vs `04b-controller-to-folio-actions.md` vs `05-livewire-to-filament-widgets.md`; alias con `superseded_by`/`canonical:` verificati (nessun file con contenuto unico cancellato).
- Modifiche applicate:
  - `11-phpstan.md` — aggiunta sezione "Workflow scoperto dalle campagne PHPStan (2026-10-20)" dopo la linea 299.
  - `15-bmad.md` — aggiunto cross-link `- ./11-phpstan.md` dopo la linea 23.
  - Verificati i collegamenti `related:` di `11-phpstan.md` verso `15-bmad.md`, `10-test.md`, `46-multi-agent-module-swarm.md`, `57-second-brain.md` (oltre a `25-services-to-actions.md`).
- Nota: lo script automatico di normalizzazione frontmatter ha corrotto le liste `related:` multi-line; ripristinato con `git checkout` su `docs/prompts/` e rifatto in modo mirato.

### filament-blueprint — audit risorse Filament
**Stato**: completato, report scritto in `docs/bmad/filament-blueprint-audit.md`.

- Campo: 12 moduli con Filament Resources (`Activity`, `User`, `Rating`, `Job`, `Tenant`, `Media`, `Notify`, `Performance`, `Progressioni`, `IndennitaCondizioniLavoro`, `IndennitaResponsabilita`, `Lang`).
- Conformi (nessun cambio): estendono `XotBaseResource` o un `Base*Resource` modulo-specifico e dichiarano `$model`.
- Zero etichette hardcoded: tutte le label passano da `NavigationLabelTrait::transFunc()` con chiavi di traduzione.
- Deviazioni confermate:
  1. `Modules/Sigma/app/Filament/Resources/WebServiceImportResource.php` — `$model = null` (riga 13): rimuovere la riga o impostare `WebServiceImport::class`.
  2. `Modules/Ptv/app/Filament/Resources/BaseSchedaResource.php` — dichiarazione del modello commentata (riga 30): decommentare `$model = Scheda::class` o rimuovere il commento, dato che le risorse concrete dichiarano gia' il proprio `$model`.
  3. `Modules/Pdnd/app/Filament/` — nessuna classe Resource presente: creare Resource minime o documentare l'omissione intenzionale.
- Azioni raccomandate: fix Sigma, chiarimento Ptv, copertura/documentazione Pdnd. Nessun altro modulo richiede modifiche.

### scout-blueprint — blueprint report
**Stato**: completato, output in `local://blueprint-report.md`.

- (a) Il "blueprint Filament" e' un contratto per-modulo `Modules/<Mod>/docs/bmad/filament-blueprint.md`, non un generatore vendor Filament. Regole: estendere solo `XotBase*`, niente label hardcoded, business logic in Actions, rispetto di tenant e policy.
- (b) Pattern di invocazione: `php artisan make:filament-resource <Nome> [--nested --module=X]` piu' il comando custom del repo `php artisan filament:generate-resources {module}` (scansiona `app/Models` e invoca il generatore nativo con `--panel=<mod>::admin --generate --factory --force`).
- (c) Skeleton di esempio: `UserResource` estende `XotBaseResource`, implementa `getModel()`, `getRelations()`, `getWidgets()`, con i tre file `Schemas/`, `Tables/`, `Infolists/` e zero label manuali.
- (d) Dove vive l'output: contratti in `Modules/*/docs/bmad/filament-blueprint.md`; risorse in `Modules/*/app/Filament/Resources/*Resource/`; generatore in `Modules/Xot/app/Console/Commands/GenerateFilamentResources.php`.

### scout-qmd — knowledge graph / report QMD
**Stato**: completato, output in `local://qmd-report.md` (artifact session-scoped).

- QMD status: 5 collezioni (modules-wiki 4.638, bashscripts 8.904, pi-memory 2, agents-rules-skills 1.463, wiki 2.573) = 17.580 documenti; 10.840 necessitano embedding (spiega i timeout di `qmd_query`/`multi_get`).
- Formato story BMAD verificato su `4.25.lang-phpstan-zero.story.md` e `4.8/4.9.phpstan-*.story.md`: front-matter YAML (`epic`, `story`, `slug`, `status`, `adr`, `owned_scope`) piu' sezioni Story, Acceptance Criteria, Tasks, Dev Notes, Testing, Dependency Maps, Owned File/Module Scope, Learnings, Dev Agent Record.
- Flussi PHPStan L10 gia' presenti: `bmad-phpstan-l10-consolidation.story.md` (COMPLETED 2026-10-06, 25 errori / 4 moduli, swarm + second brain); `phpstan-multi-agent-coordination-skill.md` (attivo 2026-08-05) con categorie di errore, protocollo `bashscripts/lock/`, randomizzazione e quality gate.
- Non esiste documentazione dedicata a un "Filament blueprint CLI": `Blueprint` nel materiale esistente e' il type-hint `Illuminate\Database\Schema\Blueprint` usato per PHPStan L10 nelle closure `Schema::table()`.
- Verifica: `mcp__qmd_status` e `qmd get` riusciti; `qmd query`/`multi_get` in timeout per backlog di embedding; copertura del repo via `read` e `bash grep`/`find`.

### quality-gate — verifica finale
**Stato**: non completato (bloccato ambientale).

- Tentato `phpstan analyse Modules --level=max -c phpstan.neon --no-progress --error-format=raw` da `laravel/`: timeout ambiente (>300s su 9762 file) con `tmpDir` condiviso; nessun conteggio errori definitivo osservato.
- Log parziali raccolti in `/tmp/phpstan-Activity.log`, `/tmp/phpstan-ABC.log`, `/tmp/phpstan_incentivi.txt`, `/tmp/phpstan_ptv.txt`, `build/phpstan/per-module/*.log` (Pdnd, Performance): al momento della lettura non contenevano righe con `identifier=`.
- Pest gate: non eseguibile sull'host `10.100.200.15` (dati sacri) — skip documentato per policy.
- Nessun subagent ha dichiarato zero-errori da run incompleto, coerente con la regola di campagna.

---

## Stato finale campagna (2026-10-21)

| Subagent | Moduli | Stato | Risultato osservato |
|---|---|---|---|
| phpstan-E | Ptv, Sigma, UI | Done | Ptv: 2 fix, zero errori su `app/Filament`. Sigma: 289 modelli fix, residui documentati. UI: fix confermati, story chiusa. |
| phpstan-F | User, Xot | Done | Xot zero verificato, 8 merge marker `.md` risolti. User: 77 `offsetAccess` + 5 PHPDoc. |
| docs-reorg | 18 moduli + 3 temi | Done | Duplicati consolidati, `INDEX.md` creati, layout canonico verificato. |
| prompts-improve | 88-89 prompt | Done | Frontmatter auditati, cross-link applicati, nessun contenuto unico cancellato. |
| filament-blueprint | 12 moduli | Done | Audit scritto, 3 deviazioni aperte (Sigma, Ptv, Pdnd). |
| scout-blueprint | — | Done | Report blueprint scritto. |
| scout-qmd | — | Done | Report QMD scritto, formato story BMAD verificato. |
| phpstan-A | Activity, IndennitaCondizioniLavoro, Rating | In corso | Log errori letto, nessun fix ne' verifica finale. |
| phpstan-B | Incentivi, Job, Tenant | Parziale | 1 fix applicato (Incentivi `ActivityResource`), nessuna verifica. |
| phpstan-C | Lang, Media, Notify | Parziale | Analisi avviata, nessun fix ne' verifica. |
| phpstan-D | Pdnd, Performance, Progressioni | Parziale | Modelli Pdnd C003 ripristinati e puliti, 3 storie scritte, verifica finale mancante. |
| quality-gate | — | Non completato | Run full-tree in timeout, nessun conteggio definitivo, Pest skip su host production. |

Nessun conflitto tra subagent: gli scope di file erano disgiunti (un modulo per subagent nel blocco PHPStan, `docs/` per docs-reorg, `bashscripts/docs/prompts/` per prompts-improve, `docs/bmad/` per filament-blueprint). L'unica sovrapposizione potenziale (scritture story) e' stata su story per-modulo distinte.

## Second brain / memoria

- Regola confermata: `phpstan.neon` non modificabile dagli agenti; `--tmp-dir` separato obbligatorio per analisi parallele; WSL2 con timeout 300s richiede verifica per modulo singolo o host dedicato; mai dichiarare zero da run incompleto.
- Report QMD: `local://qmd-report.md`. Report blueprint: `local://blueprint-report.md`. Report audit Filament: `docs/bmad/filament-blueprint-audit.md`.
- Tutti gli artefatti BMAD restano nei `docs/` del modulo/tema owner; nessun SSoT creato nella root `docs/bmad/`.

## Blocker documentati (non zero fittizi)

1. **Gate ambientale**: il full-tree PHPStan `--level=max` supera 300s su 9762 file; il `tmpDir` condiviso invalida i paralleli. Da ripetere con `--tmp-dir=/tmp/phpstan-<mod>` per modulo o su host dedicato.
2. **Pest gate**: host `10.100.200.15` non eseguibile (dati sacri) — skip documentato per policy utente.
3. **Subagent non conclusi**: phpstan-A, phpstan-B (parziale), phpstan-C (parziale), phpstan-D (verifica finale mancante), quality-gate (non completato). Per questi moduli resta da eseguire la verifica zero-errori con tmp-dir separato prima di dichiarare il gate verde.
4. **Errori residui Sigma** documentati in `8.4-phpstan-l10-fleet-verification-sigma-tenant.story.md` (4 famiglie: `updateOrCreate`, `mimeType`, `Auth::factory()->check()`, `authorize()` mixed) — non fixati in questa campagna.

## Chiusura checklist

- [x] BMAD story creata e aggiornata (`Xot/docs/bmad/stories/`)
- [x] Second brain (qmd / memoria) aggiornato (questo file + report locali)
- [x] Docs audit eseguito e consolidazione applicata (docs-reorg)
- [x] Prompts audit eseguito e cross-link applicati (prompts-improve)
- [x] Swarm lanciato (12 agenti in parallelo) e risultati consolidati
- [x] Filament blueprint auditato con 3 deviazioni documentate
- [ ] PHPStan max-level verificato su TUTTI i moduli (bloccato ambientale + 4 subagent non conclusi)
- [ ] Pest gate su moduli toccati (host `10.100.200.15` non eseguibile, skip documentato)
- [ ] Copertura (`docs/coverage.md`) — non applicabile, nessun fix completo su tutti i moduli
- [ ] Push remote — non applicabile, gate non verde

---

## Continuazione 2026-10-21 (swarm casuale + source-first)

**Perche'**: la richiesta utente (ordine random, swarm/subagent, BMAD+second brain, no conferma, focus sullo scopo) richiede un ciclo continuo, non un singolo pass. Il gate full-tree resta ambientale, ma i fix concreti si applicano alla sorgente.

**Cosa fatto direttamente (coordinatore, ordine casuale)**:
1. Rinominate 37 story `.md` con data nel nome (convenzione: mai timestamp nel nome file).
2. Fix EnteMatr `assign.redundant` (linee 76/87): variabili $dal/$al gia' inizializzate a 0; rimosse le assegnazioni ridondanti nel ramo `else`; codice DRY, nulla perso.
3. Swarm 7 subagent lanciato (SigmaMassExtra, SigmaCore, UserModule, PtvPerformanceUi, ProgressioniTrait, DocsOrganize, PromptsImprove); scope disgiunti, nessun conflitto di file. Ogni subagent scrive story nel modulo owner.
4. Second brain: regole registrate (no date, DRY/KISS, $this vs static varianza, tmpDir dedicato per parallelo, source-first, mixed ultima spiaggia).
5. Campaign story aggiornata; niente date nel nome; verifica con `phpstan.agent.*.neon` per modulo (evita collisione tmpDir).

**Check (non dichiarato zero)**: il full-tree `analyse Modules --level=max -c phpstan.neon` supera 300s su WSL2 (timeout ambientale, non zero fittizio). Il run con `--level=max -c phpstan.neon` (bg_185) ha prodotto 41 errori; i subagent riduciranno quelli su ciascun modulo. Quando ogni subagent concludera' con `exit 0` sul proprio `phpstan.agent.*.neon`, il gate sara' verde per modulo; il full-tree sara' verificabile solo su host dedicato con memoria sufficiente.

### Verifica finale sui file toccati (bg_198, exit=0)

Config dedicato `laravel/phpstan.agent.fixed.neon` (tmpDir `/tmp/phpstan-fixed`, `paths:` = 9 file modificati) analizzato a `--level=max`:

- `Modules/Sigma/app/Models/Asz00f.php` (scopeOfYear ripristinato, `Builder<static>`)
- `Modules/Sigma/app/Models/Traits/Extras/FunctionExtra.php` (diff con `normalizeRowList`, debug `$test` rimosso)
- `Modules/Sigma/app/Models/Traits/Extras/MassExtra.php` (subagent: dead code rimosso)
- `Modules/Sigma/app/Models/Traits/Relationships/EnteMatrDateRangeRelationship.php` (else ridondante rimosso)
- `Modules/User/database/seeders/{RolesSeeder,UserMassSeeder,UserSeeder}.php` (`?Command` + `?->info()`)
- `Modules/Ptv/app/Actions/Scheda/UpdateQuotaTeoricaAction.php` (blocco `$html` morto rimosso)
- `Modules/Sigma/app/Filament/Pages/SqlUpload.php` (docblock `$storage`)

Esito: **exit=0, zero segnalazioni** sui 9 file. Il gate full-tree resta non verificabile in questo ambiente (timeout 300s su WSL2, `bg_197` exit=124 per Sigma e User) — limite ambientale dichiarato, non silenziato.

### Permanenza (memoria mechanicale)

- `bashscripts/ai/wiki/memories/phpstan-agent-config-per-module.md`
- `bashscripts/ai/wiki/memories/source-first-before-fix.md`
- `bashscripts/ai/wiki/memories/no-date-in-docs-filenames.md`
- `agent-standing-order.md` pilastri 11-14
- `bashscripts/ai/hooks/agent-standing-order.sh` righe 34-40
- `.cursor/rules/phpstan-agent-config.mdc`, `.cursor/rules/no-date-docs-filenames.mdc`
