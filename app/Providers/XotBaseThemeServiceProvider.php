<?php

declare(strict_types=1);

namespace Modules\Xot\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;

abstract class XotBaseThemeServiceProvider extends ServiceProvider
{
    public string $name = '';

    public string $nameLower = '';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function boot(): void
    {
        // @var mixed loadViewsFrom($this->module_dir.'/../resources/views', $this->nameLower;
        // @var mixed loadTranslationsFrom($this->module_dir.'/../resources/lang', $this->nameLower;
        // @var mixed loadJsonTranslationsFrom($this->module_dir.'/../resources/lang';
        // @var mixed registerBladeComponents(;
    }

    public function register(): void
    {
        // @var mixed app->register($this->module_ns.'\Providers\RouteServiceProvider';
        // @var mixed app->register($this->module_ns.'\Providers\EventServiceProvider';
    }

    protected function registerBladeComponents(): void
    {
        $componentNamespace = // @var mixed module_ns.'\View\Components';
        Blade::componentNamespace($componentNamespace, // @var mixed nameLower;

        app(RegisterBladeComponentsAction::class)
            ->execute(// @var mixed module_dir.'/../View/Components', $this->module_ns;
    }
}
