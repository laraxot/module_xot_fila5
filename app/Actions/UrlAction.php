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
<<<<<<< HEAD
=======
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_JrkjHR
=======

>>>>>>> 3792da0d (Check & fix styling)
    private static ?self $instance = null;

    public function __construct()
    {
    }
<<<<<<< HEAD
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev

    private static ?self $instance = null;

    public function __construct() {}
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< HEAD
<<<<<<< HEAD
            self::$instance = new self;
=======
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
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
=======
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
=======
>>>>>>> 3792da0d (Check & fix styling)
        return false !== filter_var($url, FILTER_VALIDATE_URL);
    }

    public function execute(): void
    {
    }
<<<<<<< HEAD
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function execute(): void {}
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
}
