<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Modules\Xot\Datas\XotConfigData;

/**
 * Impostazioni di Xot (`config/{tenant}/xot.php`), solo super-admin.
 *
 * Form vuoto: il modulo non ha ancora impostazioni. La pagina esiste per uniformita' e per
 * essere pronta quando servira' un campo.
 *
 * @see XotConfigData
 */
class SettingPage extends BaseSettingPage
{
    /**
     * @return array<string, never>
     */
    protected function getFormSchema(): array
    {
        return [];
    }
}
