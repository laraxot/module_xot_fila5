---
title: "XotBase Widget Family"
type: concept
module: Xot
related:
  - ./xot-base-classes.md
  - ./filament-class-extension-rules.md
  - ./xot-base-wizard-widget.md
  - ./xotbase-stats-overview-widget.md
  - ./xotbase-schemawidget-pattern.md
---

# XotBase Widget Family

## Perché mai estendere `Filament\Widgets\Widget` direttamente

Ogni modulo che aggiunge un widget Filament deve estendere una delle classi
`Modules\Xot\Filament\Widgets\XotBase*`, mai le classi Filament vendor
direttamente (`Filament\Widgets\Widget`, `TableWidget`, `ChartWidget`,
`StatsOverviewWidget`...). Motivo concreto (non solo convenzione):

- `GetViewByClassAction` risolve automaticamente la vista Blade del widget
  dalla classe (convenzione path modulo → view), evitando che ogni widget
  dichiari `protected static string $view` a mano e che si rompa silenziosamente
  quando il modulo/namespace cambia.
- `TransTrait` centralizza `getNavigationLabel()` e le traduzioni: senza di essa
  ogni widget re-implementa la stessa logica `__($key)` con variazioni.
- Quando Filament cambia firma/contratto tra major version (es. v4→v5, schema
  API), il fix si fa **una volta** nella classe XotBase e si propaga a tutti i
  moduli, invece di dover toccare N widget in N moduli.

Vedi anche `docs/filament-class-extension-rules.md` per la regola generale
(vale anche per Resource/Page, non solo Widget).

## Le classi della famiglia (stato reale, `app/Filament/Widgets/`)

### `XotBaseWidget` (radice comune)
Estende `Filament\Widgets\Widget`, implementa `HasActions, HasForms`.
Fornisce:
- `getFormSchema()` / `form()` — schema vuoto di default (widget senza form
  la lasciano tale; widget con form la sovrascrivono).
- `getFormFill()` — precompila i dati del form da un modello (`getFormModel()`),
  con merge dei default via `getDataDefaults()` se il modello lo espone, e
  fallback su `getAttributes()` se `toArray()` lancia eccezione (tipico con enum
  cast problematici).
- `resolveView()` (privato, chiamato dal costruttore) — auto-risoluzione vista
  via `GetViewByClassAction`, a meno che `$view` sia già stata esplicitamente
  sovrascritta e la vista esista.
- `getWizardSubmitAction()` — action di submit condivisa che punta a una view
  `pub_theme::filament.wizard.submit-button` (lancia eccezione se la vista non
  esiste, per fail-fast invece di silenzio).

Vista di default: `xot::filament.widgets.base`.

### `XotBaseSchemaWidget extends XotBaseWidget`
Aggiunge `InteractsWithSchemas` (Filament Schemas v5) e introduce il pattern
**Widget orchestra, `*Form` class è lo spartito**:
- `formClass(): ?string` — FQCN opzionale di una classe `*Form` esterna.
- `schemaMethod(): string` — metodo da invocare su `formClass()` (default
  `getFormSchema`), utile quando più widget condividono la stessa `*Form` class
  ma espongono sotto-schemi diversi (es. `LoginWidget` e `RegisterWidget` che
  condividono `UserForm` ma chiamano `getLoginFormSchema()`/`getRegisterFormSchema()`).
- Se `formClass()` è `null` (default), usa `getFormSchema()` definito nel
  widget stesso (comportamento legacy, ancora supportato).
- Regola: submit legge sempre `$this->form->getState()`, mai `validateForm()`
  — la validazione vive nello schema/Form class, non nel widget.

