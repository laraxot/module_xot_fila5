<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< .merge_file_e5CE6n
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
>>>>>>> .merge_file_JmA3pJ
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
/**
 * @see https://medium.com/technology-hits/how-to-import-a-csv-excel-file-in-laravel-d50f93b98aa4
 */

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_e5CE6n
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
>>>>>>> .merge_file_JmA3pJ
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
namespace Modules\Xot\Services;

/**
 * Class ConfigService.
 */
class ConfigService
{
    private static ?self $instance = null;

    public function __construct()
    {
        // ---
        // require_once __DIR__.'/vendor/autoload.php';
    }

    /**
     * Undocumented function.
     */
    public static function getInstance(): self
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (! (self::$instance instanceof self)) {
            self::$instance = new self;
=======
<<<<<<< .merge_file_e5CE6n
        if (! (self::$instance instanceof self)) {
            self::$instance = new self;
=======
        if (! self::$instance instanceof self) {
            self::$instance = new self();
>>>>>>> .merge_file_JmA3pJ
>>>>>>> laraxot/dev
=======
        if (! (self::$instance instanceof self)) {
            self::$instance = new self;
>>>>>>> 3792da0d (Check & fix styling)
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
}
