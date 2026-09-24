<?php

<<<<<<< .merge_file_Uzja0D
<<<<<<< HEAD
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
=======
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
=======
declare(strict_types=1);
>>>>>>> .merge_file_OFMOww
/**
 * @see https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
 * @see https://sweetcode.io/import-and-export-excel-files-data-using-in-laravel/
 */

<<<<<<< .merge_file_Uzja0D
<<<<<<< HEAD
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
=======
declare(strict_types=1);

=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_OFMOww
namespace Modules\Xot\Services;

/**
 * Undocumented class.
 */
class UrlService
{
    private static ?self $instance = null;

<<<<<<< .merge_file_Uzja0D
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ragDcZ
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_OFMOww
    public function __construct() {}

    public static function getInstance(): self
    {
        if (! (self::$instance instanceof self)) {
<<<<<<< .merge_file_Uzja0D
<<<<<<< HEAD
<<<<<<< HEAD
            self::$instance = new self;
=======
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
    public function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
>>>>>>> .merge_file_uUcMgF
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
            self::$instance = new self;
>>>>>>> .merge_file_OFMOww
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
<<<<<<< .merge_file_Uzja0D
<<<<<<< HEAD
<<<<<<< HEAD
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
<<<<<<< .merge_file_ragDcZ
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
        return false !== filter_var($url, FILTER_VALIDATE_URL);
>>>>>>> .merge_file_uUcMgF
>>>>>>> laraxot/dev
=======
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
>>>>>>> 8d801bbe (Check & fix styling)
=======
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
>>>>>>> .merge_file_OFMOww
    }
}
