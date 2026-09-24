<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Facades\Config;
use Spatie\QueueableAction\QueueableAction;

/**
 * Class ThemeAction
 * Gestisce il tema dell'applicazione.
 */
class ThemeAction
{
    use QueueableAction;

<<<<<<< HEAD
    /**
     * Nome del tema corrente.
     */
    private static string $currentTheme = 'default';

    /**
     * Imposta il tema corrente.
     */
=======
    private static string $currentTheme = 'default';

>>>>>>> laraxot/dev
    public static function setTheme(string $theme): void
    {
        self::$currentTheme = $theme;
        Config::set('theme.active', $theme);
    }

<<<<<<< HEAD
    /**
     * Recupera il tema corrente.
     */
=======
>>>>>>> laraxot/dev
    public static function getTheme(): string
    {
        return self::$currentTheme;
    }

<<<<<<< HEAD
    /**
     * Verifica se un tema specifico è attivo.
     */
=======
>>>>>>> laraxot/dev
    public static function isTheme(string $theme): bool
    {
        return self::$currentTheme === $theme;
    }

<<<<<<< HEAD
    /**
     * Recupera il percorso delle risorse del tema.
     */
=======
>>>>>>> laraxot/dev
    public static function getThemePath(): string
    {
        return resource_path('themes/'.self::$currentTheme);
    }

<<<<<<< HEAD
    public function execute(): void {}
=======
    public function execute(): void
    {
    }
>>>>>>> laraxot/dev
}
