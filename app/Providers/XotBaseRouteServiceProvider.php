<?php

declare(strict_types=1);

namespace Modules\Xot\Providers;

use Filament\Notifications\Notification;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/**
 * Class XotBaseRouteServiceProvider.
 */
abstract class XotBaseRouteServiceProvider extends RouteServiceProvider
{
    public string $name = '';

    protected string $moduleNamespace = 'Modules\Xot\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    /**
     * Undocumented function.
     */
    public function boot(): void
    {
        Config::set('extra_conn', Request::segment(2)); // Se configurato va a prendere db diverso
        parent::boot();
    }

    /**
     * Undocumented function.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Undocumented function.
     */
    protected function mapWebRoutes(): void
    {
<<<<<<< .merge_file_l14lFy
        if ($this->name === '') {
=======
<<<<<<< HEAD
        if ($this->name === '') {
=======
        if ('' === $this->name) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_7Jg8Bs
            Notification::make()
                ->title('Error')
                ->danger()
                ->persistent()
                ->body('on [Name]ServiceProvider and RouteServiceProvider add $name variable')
                ->send();

            return;
        }
        Route::middleware('web')->namespace($this->moduleNamespace)->group($this->module_dir.'/../../routes/web.php');
    }

    /**
     * Undocumented function.
     */
    protected function mapApiRoutes(): void
    {
<<<<<<< .merge_file_l14lFy
        if ($this->name === '') {
=======
<<<<<<< HEAD
        if ($this->name === '') {
=======
        if ('' === $this->name) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_7Jg8Bs
            throw new \Exception('name is empty on ['.static::class.']');
        }
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group($this->module_dir.'/../../routes/api.php');
    }
}
