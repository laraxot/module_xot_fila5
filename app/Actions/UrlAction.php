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
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_JrkjHR
    private static ?self $instance = null;

    public function __construct()
    {
    }
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
=======

    private static ?self $instance = null;

    public function __construct() {}
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
            self::$instance = new self();
=======
<<<<<<< HEAD
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> .merge_file_JrkjHR
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }

    public function checkValidUrl(string $url): bool
    {
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
        return false !== filter_var($url, FILTER_VALIDATE_URL);
    }

    public function execute(): void
    {
    }
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
=======
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function execute(): void {}
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
}
