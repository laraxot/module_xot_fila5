<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
=======
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
>>>>>>> 6551e895bd0b9d316bb4df72f04eae413c5e523d
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
<<<<<<< HEAD
    /** @return array<string, object> */
    protected function getFormSchema(): array
    {
        return [
            'enabled' => Toggle::make('enabled')->default(true)->required(),
=======
    public static function getConfigName(): string
    {
        return 'xra';
    }

    /**
     * @return array<string, Select|TextInput|Toggle>
     */
    protected function getFormSchema(): array
    {
        return [
            'pub_theme' => TextInput::make('pub_theme')->required()->maxLength(80),
            'adm_theme' => TextInput::make('adm_theme')->required()->maxLength(80),
            'primary_lang' => Select::make('primary_lang')->options(['it' => 'Italiano', 'en' => 'English'])->required(),
            'force_ssl' => Toggle::make('force_ssl')->default(false),
>>>>>>> 6551e895bd0b9d316bb4df72f04eae413c5e523d
        ];
    }
}
