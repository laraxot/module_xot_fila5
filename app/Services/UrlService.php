<?php

<<<<<<< .merge_file_n3q6vz
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_l5R4C3
/**
 * @see https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
 * @see https://sweetcode.io/import-and-export-excel-files-data-using-in-laravel/
 */

<<<<<<< .merge_file_n3q6vz
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_l5R4C3
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
<<<<<<< .merge_file_n3q6vz
            self::$instance = new self;
=======
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
>>>>>>> laraxot/dev
>>>>>>> .merge_file_l5R4C3
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
