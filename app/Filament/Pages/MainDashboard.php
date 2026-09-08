<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
use Filament\Facades\Filament;
use Filament\Panel;
use Filament\Pages\Dashboard;
use Illuminate\Support\Str;
=======
use Filament\Panel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Nwidart\Modules\Laravel\Module;
>>>>>>> c7fd73eb (.)
use Webmozart\Assert\Assert;

/**
 * Class Modules\Xot\Filament\Pages\MainDashboard.
 */
class MainDashboard extends XotBaseDashboard
{
<<<<<<< HEAD
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';
=======
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';
>>>>>>> c7fd73eb (.)

    protected string $view = 'xot::filament.pages.dashboard';

    // protected static string $routePath = 'main';

<<<<<<< HEAD
    protected static null|string $title = 'Main Dashboard';

    protected static null|int $navigationSort = 1;
=======
    protected static ?string $title = 'Main Dashboard';

    protected static ?int $navigationSort = 1;
>>>>>>> c7fd73eb (.)

    /**
     * Use the canonical slug so Filament resolves the home link to this page
     * at route name `filament.{panel}.pages.dashboard`.
     */
    public static function getSlug(?Panel $panel = null): string
    {
<<<<<<< HEAD
=======
        unset($panel);

>>>>>>> c7fd73eb (.)
        return 'dashboard';
    }

    public function mount(): void
    {
<<<<<<< HEAD
        Assert::notNull($user = auth()->user(), '[' . __LINE__ . '][' . class_basename($this) . ']');
        $modules = $user->roles->filter(static fn($item) => Str::endsWith($item->name, '::admin'));

        if (1 === $modules->count()) {
            Assert::notNull($module_first = $modules->first(), '[' . __LINE__ . '][' . class_basename($this) . ']');
            $panel_name = $module_first->name;
            $module_name = Str::before($panel_name, '::admin');
            $url = '/' . $module_name . '/admin';
            redirect($url);
        }

        // Solo se non ha accesso a nessun modulo, redirect alla home locale
        if (0 === $modules->count()) {
            $url = '/' . app()->getLocale();
            redirect($url);
=======
        $user = Auth::user();
        Assert::notNull($user, '['.__LINE__.']['.class_basename($this).']');
        // Usa roles() come metodo invece della magic property per type safety
        $modules = $user->getModules();

        if (0 === count($modules)) {
            $url = '/'.app()->getLocale();
            redirect($url);

            return;
        }

        if (1 === count($modules)) {
            $module_first = Arr::first($modules);
            Assert::isInstanceOf($module_first, Module::class);
            $module_name = $module_first->getLowerName();
            $url = '/'.$module_name.'/admin';
            redirect($url);

            return;
>>>>>>> c7fd73eb (.)
        }

        // In tutti gli altri casi, mostra il dashboard con i link ai moduli
    }

    /**
     * Ottiene i widget da visualizzare nella dashboard.
     *
<<<<<<< HEAD
     * @return array<int, string>
     */
    public function getWidgets(): array
    {
        return [
            // Widget per mostrare i moduli disponibili
           //Modules\Xot\Filament\Widgets\ModulesOverviewWidget::class,
        ];
=======
     * @return array<string, mixed>
     */
    public function getWidgets(): array
    {
        return [];
>>>>>>> c7fd73eb (.)
    }

    /**
     * Ottiene il numero di colonne per i widget.
     *
     * @return int|array<string, int|string|null>
     */
    public function getColumns(): int|array
    {
        return 1;
    }
}
