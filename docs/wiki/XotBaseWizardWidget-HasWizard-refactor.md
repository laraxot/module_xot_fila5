# Refactor: use HasWizard in XotBaseWizardWidget

---
title: "XotBaseWizardWidget HasWizard Refactor"
type: concept
confidence: high
created: 2026-05-05
updated: 2026-05-12
last_fix: 2026-05-12 - Aggiunto getCancelFormAction() mancante per HasWizard trait
tags: [filament, wizard, xotbase, haswizard, widget]
related:
  - concepts/filament-haswizard-vs-xotbasewizard.md
  - concepts/filament-wizard-architecture-right-way.md
---

## Status: ✅ IMPLEMENTATO, RAFFINATO, DRY+KISS COMPLETO (2026-05-12)

## Motivazione

`XotBaseWizardWidget` ora usa `use HasWizard` (da `Filament\Resources\Pages\Concerns\HasWizard`)
per allinearsi al pattern ufficiale Filament, evitando la duplicazione della logica wizard.

## Analisi Ridondanze: cosa è necessario vs dead code

### `HasWizard` fornisce
```
form(Schema)          → chiama getWizardComponent() — SOVRASCRIVE XotBaseWidget::form()
getWizardComponent()  → Wizard::make(getSteps())->cancelAction()->submitAction()...
getStartStep()        → return 1
getSteps()            → return [] (override obbligatorio)
hasSkippableSteps()   → return false
```

### `getWizardComponent()` — override OBBLIGATORIO, NON chiamare il parent

`HasWizard::getWizardComponent()` (rinominato `getParentWizardComponent()` via alias) chiama internamente:
- `$this->getCancelFormAction()` — esiste solo su `CreateRecord`/`EditRecord`
- `$this->getSubmitFormAction()` — idem
- `$this->getSubmitFormLivewireMethodName()` — idem

**`$this->getParentWizardComponent()` NON VA MAI CHIAMATO** — causerebbe `BadMethodCallException`.
L'alias `getParentWizardComponent` esiste solo come documentazione dell'intenzione, non per l'uso runtime.

**Regola**: costruire `Wizard::make($this->getSteps())` direttamente con la policy Laraxot:
- `startOnStep()` con `$wizardStartStep`
- `persistStepInQueryString` con policy sicurezza
- `configureWizardNextAction` / `configureWizardPreviousAction` hooks
- view `pub_theme::components.wizard` per frontoffice

### `getFormSchema()` — dead code ma necessario per il contratto
`XotBaseWidget` dichiara `abstract public function getFormSchema(): array`.
`HasWizard::form()` sovrascrive `XotBaseWidget::form()` e chiama direttamente `getWizardComponent()`,
**bypassando completamente `getFormSchema()`** nel path wizard.

**Soluzione**: implementazione triviale `return []` con docblock esplicito.
**NON rimuovere** — PHP richiede soddisfazione del contratto astratto della classe padre.

## Architettura Finale (DRY + KISS)

```php
abstract class XotBaseWizardWidget extends XotBaseWidget
{
    use HasWizard {
        HasWizard::getWizardComponent as getParentWizardComponent; // alias, disponibile se serve
    }

    abstract public function getSteps(): array; // standard Filament

    // NOTA: NON chiamare $this->getParentWizardComponent()
    // Il trait chiama getCancelFormAction()/getSubmitFormAction() che NON esistono sui widget.
    public function getWizardComponent(): Component
    {
        $wizard = Wizard::make($this->getSteps())
            ->startOnStep(fn () => $this->wizardStartStep)
            ->nextAction(fn ($a) => $this->configureWizardNextAction($a))
            ->previousAction(fn ($a) => $this->configureWizardPreviousAction($a))
            ->columnSpanFull()
            ->skippable($this->hasSkippableSteps());

        if ($this->queryStepOverrideAllowed()) {
            $wizard->persistStepInQueryString('step');
        }
        if (! inAdmin()) {
            $wizard = $wizard->view('pub_theme::components.wizard');
        }
        return $wizard;
    }

    // Soddisfa abstract XotBaseWidget::getFormSchema() — MAI chiamato nel wizard path
    public function getFormSchema(): array { return []; }
}
```

