<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
/**
 * @see https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
 * @see https://sweetcode.io/import-and-export-excel-files-data-using-in-laravel/
 */

<<<<<<< HEAD
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
namespace Modules\Xot\Services;

/**
 * Undocumented class.
 */
class UrlService
{
    private static ?self $instance = null;

    public function __construct() {}

    public static function getInstance(): self
    {
        if (! (self::$instance instanceof self)) {
<<<<<<< HEAD
            self::$instance = new self();
=======
<<<<<<< HEAD
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        }

        return self::$instance;
    }

    /**
     * Undocumented function.
     */
    public static function make(): self
    {
        return static::getInstance();
    }

    public function checkValidUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
