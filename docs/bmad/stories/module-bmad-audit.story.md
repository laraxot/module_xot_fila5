---
id: Xot/module-bmad-audit-20260928
title: "Xot: baseline BMAD e analisi completa"
status: ready-for-dev
module: Xot
epic: module-governance
priority: P1
created: 2026-09-28
references:
  - ../architecture/module-boundary.md
  - ../brainstorming/module-opportunities.md
  - ../epics/module-roadmap.md
type: story
updated: 2026-11-16
tags: [docs, xot, bmad]
qmd: "story   xot: baseline bmad xot"
---
# Story: Xot: baseline BMAD

Come manutentore del modulo Xot, voglio una baseline BMAD verificabile, così da poter pianificare lavoro senza confondere ipotesi, WIP e comportamento osservato.

## Acceptance criteria

- [ ] Confermare API pubblica e confini con riferimenti a codice reale.
- [ ] Inventariare i flussi critici e collegarli a test Pest.
- [ ] Misurare PHPStan/Pest nel contesto stabile del modulo.
- [ ] Registrare dipendenze, rischi e decisioni nel modulo.
- [ ] Aggiornare lo stato reale in `docs/sprint-status.yaml`.

## Task

- [ ] Revisione architettura.
- [ ] Brainstorming con stakeholder.
- [ ] Decomposizione epic in story più piccole.
- [ ] Quality gate e second-brain write-back.

## Audit 2026-11-16

Audit statico completo del modulo Xot (core/framework: base Filament, Actions generiche, helper, provider). PHPStan level max: **0 errori**.

### Conteggi

- Modelli: 49 file in `app/Models`. Actions: **238 file in 41 sotto-directory** (`Arr`, `Artisan`, `Cast`, `Export`, `Filament`, `File`, `Generate`, `Geo`, `PDF`…): è il motore delle convenzioni del progetto.
- Services: 2 (`RouteService` legacy con `@method` deprecato, `Artisan/Handlers/ModuleCommandHandler`).
- Filament: 154 file — classi base `XotBaseResource`, `XotBasePage`, `XotBaseWidget`, `XotBaseChartWidget`, `XotBaseStatsOverviewWidget`, `XotBaseInfolistWidget`, `XotBaseSchemaWidget`, `XotBaseTableWidget`, `XotBaseWizardWidget`; Resources concrete: Cache, CacheLock, Extra, Log, Module, Session; Pages: Dashboard, EnvPage, HealthPage, SettingPage, MetatagPage, Tenancy.
- Migrazioni: 10. Tests: 329 file, ~872 test Pest; 6 TestCase PHPUnit.
- Routes: `api.php`, `seo.php`, `web.php`, `web_seo.php`.
- Lang: `it` 149 file, `en` 124 file — con file `.backup_20260216_092224` e varianti case duplicate (`cache_lock.php` vs `cache-lock.php`).
- `docs/bmad/`: 61 file; documentazione extra fuori da `docs/` (root modulo: `annotations.md`, `phpstan-status.md` in `docs/`…).

### Findings

1. **[Filament — CRITICO per propagazione] Label hardcoded nella base Xot**: `app/Filament/Resources/XotBaseResource/Pages/XotBaseManageRelatedRecords.php` usa `->label('Nome')`, `->label('Data Creazione')`, `->label('Crea Nuovo')`, `->label('Visualizza')`, `->label('Modifica')` (righe ~88-157) — stringhe italiane hardcoded in una classe base ereditata da tutti i moduli. Anche `Filament/Builders/ColumnBuilder.php` (`->label('ID')`), `FilterBuilder.php` (`->label('Status')`, `->label('Published')`), `ExtraResource/Tables/ExtrasTable.php` (`->label('Extra')`). Totale modulo: 65 `->label()`, 10 `->placeholder()`, 2 `->helperText()`. È la violazione no-filament-labels più costosa del repo perché si propaga.
2. **[Quality] `mixed` e ignore diffusi**: 163 file con `mixed`; 20 `@phpstan-ignore`; 5 TODO/FIXME tra cui `Actions/Filament/Actions/ViewCopyAction.php:47` ("Implement view copying logic" — azione stub esposta), `Providers/XotServiceProvider.php:191` (TODO re-implement Filament), `GenerateTableColumnsByFileAction` che genera codice con `// TODO` literal.
3. **[Code] File non-PHP in app/**: `app/Filament/Pages/Dashboard.oo` e `dashboard.oo` (formato OmniOutliner) committati dentro il codice — da rimuovere o spostare in docs.
4. **[i18n] Backup e duplicati case in lang**: file `*.backup_20260216_092224` in `lang/` (mortai ma nel bundle) e coppie `cache_lock.php`/`cache-lock.php`, `cache.php`/`cache.php.backup…` — pulizia necessaria; gap EN residuo (124 vs 149 file it).
5. **[Filament] Base coerenti**: `XotBasePage` estende legittimamente `Filament\Pages\Page` (è la base); nessun Resource/Page/Widget concreto estende Filament direttamente; `property_exists()` su `$this` in `HasXotTable::getTableSearch()` (riga ~523) è su componente Livewire, non Eloquent — accettabile ma fragile; nessun merge marker.
6. **[Docs] Volume storico**: 61 file bmad con molteplici generazioni di documenti (livewire-to-filament waves, services-to-actions) — indice README esistente ma da aggiornare con l'audit.

### Rischi

- Alto: le label hardcoded nella base Xot influenzano ogni modulo che usa `XotBaseManageRelatedRecords` e i Builder — fix una tantum con beneficio globale.
- Medio: 238 Actions formano la superficie pubblica del framework; ogni refactor ha blast radius largo — PHPStan 0 aiuta ma servono test di contratto sulle base class.

### Next steps (priorizzati)

1. **Fix prioritario**: sostituire le `->label()` hardcoded in `XotBaseManageRelatedRecords`, `ColumnBuilder`, `FilterBuilder`, `ExtrasTable` con chiavi `xot::` (beneficio: tutti i moduli).
2. Rimuovere `Dashboard.oo`/`dashboard.oo` da `app/` e i file `*.backup_*` + duplicati case in `lang/`.
3. Decidere destino di `ViewCopyAction` (stub) e del TODO in `XotServiceProvider:191`.
4. Avviare ratchet su `mixed`/`@phpstan-ignore` nelle Actions core (Arr, Cast, Export).
5. Aggiornare `docs/bmad/README.md`/indice con mappa delle aree (architecture, epics, audits, issues).


