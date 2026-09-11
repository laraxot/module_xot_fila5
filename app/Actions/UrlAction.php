<?php

<<<<<<< HEAD
/**
 * @see https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
 * @see https://sweetcode.io/import-and-export-excel-files-data-using-in-laravel/
 */

=======
>>>>>>> laraxot/dev
declare(strict_types=1);

namespace Modules\Xot\Actions;

<<<<<<< HEAD
use Spatie\QueueableAction\ActionJob;

=======
>>>>>>> laraxot/dev
use Spatie\QueueableAction\QueueableAction;

/**
 * Undocumented class.
 */
class UrlAction
{
    use QueueableAction;
    private static ?self $instance = null;

<<<<<<< HEAD
    public function __construct() {}

    public static function getInstance(): self
    {
        if (! (self::$instance instanceof self)) {
            self::$instance = new self;
=======
    public function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
>>>>>>> laraxot/dev
        }

        return self::$instance;
    }

<<<<<<< HEAD
    /**
     * Undocumented function.
     */
=======
>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev
    }
}
