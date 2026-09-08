<?php

declare(strict_types=1);

namespace Coolsam\FilamentModules\Extensions;

use Illuminate\Support\Facades\Log;
use Nwidart\Modules\LaravelModulesServiceProvider as BaseModulesServiceProvider;

class LaravelModulesServiceProvider extends BaseModulesServiceProvider
{
    public function register(): void
    {
        $this->registerPanels();
        parent::register();
<<<<<<< HEAD
        Log::info('Registered Modules');
=======
        Log::debug('Registered Modules');
>>>>>>> c7fd73eb (.)
    }

    public function registerPanels(): void
    {
        // Override this to do anything during registration
    }
}
