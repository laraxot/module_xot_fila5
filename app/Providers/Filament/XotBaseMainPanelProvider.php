<?php

declare(strict_types=1);

namespace Modules\Xot\Providers\Filament;

<<<<<<< HEAD
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
=======
use Filament\Actions\Action;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
>>>>>>> c7fd73eb (.)
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
<<<<<<< HEAD
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
=======
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
>>>>>>> c7fd73eb (.)
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
<<<<<<< HEAD
use Modules\User\Filament\Pages\Auth\Login;
use Modules\User\Filament\Pages\MyProfilePage;
use Modules\Xot\Actions\Filament\GetModulesNavigationItems;
use Modules\Xot\Actions\Panel\ApplyMetatagToPanelAction;
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Filament\Pages\MainDashboard;
use Nwidart\Modules\Facades\Module;
=======
use Modules\User\Filament\Pages\MyProfilePage;
use Modules\Xot\Actions\Filament\GetModulesNavigationItems;
use Modules\Xot\Actions\Panel\ApplyMetatagToPanelAction;
use Modules\Xot\Filament\Pages\MainDashboard;
>>>>>>> c7fd73eb (.)

abstract class XotBaseMainPanelProvider extends PanelProvider
{
    protected bool $topNavigation = false;

    public function panel(Panel $panel): Panel
    {
<<<<<<< HEAD
        $metatag = MetatagData::make();

        $panel->id('admin')->path('admin');

        if (! Module::has('Cms')) {
           // $panel->login(Login::class);
           $panel->login();
        }

        $panel = $panel->passwordReset()->sidebarFullyCollapsibleOnDesktop()->spa()->profile(null, true);

        app(ApplyMetatagToPanelAction::class)->execute(panel: $panel);
=======
        $panel->id('admin')
            ->path('admin');

        $modules = app('modules');
        $hasCms = is_object($modules) && method_exists($modules, 'has')
            ? (bool) $modules->has('Cms')
            : false;

        if (! $hasCms) {
            // $panel->login(Login::class);
            $panel->login();
        }

        $panel = $panel
            ->passwordReset()
            ->sidebarFullyCollapsibleOnDesktop()
            ->spa()
            ->profile(null, true);

        $panel = app(ApplyMetatagToPanelAction::class)->execute(panel: $panel);
>>>>>>> c7fd73eb (.)

        // Discovery sicura: verifica che le directory esistano
        $resourcesPath = app_path('Filament/Resources');
        $pagesPath = app_path('Filament/Pages');
        $widgetsPath = app_path('Filament/Widgets');

        if (is_dir($resourcesPath)) {
            $panel = $panel->discoverResources(
                in: $resourcesPath,
                for: 'App\\Filament\\Resources',
            );
        }

        if (is_dir($pagesPath)) {
            $panel = $panel->discoverPages(
                in: $pagesPath,
                for: 'App\\Filament\\Pages',
            );
        }

        $panel = $panel->pages([
            MainDashboard::class,
            MyProfilePage::class,
        ]);

        if (is_dir($widgetsPath)) {
            $panel = $panel->discoverWidgets(
                in: $widgetsPath,
                for: 'App\\Filament\\Widgets',
            );
        }
        $panel = $panel
            ->widgets([
                // Widgets\AccountWidget::class,
            ])
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
        $navs = app(GetModulesNavigationItems::class)->execute();
        $panel->navigationItems($navs);

        // Temporaneamente disabilitato per debug tenancy
        // $profile_url = MyProfilePage::getUrl(panel: $panel->getId());
        $profile_url = '#';

<<<<<<< HEAD
        $panel->userMenuItems([
            MenuItem::make()
                ->label(__('user::default.profile.my_profile'))
=======
        $profileLabelRaw = __('user::default.profile.my_profile');
        $profileLabel = is_string($profileLabelRaw) ? $profileLabelRaw : null;

        $panel->userMenuItems([
            Action::make('profile')
                ->label($profileLabel)
>>>>>>> c7fd73eb (.)
                ->url($profile_url)
                ->icon('heroicon-o-user'),
        ]);

        return $panel;
    }
}
