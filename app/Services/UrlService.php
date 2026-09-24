<?php

<<<<<<< HEAD
<<<<<<< .merge_file_LhUa7U
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_ragDcZ
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> .merge_file_uUcMgF
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
declare(strict_types=1);
>>>>>>> .merge_file_ZSeaw0
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
 * @see https://sweetcode.io/import-and-export-excel-files-data-using-in-laravel/
 */

<<<<<<< HEAD
<<<<<<< .merge_file_LhUa7U
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_ragDcZ
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_uUcMgF
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ZSeaw0
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
namespace Modules\Xot\Services;

/**
 * Undocumented class.
 */
class UrlService
{
    private static ?self $instance = null;

<<<<<<< HEAD
<<<<<<< .merge_file_LhUa7U
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ragDcZ
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ZSeaw0
=======
<<<<<<< HEAD
<<<<<<< .merge_file_ragDcZ
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    public function __construct() {}

    public static function getInstance(): self
    {
        if (! (self::$instance instanceof self)) {
<<<<<<< .merge_file_LhUa7U
<<<<<<< HEAD
<<<<<<< HEAD
            self::$instance = new self;
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
            self::$instance = new self();
=======
<<<<<<< HEAD
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    public function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
>>>>>>> .merge_file_uUcMgF
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
            self::$instance = new self;
>>>>>>> .merge_file_ZSeaw0
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_LhUa7U
<<<<<<< HEAD
<<<<<<< HEAD
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_ragDcZ
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
        return false !== filter_var($url, FILTER_VALIDATE_URL);
>>>>>>> .merge_file_uUcMgF
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
>>>>>>> 3792da0d (Check & fix styling)
=======
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
>>>>>>> .merge_file_ZSeaw0
=======
=======
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
