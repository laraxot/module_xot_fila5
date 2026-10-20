<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

use Spatie\QueueableAction\QueueableAction;
use Illuminate\Support\Facades\Config;

/**
 * Class ThemeService
 * Gestisce il tema dell'applicazione.
 */
class ThemeService
{
    use QueueableAction;
    
    /**
     * Nome del tema corrente.
     */
    private static string $currentTheme = 'default';

    /**
     * Imposta il tema corrente.
     */
    public static function setTheme(string $theme): void
    {
        self::$currentTheme = $theme;
        Config::set('theme.active', $theme);
    }

    /**
     * Recupera il tema corrente.
     */
    public static function getTheme(): string
    {
        return self::$currentTheme;
    }

    /**
     * Verifica se un tema specifico è attivo.
     */
    public static function isTheme(string $theme): bool
    {
        return self::$currentTheme === $theme;
    }

    /**
     * Recupera il percorso delle risorse del tema.
     */
    public static function getThemePath(): string
    {
        return resource_path('themes/' . self::$currentTheme);
    }

    /**
     * QueueableAction execute method for ThemeService.
     * Flexible execute that can either set a theme and return self,
     * or retrieve the current theme.
     *
     * @param  string|null  $theme  If provided, set the theme. If null, get current theme.
     * @return self|string  Returns self when setting theme, string when getting theme.
     */
    public function execute(?string $theme = null): self|string
    {
        if ($theme !== null) {
            $this->setTheme($theme);
            return $this;
        }

        return $this->getTheme();
    }
}