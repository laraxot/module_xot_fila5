<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Modules\Xot\Datas\Concerns\MakesFromTenantConfig;
use Modules\Xot\Filament\Pages\SettingPage;
use Spatie\LaravelData\Data;

/**
 * Impostazioni di Xot (`config/{tenant}/xot.php`).
 *
 * Vuota di proposito: la pagina legge e salva solo le chiavi dichiarate qui. Nessuna chiave
 * viene aggiunta ai config tenant finche' non servira' un campo.
 *
 * @see SettingPage
 */
class XotConfigData extends Data
{
    use MakesFromTenantConfig;

    public string $pub_theme = 'Four';

    public string $adm_theme = 'AdminLTE';

    public string $primary_lang = 'it';

    public bool $force_ssl = false;
}
