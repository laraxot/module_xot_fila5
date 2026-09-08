<?php

declare(strict_types=1);

namespace Modules\Xot\Providers\Filament;

<<<<<<< HEAD
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\XotData;
use Filament\Support\Colors\Color;
use Modules\Xot\Datas\MetatagData;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Modules\Xot\Actions\Panel\ApplyMetatagToPanelAction;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Modules\Xot\Actions\Filament\GetModulesNavigationItems;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
=======
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Str;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Modules\Xot\Actions\Panel\ApplyMetatagToPanelAction;
// Remove if not used elsewhere implicitly
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;
>>>>>>> c7fd73eb (.)

abstract class XotBasePanelProvider extends PanelProvider
{
    protected string $module;

    protected bool $topNavigation = false;

    protected bool $globalSearch = false;

    protected bool $navigation = true;

<<<<<<< HEAD
=======
    /**
     * Id/path del panel. Di default derivano dal modulo ({modulo}::admin,
     * {modulo}/admin); i panel trasversali (operator, customer, supplier)
     * li sovrascrivono perché Filament vieta di ri-assegnare l'id dopo
     * la prima chiamata a ->id().
     */
    protected ?string $panelId = null;

    protected ?string $panelPath = null;

    /**
     * Scoperta automatica di resource, pagine, widget e cluster del modulo.
     *
     * I panel per utenti esterni (customer, supplier) la spengono: montano a mano
     * la manciata di schermate che quell'utente deve vedere, e non devono
     * ritrovarsi dentro le resource amministrative del modulo che li ospita solo
     * perche' stanno nella stessa cartella.
     */
    protected bool $discoverModuleComponents = true;

>>>>>>> c7fd73eb (.)
    public function panel(Panel $panel): Panel
    {
        $moduleNamespace = $this->getModuleNamespace();
        $moduleLow = Str::lower($this->module);
<<<<<<< HEAD
        $metatag = MetatagData::make();

        $main_module = Str::lower(XotData::make()->main_module);
        $default = $main_module === $moduleLow;

        $panel = $panel
            ->default($default)
            // ->login()
=======
        $mainModuleLow = Str::lower(XotData::make()->main_module); // Renamed to camelCase
        $default = $mainModuleLow === $moduleLow;

        $panel = $panel
            ->default($default)
            ->login() // UNCOMMENTED
>>>>>>> c7fd73eb (.)
            // ->registration()
            ->passwordReset()
            // ->emailVerification()
            // ->profile()
            ->sidebarFullyCollapsibleOnDesktop();

<<<<<<< HEAD
        app(ApplyMetatagToPanelAction::class)->execute(panel: $panel);
        // ---------------------
        $panel
            ->maxContentWidth('full')
=======
        $panel = app(ApplyMetatagToPanelAction::class)->execute(panel: $panel);
        // ---------------------
        $panel->maxContentWidth('full')
>>>>>>> c7fd73eb (.)
            ->topNavigation($this->topNavigation)
            ->globalSearch($this->globalSearch)
            ->readOnlyRelationManagersOnResourceViewPagesByDefault(false)
            ->navigation($this->navigation)
            // ->tenant($teamClass)
            // ->tenant($teamClass,ownershipRelationship:'users')
            // ->tenant($teamClass)
<<<<<<< HEAD
            ->id($moduleLow . '::admin')
            ->path($moduleLow . '/admin')
            // Configure Filament discovery for module components (unconditional; dirs are expected to exist)
            ->discoverResources(
                in: base_path('Modules/' . $this->module . '/app/Filament/Resources'),
                for: sprintf('%s\\Filament\\Resources', $moduleNamespace),
            )
            ->discoverPages(
                in: base_path('Modules/' . $this->module . '/app/Filament/Pages'),
                for: sprintf('%s\\Filament\\Pages', $moduleNamespace),
            )
            ->discoverWidgets(
                in: base_path('Modules/' . $this->module . '/app/Filament/Widgets'),
                for: sprintf('%s\\Filament\\Widgets', $moduleNamespace),
            )
            ->discoverClusters(
                in: base_path('Modules/' . $this->module . '/app/Filament/Clusters'),
                for: sprintf('%s\\Filament\\Clusters', $moduleNamespace),
            )
=======
            ->id($this->panelId ?? $moduleLow.'::admin')
            ->path($this->panelPath ?? $moduleLow.'/admin')
>>>>>>> c7fd73eb (.)
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
<<<<<<< HEAD
                VerifyCsrfToken::class,
=======
                PreventRequestForgery::class,
>>>>>>> c7fd73eb (.)
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);

<<<<<<< HEAD
       
=======
        if ($this->discoverModuleComponents) {
            $panel
                ->discoverResources(
                    base_path('Modules/'.$this->module.'/app/Filament/Resources'),
                    sprintf('%s\\Filament\\Resources', $moduleNamespace),
                )
                ->discoverPages(
                    base_path('Modules/'.$this->module.'/app/Filament/Pages'),
                    sprintf('%s\\Filament\\Pages', $moduleNamespace),
                )
                ->discoverWidgets(
                    base_path('Modules/'.$this->module.'/app/Filament/Widgets'),
                    sprintf('%s\\Filament\\Widgets', $moduleNamespace),
                )
                ->discoverClusters(
                    base_path('Modules/'.$this->module.'/app/Filament/Clusters'),
                    sprintf('%s\\Filament\\Clusters', $moduleNamespace),
                );
        }
>>>>>>> c7fd73eb (.)

        return $panel;
    }

    protected function getModuleNamespace(): string
    {
        Assert::string($ns = config('modules.namespace'));

<<<<<<< HEAD
        return $ns . '\\' . $this->module;
=======
        return $ns.'\\'.$this->module;
>>>>>>> c7fd73eb (.)
    }
}
