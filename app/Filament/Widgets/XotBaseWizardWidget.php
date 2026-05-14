<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Resources\Pages\Concerns\HasWizard;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Modules\Lang\Actions\Filament\AutoLabelAction;
use Modules\Lang\Providers\LangServiceProvider;

/**
 * Base per widget Filament che espongono un {@see Wizard} nello schema.
 *
 * ## Architettura
 *
 * Usa `use HasWizard` (alias `getParentWizardComponent`) ma NON chiama il trait
 * direttamente a runtime: `HasWizard::getWizardComponent()` chiama
 * `->cancelAction(Action)` e `->submitAction(Action)` ma {@see Wizard::cancelAction()}
 * accetta solo `string|Htmlable|null` — `Action` non è `Htmlable` nel contesto widget.
 *
 * La costruzione avviene direttamente con {@see Wizard::make()} + la view pub_theme
 * che usa `$getCancelAction()` / `$getSubmitAction()` come Blade string/null.
 *
 * ## Posizionamento step iniziale
 * `getStartStep()` legge `?step=` dalla request per posizionare il wizard al mount.
 * `persistStepInQueryString('step')` mantiene lo step nel URL durante la navigazione JS.
 *
 * ## Politica Sicurezza ?step=
 * Override numerico NON implicito in produzione (solo local/debug o `wizardAllowStepQueryExtra()`).
 * Chiavi descrittive Filament (es. `form.step-2::data::wizard-step`) sempre accettate:
 * vengono risolte a indice numerico tramite matching sul `getKey()` dello step.
 *
 * @see Wizard
 * @see HasWizard
 * @see \Filament\Resources\Pages\CreateRecord\Concerns\HasWizard
 * @see LangServiceProvider
 * @see AutoLabelAction
 * @see FilamentView  (disponibile per override di getCancelFormAction nei widget dominio)
 * @see Js            (disponibile per override di getCancelFormAction nei widget dominio)
 */
abstract class XotBaseWizardWidget extends XotBaseSchemaWidget
{
    use HasWizard {
        getWizardComponent as getParentWizardComponent;
    }

    public int $wizardStartStep = 1;

    use EvaluatesClosures;

    protected int|string|array $columnSpan = 'full';

    /**
     * Elenco step del wizard. Implementato nel widget concreto.
     *
     * @return array<int, Step>
     */
    abstract public function getSteps(): array;

    public function getWizardComponentKey(): string
    {
        return 'wizard';
    }

    /**
     * Costruisce il {@see Wizard} usando getParentWizardComponent() per mantenere
     * lo standard Filament HasWizard, poi applica customizzazioni Laraxot (view tema, start step).
     */
    public function getWizardComponent(): Component
    {
        /** @var Wizard $wizard */
        $wizard = $this->makeWizard($this->getSteps());

        return $wizard;
    }

    /**
     * Pulsanti Blade custom (`wire:click`): devono chiamare il {@see Wizard} via
     * {@see InteractsWithSchemas::callSchemaComponentMethod()}, non esistono metodi magici sul widget.
     */
    public function nextStep(): void
    {
        $key = $this->getWizardComponentKey();
        $wizard = $this->getSchemaComponent($key);
        if (! $wizard instanceof Wizard) {
            return;
        }

        $currentStepIndex = $wizard->getCurrentStepIndex();

        $this->callSchemaComponentMethod($key, 'nextStep', [
            'currentStepIndex' => $currentStepIndex,
        ]);
    }

    /**
     * Allinea lo step server-side al footer Filament (indice 0-based come {@see Wizard::getCurrentStepIndex()}).
     */
    public function previousStep(): void
    {
        $key = $this->getWizardComponentKey();
        $wizard = $this->getSchemaComponent($key);
        if (! $wizard instanceof Wizard) {
            return;
        }

        $currentStepIndex = $wizard->getCurrentStepIndex();

        $this->callSchemaComponentMethod($key, 'previousStep', [
            'currentStepIndex' => $currentStepIndex,
        ]);
    }

    /**
     * Naviga a uno step specifico per nome.
     */
    public function goToStep(string $stepName): void
    {
        $key = $this->getWizardComponentKey();

        $this->callSchemaComponentMethod($key, 'goToStep', [
            'step' => $stepName,
        ]);
    }

