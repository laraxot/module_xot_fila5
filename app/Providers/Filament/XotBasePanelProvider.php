<?php

declare(strict_types=1);

namespace Modules\Xot\Providers\Filament;

use Filament\Panel;
use Illuminate\Support\Str;

class XotBasePanelProvider
{
    protected string $module = 'Xot';

    public function panel(Panel $panel): Panel
    {
        return $panel->defaultThemeDirectory('themes/filament');
    }
}