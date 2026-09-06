<?php

<<<<<<< HEAD
/**
 * @see https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
 * @see https://sweetcode.io/import-and-export-excel-files-data-using-in-laravel/
 */

=======
>>>>>>> 7f6cf6be (.)
declare(strict_types=1);

namespace Modules\Xot\Actions;

<<<<<<< HEAD
use Spatie\QueueableAction\ActionJob;

=======
>>>>>>> 7f6cf6be (.)
use Spatie\QueueableAction\QueueableAction;

/**
 * Undocumented class.
 */
class UrlAction
{
    use QueueableAction;
<<<<<<< HEAD
    private static ?self $instance = null;

    public function __construct() {}

    public static function getInstance(): self
    {
        if (! (self::$instance instanceof self)) {
            self::$instance = new self;
=======

    private static ?self $instance = null;

    public function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
>>>>>>> 7f6cf6be (.)
        }

        return self::$instance;
    }

<<<<<<< HEAD
    /**
     * Undocumented function.
     */
=======
>>>>>>> 7f6cf6be (.)
    public static function make(): self
    {
        return static::getInstance();
    }

    public function checkValidUrl(string $url): bool
    {
<<<<<<< HEAD
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
        return false !== filter_var($url, FILTER_VALIDATE_URL);
    }

    public function execute(): void
    {
>>>>>>> 7f6cf6be (.)
    }
}
