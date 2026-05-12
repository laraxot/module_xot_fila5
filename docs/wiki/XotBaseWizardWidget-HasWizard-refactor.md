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

## Status: ✅ IMPLEMENTATO, RAFFINATO E DRY+KISS (2026-05-12)

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

### `getWizardComponent()` — override NECESSARIO
`HasWizard::getWizardComponent()` chiama:
- `$this->getCancelFormAction()` — esiste solo su `CreateRecord`/`EditRecord`, NON sui widget → **ORA DEFINITO** in XotBaseWizardWidget (ritorna `null`)
- `$this->getSubmitFormAction()` — già definito in XotBaseWizardWidget

**Regola**: override SEMPRE su `XotBaseWizardWidget`, usa `makeWizard()` che aggiunge:
- view tema pub_theme per frontoffice
- `persistStepInQueryString` con policy sicurezza
- `configureWizardNextAction` / `configureWizardPreviousAction` hooks

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

    // Unico punto di costruzione Wizard — policy Laraxot inline, NO makeWizard() intermedio
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

### Metodi rimossi (erano viola di DRY+KISS)

| Metodo | Motivo rimozione |
|--------|------------------|
| `makeWizard(array $steps)` | Wrapper intermedio inutile — logica ora inline in `getWizardComponent()` |
| Bridge `getSteps()→getSteps()` | Abolito con rename a `getSteps()` standard Filament |

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