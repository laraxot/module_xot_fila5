<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Forms\Components\Toggle;
use Modules\Xot\Datas\XotConfigData;

/**
 * Impostazioni di Xot (`config/{tenant}/xot.php`), solo super-admin.
 *
 * Form configurato con i campi operativi comuni del modulo.
 *
 * @see XotConfigData
 */
class SettingPage extends BaseSettingPage
{
    /** @return array<string, object> */
    protected function getFormSchema(): array
    {
        return [
            'enabled' => Toggle::make('enabled')->default(true)->required(),
        ];
    }
}
