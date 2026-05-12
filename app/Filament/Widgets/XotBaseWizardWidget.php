<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Resources\Pages\Concerns\HasWizard;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
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
 * @see LangServiceProvider
 * @see AutoLabelAction
 * @see FilamentView  (disponibile per override di getCancelFormAction nei widget dominio)
 * @see Js            (disponibile per override di getCancelFormAction nei widget dominio)
 */
abstract class XotBaseWizardWidget extends XotBaseWidget
{
    use HasWizard {
        // Override the getWizardComponent method to customize it for widgets
        getWizardComponent as getParentWizardComponent;
    }

    public int $wizardStartStep = 1;

    protected int|string|array $columnSpan = 'full';

    /**
     * Elenco step del wizard. Implementato nel widget concreto.
     * Nome allineato allo standard Filament {@see HasWizard::getSteps()}.
     *
     * @return array<int, Step>
     */
    abstract public function getSteps(): array;

    /**
     * Costruisce il {@see Wizard} direttamente — NON tramite `getParentWizardComponent()`.
     *
     * `HasWizard::getWizardComponent()` chiama `->cancelAction(Action)` / `->submitAction(Action)`
     * ma {@see Wizard::cancelAction()} accetta solo `string|Htmlable|null` — incompatibile
     * con oggetti `Action` nel contesto widget → ViewException al render.
     */
    public function getWizardComponent(): Component
    {
        $wizard = Wizard::make($this->getSteps())
            ->startOnStep($this->wizardStartStep)
            ->skippable($this->hasSkippableSteps())
            ->persistStepInQueryString('step');

        if (! inAdmin()) {
            $wizard = $wizard->view('pub_theme::components.wizard');
        }

        return $wizard;
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
        return false;
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
}