### `XotBaseWizardWidget extends XotBaseSchemaWidget`
Specializzazione per wizard multi-step (`Filament\Schemas\Components\Wizard`).
Punti non ovvi:
- `getWizardComponent()` è `final`: gestisce la persistenza dello step in query
  string e sceglie la view wizard (`pub_theme::components.wizard` fuori
  dall'admin, default Filament dentro). Le sottoclassi NON la sovrascrivono,
  overridano solo gli hook (`configureWizardNextAction()`,
  `configureWizardPreviousAction()`, `getWizardSubmitAction()`).
- Override di `?step=` da query string è vietato in produzione: consentito
  solo se `app()->isLocal()` **oppure** `config('app.debug')`, e comunque solo
  se il widget concreto abilita `wizardAllowStepQueryExtra()` (default `false`).
  Vedi il PHPDoc completo in testa alla classe per la policy di sicurezza.
- Le sottoclassi devono implementare `getSteps(): array<string, Step>`.

### `XotBaseTableWidget extends Filament\Widgets\TableWidget`
Usa il trait condiviso `HasXotTable` (stessa logica di
`Modules\Xot\Filament\Resources\Pages` per le tabelle Resource) più
`InteractsWithPageFilters`. Punti non ovvi:
- `getTableRecordKey()` usa `_id` (alias di PK creato da query con join/alias
  custom) con fallback su `id`: hardcodare `id` fa sì che Livewire tratti record
  diversi come identici e li deduplichi nella UI — bug silenzioso.
- `tableOLD()` è codice legacy lasciato come riferimento/esempio, non è il
  metodo `table()` effettivamente chiamato da Filament: non copiarlo cieco nei
  nuovi widget, la config tabella reale va in `table()` fornito da `HasXotTable`.

### `XotBaseChartWidget extends Filament\Widgets\ChartWidget`
Wrapper sottile con `TransTrait` + `InteractsWithPageFilters`. `getHeading()`
deve restare `public` (contratto Filament `ChartWidget`, non riducibile a
`protected`). `getData()`/`getType()`/`getOptionsArray()`/`getHeight()` nel
file sorgente attuale contengono valori di esempio (grafico "line", opzioni
Chart.js con label ancora hardcoded su un caso d'uso "patient registration
trend") — le sottoclassi li sovrascrivono quasi sempre integralmente; non
trattare i default come generici, sono un esempio-modello lasciato in classe
base.

### `XotBaseStatsOverviewWidget extends Filament\Widgets\StatsOverviewWidget`
Il più sottile della famiglia: aggiunge solo `TransTrait`. Nessuna logica
propria — estenderla invece della classe Filament vendor serve solo a restare
uniformi con la regola "mai Filament diretto" e ad avere `TransTrait`
disponibile.

### `XotBaseInfolistWidget extends XotBaseWidget`
Per widget che rendono un `Infolist` (schema unificato Filament v5) invece di
un form. Le sottoclassi implementano `getInfolistSchema()` e
`getInfolistRecord()` (astratti). Vista di default separata:
`xot::filament.widgets.infolist` (non quella di `XotBaseWidget`), con la
stessa auto-risoluzione via `GetViewByClassAction`.

## Riepilogo albero di ereditarietà

```
Filament\Widgets\Widget
└── XotBaseWidget (form/getFormFill/view auto-resolve/TransTrait)
    ├── XotBaseSchemaWidget (Schemas v5, formClass()/schemaMethod())
    │   └── XotBaseWizardWidget (Wizard multi-step, ?step= policy)
    └── XotBaseInfolistWidget (Infolist invece di form)

Filament\Widgets\TableWidget
└── XotBaseTableWidget (HasXotTable, getTableRecordKey via _id)

Filament\Widgets\ChartWidget
└── XotBaseChartWidget (TransTrait, getHeading pubblico)

Filament\Widgets\StatsOverviewWidget
└── XotBaseStatsOverviewWidget (TransTrait, nessuna logica extra)
```

`XotBaseTableWidget`, `XotBaseChartWidget` e `XotBaseStatsOverviewWidget`
**non** passano da `XotBaseWidget`: estendono direttamente le rispettive
classi Filament perché quei contratti vendor (Table/Chart/StatsOverview) sono
già specializzati e incompatibili con il contratto form-centrico di
`XotBaseWidget`.