    /**
     * Hook per definire se gli step sono skippable.
     */
    protected function hasSkippableWizardSteps(): bool
    {
        return false;
    }

    /**
     * Centralizza il contratto minimo di un wizard Xot:
     * step iniziale coerente, full width, e step in query solo se consentito.
     *
     * @param  array<int, Step>  $steps
     */
    protected function makeWizard(array $steps): Wizard
    {
        $wizard = Wizard::make($steps)
            ->startOnStep(fn (): int => $this->wizardStartStep)
            ->columnSpanFull()
            ->skippable($this->hasSkippableWizardSteps());

        $wizard = $wizard->persistStepInQueryString();

        if (! inAdmin()) {
            /** @var view-string $wizardView */
            $wizardView = 'pub_theme::components.wizard';
            if (view()->exists($wizardView)) {
                $wizard = $wizard->view($wizardView);
            }
        }

        // Customizzazioni Laraxot
        $wizard->startOnStep($this->wizardStartStep);

        if (! inAdmin()) {
            $wizard = $wizard->view('pub_theme::components.wizard');
        }

        return $wizard;
    }

    public function getStartStep(): int
    {
        return $this->wizardStartStep;
    }

    /**
     * Soddisfa il contratto astratto di {@see XotBaseWidget::getFormSchema()}.
     *
     * @return array<int, Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

    protected function hasSkippableSteps(): bool
    {
        return $this->wizardStartStep <= 1;
    }

    /**
     * Metodi di hook per la navigazione step (opzionali, da sovrascrivere).
     */
    protected function beforeNextStep(): bool
    {
        return true;
    }

    protected function afterNextStep(): void
    {
        // Override per logiche custom
    }

    protected function beforePreviousStep(): bool
    {
        return true;
    }

    protected function afterPreviousStep(): void
    {
        // Override per logiche custom
    }

    protected function queryStepOverrideAllowed(): bool
    {
        return $this->wizardAllowStepQueryExtra();
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultFormData(): array
    {
        return [];
    }

    /**
     * Inizializza lo stato del wizard: step da query + fill dati default.
     * DELEGA a Wizard::getStartStep() per la logica query string.
     */
    protected function initWizardState(): void
    {
        try {
            if (isset($this->form) && is_object($this->form) && method_exists($this->form, 'fill')) {
                $this->form->fill($this->defaultFormData());
            } else {
                $this->data = $this->defaultFormData();
            }
        } catch (\Throwable $e) {
            $this->data = $this->defaultFormData();
        }
    }

    /**
     * Configura l'azione "Avanti" del wizard.
     */
    protected function configureWizardNextAction(Action $action): Action
    {
        return $action;
    }

    /**
     * Configura l'azione "Indietro" del wizard.
     */
    protected function configureWizardPreviousAction(Action $action): Action
    {
        return $action;
    }

    /**
     * Bottone submit sull'ultimo step del wizard.
     */
    protected function getWizardSubmitAction(): Htmlable
    {
        /** @var view-string $submitView */
        $submitView = 'pub_theme::filament.wizard.submit-button';

        if (view()->exists($submitView)) {
            return new HtmlString((string) view($submitView)->render());
        }

        return Action::make('submit')
            ->action('submit')
            ->button();
    }

    protected function getStepByName(string $name): Step
    {
        $schema = Str::of($name)
            ->snake()
            ->studly()
            ->prepend('get')
            ->append('Schema')
            ->toString();

        $labelKey = 'fixcity::ticket_wizard.steps.'.$name.'.label';
        $label = __($labelKey);

        /** @var array<Htmlable|string> $schemaComponents */
        $schemaComponents = $this->$schema();

        return Step::make($label)
            ->label($label)
            ->schema($schemaComponents);
    }

    /**
     * Consentire `?step=` oltre local/debug.
     */
    protected function wizardAllowStepQueryExtra(): bool
    {
        return false;
    }

    protected function wizardMaxStep(): int
    {
        return count($this->getSteps());
    }

    protected function getSubmitFormLivewireMethodName(): string
    {
        return 'submit';
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->color('gray');
    }

    protected function getSubmitFormAction(): Action
    {
        return Action::make('submit')
            ->label(__('filament-panels::resources/pages/create-record.form.actions.create.label'))
            ->alpineClickHandler("\$wire.{$this->getSubmitFormLivewireMethodName()}()")
            ->color('primary');
    }
}
