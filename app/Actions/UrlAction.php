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
<<<<<<< HEAD
    private static ?self $instance = null;

    public function __construct()
    {
    }
=======

    private static ?self $instance = null;

    public function __construct() {}
>>>>>>> laraxot/dev

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< HEAD
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }

    public function checkValidUrl(string $url): bool
    {
<<<<<<< HEAD
        return false !== filter_var($url, FILTER_VALIDATE_URL);
    }

    public function execute(): void
    {
    }
=======
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function execute(): void {}
>>>>>>> laraxot/dev
}
