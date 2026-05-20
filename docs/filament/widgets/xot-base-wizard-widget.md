# XotBaseWizardWidget

Classe astratta: `Modules\Xot\Filament\Widgets\XotBaseWizardWidget`  
Estende: [`XotBaseWidget`](./xot-base-widget.md)

## Scopo

Centralizza il comportamento comune ai widget il cui `getFormSchema()` contiene un [`Wizard`](https://filamentphp.com/docs/5.x/schemas/wizards) Filament v5, senza duplicare logica tra moduli.

La regola non è estetica: serve a tenere separati i widget-form generici dai widget con semantica multi-step, così policy, sicurezza e UX restano coerenti in tutto il repository.

## Quando usarla

- Il form principale è un **Wizard** (più `Step`), non un semplice elenco di campi.
- Il widget concreto **deve** implementare `getWizardSteps(): array` (metodo **astratto** sulla base): è il contratto esplicito per `getFormSchema()` / `makeWizard()`.
- Vuoi **policy unica** su `?step=` (solo local/debug o override esplicito via `wizardAllowStepQueryExtra()`).
- Vuoi **costruzione Wizard** con view tema pubblica quando `! inAdmin()`, `persistStepInQueryString()`, `columnSpanFull`.

### Parallelo con `CreateRecord` + HasWizard (Filament)

Nel [pannello](https://filamentphp.com/docs/5.x/resources/creating-records#using-a-wizard) si usa il trait `CreateRecord\Concerns\HasWizard` con `getSteps()` e opzionalmente `hasSkippableSteps()`.

In **frontoffice** (`XotBaseWizardWidget`): stesso componente `Wizard` / `Step`, ma entrypoint Livewire **widget** — `getWizardSteps()` equivale a `getSteps()`, `hasSkippableWizardSteps()` a `hasSkippableSteps()`. Non si mischia il trait sul widget: il contesto non è una Resource page.

## Quando restare su XotBaseWidget

Widget con form lineare, tabelle, statistiche: usare **`XotBaseWidget`** (o `XotBaseTableWidget` dove previsto).

## Hook da estendere

| Metodo | Ruolo |
|--------|--------|
| `wizardMaxStep()` | Numero massimo di step (default: `count(getWizardSteps())`, minimo 1) |
| `hasSkippableWizardSteps()` | Allineato a `HasWizard::hasSkippableSteps()` — default `false` (flussi con privacy/consensi restano sequenziali). |
| `getWizardSchemaWrapperKey()` | Chiave array nello schema che contiene il `Wizard` (default `wizard`) |
| `wizardAllowStepQueryExtra()` | `true` se in produzione si accetta override da config modulo (es. Fixcity) |
| `makeWizard()` | Applica il contratto Xot comune: start step, full width, `skippable`, `?step=` solo se consentito |
| `configureWizardNextAction()` | Hook per comportamento azione avanti (evitare label/tooltip hardcoded nel dominio) |
| `configureWizardPreviousAction()` | Hook per comportamento azione indietro (evitare label/tooltip hardcoded nel dominio) |
| `getWizardSubmitAction()` | Restituisce `Htmlable`. Default: view tema se esiste, fallback `Action::submit('save')`. Metodo centralizzato in base (no override nel dominio). |
| `nextStep()` / `previousStep()` | Metodi pubblici sul widget Livewire: delegano al componente `Wizard` tramite `callSchemaComponentMethod(getWizardComponentKey(), …)`. Necessari se la view Blade custom usa `wire:click="nextStep"` invece del footer Alpine predefinito. |
| `getWizardComponentKey()` | Risolve la chiave del `Wizard` nello schema `form` (es. `form.data::wizard`). |

## Riferimento codice

Implementazione: `laravel/Modules/Xot/app/Filament/Widgets/XotBaseWizardWidget.php`

Esempio dominio: `Modules\Fixcity\Filament\Widgets\CreateTicketWizardWidget`

## Collegamenti

- [XotBaseWidget](./xot-base-widget.md)
- [Indice widget Filament](./index.md)
- [Ticket wizard Fixcity](../../../Fixcity/docs/ticket-wizard-frontoffice.md)
- [Pattern wizard Fixcity](../../../Fixcity/docs/filament-wizard-pattern.md)
- [Regole di qualità](../../../../../../docs/wiki/rules/quality-gate-after-edit.md)