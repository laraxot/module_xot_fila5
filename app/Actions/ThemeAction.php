<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

<<<<<<< HEAD
use Spatie\QueueableAction\ActionJob;

use Spatie\QueueableAction\QueueableAction;

use Illuminate\Support\Facades\Config;

/**
 * Class ThemeService
=======
use Illuminate\Support\Facades\Config;
use Spatie\QueueableAction\QueueableAction;

/**
 * Class ThemeAction
>>>>>>> 7f6cf6be (.)
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

>>>>>>> 7f6cf6be (.)
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
>>>>>>> 7f6cf6be (.)
    public static function getTheme(): string
    {
        return self::$currentTheme;
    }

<<<<<<< HEAD
    /**
     * Verifica se un tema specifico è attivo.
     */
=======
>>>>>>> 7f6cf6be (.)
    public static function isTheme(string $theme): bool
    {
        return self::$currentTheme === $theme;
    }

<<<<<<< HEAD
    /**
     * Recupera il percorso delle risorse del tema.
     */
=======
>>>>>>> 7f6cf6be (.)
    public static function getThemePath(): string
    {
        return resource_path('themes/'.self::$currentTheme);
    }
<<<<<<< HEAD
=======

    public function execute(): void
    {
    }
>>>>>>> 7f6cf6be (.)
}
