<?php

<<<<<<< .merge_file_CTMHOL
<<<<<<< HEAD
<<<<<<< HEAD
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
>>>>>>> laraxot/dev
=======
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
=======
declare(strict_types=1);
>>>>>>> .merge_file_OjjDqm
/**
 * @see https://medium.com/technology-hits/how-to-import-a-csv-excel-file-in-laravel-d50f93b98aa4
 */

<<<<<<< .merge_file_CTMHOL
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_e5CE6n
<<<<<<< HEAD
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JmA3pJ
=======
declare(strict_types=1);

=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_OjjDqm
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
<<<<<<< .merge_file_CTMHOL
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if (! (self::$instance instanceof self)) {
            self::$instance = new self;
>>>>>>> .merge_file_OjjDqm
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
