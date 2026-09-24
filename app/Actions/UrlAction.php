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
<<<<<<< .merge_file_9jT0Tz
=======
<<<<<<< .merge_file_h7WmQK
=======
>>>>>>> .merge_file_1WNTt1
=======
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_JrkjHR
<<<<<<< .merge_file_9jT0Tz
=======
>>>>>>> .merge_file_i3YHap
>>>>>>> .merge_file_1WNTt1
    private static ?self $instance = null;

    public function __construct()
    {
    }
<<<<<<< .merge_file_9jT0Tz
=======
<<<<<<< .merge_file_h7WmQK
=======
=======
>>>>>>> .merge_file_1WNTt1
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_9jT0Tz
=======
>>>>>>> .merge_file_i3YHap
>>>>>>> .merge_file_1WNTt1

    private static ?self $instance = null;

    public function __construct() {}
<<<<<<< .merge_file_9jT0Tz
=======
<<<<<<< .merge_file_h7WmQK
=======
>>>>>>> .merge_file_1WNTt1
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
<<<<<<< .merge_file_9jT0Tz
=======
>>>>>>> .merge_file_i3YHap
>>>>>>> .merge_file_1WNTt1
>>>>>>> laraxot/dev

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< HEAD
<<<<<<< .merge_file_9jT0Tz
=======
<<<<<<< .merge_file_h7WmQK
=======
>>>>>>> .merge_file_1WNTt1
            self::$instance = new self;
=======
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
            self::$instance = new self();
=======
<<<<<<< HEAD
<<<<<<< .merge_file_9jT0Tz
=======
>>>>>>> .merge_file_i3YHap
>>>>>>> .merge_file_1WNTt1
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_9jT0Tz
=======
<<<<<<< .merge_file_h7WmQK
=======
>>>>>>> .merge_file_1WNTt1
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> .merge_file_JrkjHR
>>>>>>> laraxot/dev
<<<<<<< .merge_file_9jT0Tz
=======
>>>>>>> .merge_file_i3YHap
>>>>>>> .merge_file_1WNTt1
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
<<<<<<< .merge_file_9jT0Tz
=======
<<<<<<< .merge_file_h7WmQK
=======
>>>>>>> .merge_file_1WNTt1
=======
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
<<<<<<< .merge_file_9jT0Tz
=======
>>>>>>> .merge_file_i3YHap
>>>>>>> .merge_file_1WNTt1
        return false !== filter_var($url, FILTER_VALIDATE_URL);
    }

    public function execute(): void
    {
    }
<<<<<<< .merge_file_9jT0Tz
=======
<<<<<<< .merge_file_h7WmQK
=======
=======
>>>>>>> .merge_file_1WNTt1
<<<<<<< .merge_file_VTlxLX
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_9jT0Tz
=======
>>>>>>> .merge_file_i3YHap
>>>>>>> .merge_file_1WNTt1
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function execute(): void {}
<<<<<<< .merge_file_9jT0Tz
=======
<<<<<<< .merge_file_h7WmQK
=======
>>>>>>> .merge_file_1WNTt1
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JrkjHR
<<<<<<< .merge_file_9jT0Tz
=======
>>>>>>> .merge_file_i3YHap
>>>>>>> .merge_file_1WNTt1
>>>>>>> laraxot/dev
}
