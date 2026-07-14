<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Spatie\QueueableAction\QueueableAction;

/**
 * Undocumented class.
 */
class UrlAction
{
    use QueueableAction;

    private static ?self $instance = null;

    public function __construct()
    {
<<<<<<< HEAD
<<<<<<< HEAD:app/Actions/UrlAction.php
=======
        // ---
>>>>>>> 64619e34 (.):app/Services/UrlService.php
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
    }

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }

    public function checkValidUrl(string $url): bool
    {
        return false !== filter_var($url, FILTER_VALIDATE_URL);
    }

    public function execute(): void
    {
    }
}
