<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Resources\Pages\Concerns\HasWizard;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Js;

use function request;
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
abstract class XotBaseWizardWidget extends XotBaseWidget
{
    use EvaluatesClosures;
    use HasWizard {
        getWizardComponent as getParentWizardComponent;
    }

    /** @var class-string */
    protected static string $resource;

    protected ?int $wizardStartStep = null;

    protected int|string|array $columnSpan = 'full';

    /**
     * Elenco step del wizard. Implementato nel widget concreto.
     *
     * @return array<string, Step>
     */
    abstract public function getSteps(): array;

    /**
     * Recupera lo step iniziale dall'URL o usa lo step iniziale di default.
     *
     * Utilizza la proprietà $wizardStartStep se definita più avanti nel stack,
     * altrimenti restituisce 1.
     */
    public function getStartStep(): int
    {
        // Check if step is specified in URL parameter
        $stepParam = request('step');
        if ($stepParam) {
            $steps = $this->getSteps();
            $stepKeys = array_keys($steps);
            $index = array_search($stepParam, $stepKeys, true);
            if ($index !== false) {
                return $index + 1; // Convert to 1-based index
            }
        }

        return $this->wizardStartStep ?? 1;
    }

    final public function getWizardComponent(): Wizard
    {
        /** @var Wizard $wizard */
        $wizard = $this->getParentWizardComponent();

        $wizard = $wizard->persistStepInQueryString();

        if (! inAdmin()) {
         $wizard = $wizard->view('pub_theme::components.wizard');
        }

        return $wizard;
    }

    protected function hasSkippableSteps(): bool
    {
        return true;
    }

    protected function getCancelFormAction(): Action
    {
        $url = $this->previousUrl ?? $this->getResourceUrl();
        $spaUrl = is_string($url) ? $url : null;

        return Action::make('cancel')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.cancel.label'))
            ->alpineClickHandler(
                FilamentView::hasSpaMode($spaUrl)
                    ? 'document.referrer ? window.history.back() : Livewire.navigate('.Js::from($url).')'
                    : 'document.referrer ? window.history.back() : (window.location.href = '.Js::from($url).')',
            )
            ->color('gray');
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    public function getResourceUrl(?string $name = null, array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?Model $tenant = null, bool $shouldGuessMissingParameters = true): string
    {
        if (filled($name) && ($name !== 'index') && method_exists($this, 'getRecord')) {
            $parameters['record'] ??= $this->getRecord();
        }

        $url = static::getResource()::getUrl($name, $parameters, $isAbsolute, $panel, $tenant, $shouldGuessMissingParameters);

        return is_string($url) ? $url : '';
    }

    /**
     * @return class-string
     */
    public static function getResource(): string
    {
        /** @var class-string $resource */
        $resource = static::$resource;

        return $resource;
    }

    protected function getSaveFormAction(): Action
    {
        $hasFormWrapper = $this->hasFormWrapper();

        return Action::make('save')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
            ->submit($hasFormWrapper ? $this->getSubmitFormLivewireMethodName() : null)
            ->action($hasFormWrapper ? null : $this->getSubmitFormLivewireMethodName())
            ->keyBindings(['mod+s']);
    }

    protected function getSubmitFormAction(): Action
    {
        return $this->getSaveFormAction();
    }

    protected function getSubmitFormLivewireMethodName(): string
    {
        return 'save';
    }
}
