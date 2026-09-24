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
<<<<<<< .merge_file_Ve5rY8
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
>>>>>>> 8d801bbe (Check & fix styling)
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
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_RCKXMA

    private static ?self $instance = null;

    public function __construct() {}
<<<<<<< .merge_file_Ve5rY8
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_RCKXMA

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< .merge_file_Ve5rY8
<<<<<<< HEAD
<<<<<<< HEAD
            self::$instance = new self;
=======
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
            self::$instance = new self();
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> .merge_file_JrkjHR
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
            self::$instance = new self;
>>>>>>> .merge_file_RCKXMA
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }

    public function checkValidUrl(string $url): bool
    {
<<<<<<< .merge_file_Ve5rY8
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
>>>>>>> 8d801bbe (Check & fix styling)
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
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_RCKXMA
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function execute(): void {}
<<<<<<< .merge_file_Ve5rY8
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_RCKXMA
}
