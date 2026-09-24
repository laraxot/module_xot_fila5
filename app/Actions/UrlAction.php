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

<<<<<<< .merge_file_BgAQUw
    public function __construct() {}
=======
<<<<<<< HEAD
    public function __construct() {}
=======
    public function __construct()
    {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_nshO2W

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< .merge_file_BgAQUw
            self::$instance = new self;
=======
<<<<<<< HEAD
            self::$instance = new self;
=======
            self::$instance = new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_nshO2W
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }

    public function checkValidUrl(string $url): bool
    {
<<<<<<< .merge_file_BgAQUw
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function execute(): void {}
=======
<<<<<<< HEAD
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function execute(): void {}
=======
        return false !== filter_var($url, FILTER_VALIDATE_URL);
    }

    public function execute(): void
    {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_nshO2W
}
