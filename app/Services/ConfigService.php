<?php

<<<<<<< HEAD
<<<<<<< .merge_file_rrXkoo
=======
declare(strict_types=1);
=======
declare(strict_types=1);
=======
<<<<<<< .merge_file_e5CE6n
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
declare(strict_types=1);
>>>>>>> .merge_file_JmA3pJ
>>>>>>> .merge_file_PzOqj8
>>>>>>> laraxot/dev
/**
 * @see https://medium.com/technology-hits/how-to-import-a-csv-excel-file-in-laravel-d50f93b98aa4
 */

<<<<<<< HEAD
<<<<<<< .merge_file_rrXkoo
=======
=======
<<<<<<< .merge_file_e5CE6n
<<<<<<< HEAD
declare(strict_types=1);

=======
<<<<<<< HEAD
>>>>>>> .merge_file_PzOqj8
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_rrXkoo
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JmA3pJ
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PzOqj8
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
<<<<<<< .merge_file_rrXkoo
        if (! (self::$instance instanceof self)) {
            self::$instance = new self;
=======
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
>>>>>>> .merge_file_PzOqj8
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