### Metodi rimossi (erano violazione di DRY+KISS)

| Metodo | Motivo rimozione |
|--------|------------------|
| `makeWizard(array $steps)` | Wrapper intermedio — logica ora inline in `getWizardComponent()` |
| `getWizardStartStep()` | Alias 1:1 di `getStartStep()` — viola KISS |
| `getWizardSchemaWrapperKey()` | Usato solo da `normalizeWizardFormState()` (rimosso) |
| `validateWizardSubmission()` | Corpo vuoto, mai chiamato da nessun widget |
| `prepareWizardFormData(array $data)` | Funzione identità `return $data`, mai chiamata |
| `isLastStep()` | Mai usato in tutto il codebase |
| `isFirstStep()` | Mai usato in tutto il codebase |
| `getCurrentStepName()` | Mai usato in tutto il codebase |
| `beforeNextStep()` | Hook mai invocato nemmeno da `nextStep()` |
| `afterNextStep()` | Hook mai invocato, corpo vuoto |
| `beforePreviousStep()` | Hook mai invocato nemmeno da `previousStep()` |
| `afterPreviousStep()` | Hook mai invocato, corpo vuoto |
| `normalizeWizardFormState()` | Mai chiamato fuori dalla classe base |
| `stringKeyed()` | Usato solo da `normalizeWizardFormState()` (rimosso) |

### Metodi mantenuti (tutti con chiamanti reali)

| Metodo | Chiamante |
|--------|-----------|
| `wizardMaxStep()` | `resolveInitialStepFromQuery()`, `nextStep()`, `previousStep()` |
| `defaultFormData()` | `initWizardState()` |
| `initWizardState()` | `mount()` nei widget dominio |
| `configureWizardNextAction()` | `getWizardComponent()` |
| `configureWizardPreviousAction()` | `getWizardComponent()` |
| `hasSkippableSteps()` | `getWizardComponent()` |
| `wizardAllowStepQueryExtra()` | `queryStepOverrideAllowed()` (overridato da `CreateTicketWizardWidget`) |
| `queryStepOverrideAllowed()` | `getWizardComponent()`, `resolveInitialStepFromQuery()` |
| `resolveInitialStepFromQuery()` | `initWizardState()` |
| `getWizardComponentKey()` | `nextStep()`, `previousStep()` |
| `nextStep()` | Blade `wire:click` |
| `previousStep()` | Blade `wire:click` |
| `goToStep()` | API pubblica Blade |

## Widget di dominio (pattern corretto)

```php
class CreateTicketWizardWidget extends XotBaseWizardWidget
{
    public function getSteps(): array
    {
        return TicketForm::getSteps();  // Delega a Form class (DRY)
    }
}
```

## Regola: getSteps() — nome standard Filament

Il metodo SI CHIAMA `getSteps()` — stesso nome di `HasWizard::getSteps()` in Filament.
**VIETATO** usare `getSteps()` — era il vecchio nome non standard, ora abolito.

Gli step DEVONO essere definiti in `TicketForm::getSteps()` (o equivalente Form class),
non inline nel widget. Il widget delega, il Form possiede gli step.

## Verificato su
- `GET /it/tests/segnalazione-crea` → HTTP 200 ✅
- PHP syntax check → no errors ✅

## File
- `Modules/Xot/app/Filament/Widgets/XotBaseWizardWidget.php`
- `Modules/Fixcity/app/Filament/Widgets/CreateTicketWizardWidget.php`
- `Modules/Fixcity/app/Filament/Resources/TicketResource/Schemas/TicketForm.php`