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

>>>>>>> 3792da0d (Check & fix styling)
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
>>>>>>> 3792da0d (Check & fix styling)
    public static function getTheme(): string
    {
        return self::$currentTheme;
    }

<<<<<<< HEAD
    /**
     * Verifica se un tema specifico è attivo.
     */
=======
>>>>>>> 3792da0d (Check & fix styling)
    public static function isTheme(string $theme): bool
    {
        return self::$currentTheme === $theme;
    }

<<<<<<< HEAD
    /**
     * Recupera il percorso delle risorse del tema.
     */
=======
>>>>>>> 3792da0d (Check & fix styling)
    public static function getThemePath(): string
    {
        return resource_path('themes/'.self::$currentTheme);
    }

<<<<<<< HEAD
<<<<<<< .merge_file_QLzixU
<<<<<<< HEAD
<<<<<<< HEAD
    public function execute(): void {}
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_uj7qR3
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    public function execute(): void
    {
    }
=======
<<<<<<< HEAD
    public function execute(): void
    {
    }
=======
    public function execute(): void {}
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    public function execute(): void
    {
    }
>>>>>>> .merge_file_iaoQ85
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    public function execute(): void
    {
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
    public function execute(): void {}
>>>>>>> .merge_file_SHiaS8
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
