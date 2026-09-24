<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< .merge_file_ragDcZ
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
declare(strict_types=1);
>>>>>>> .merge_file_uUcMgF
>>>>>>> laraxot/dev
/**
 * @see https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
 * @see https://sweetcode.io/import-and-export-excel-files-data-using-in-laravel/
 */

<<<<<<< HEAD
=======
<<<<<<< .merge_file_ragDcZ
<<<<<<< HEAD
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_uUcMgF
>>>>>>> laraxot/dev
namespace Modules\Xot\Services;

/**
 * Undocumented class.
 */
class UrlService
{
    private static ?self $instance = null;

<<<<<<< HEAD
=======
<<<<<<< .merge_file_ragDcZ
>>>>>>> laraxot/dev
    public function __construct() {}

    public static function getInstance(): self
    {
        if (! (self::$instance instanceof self)) {
<<<<<<< HEAD
            self::$instance = new self;
=======
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
    public function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
>>>>>>> .merge_file_uUcMgF
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
<<<<<<< HEAD
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
<<<<<<< .merge_file_ragDcZ
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
        return false !== filter_var($url, FILTER_VALIDATE_URL);
>>>>>>> .merge_file_uUcMgF
>>>>>>> laraxot/dev
    }
}
