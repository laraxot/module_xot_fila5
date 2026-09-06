<?php

<<<<<<< HEAD
/**
 * @see https://medium.com/technology-hits/how-to-import-a-csv-excel-file-in-laravel-d50f93b98aa4
 */

=======
>>>>>>> 7f6cf6be (.)
declare(strict_types=1);

namespace Modules\Xot\Actions;

<<<<<<< HEAD
use Spatie\QueueableAction\ActionJob;

use Spatie\QueueableAction\QueueableAction;

/**
 * Class ConfigService.
 */
class ConfigAction
{
    use QueueableAction;
=======
/**
 * Class ConfigAction.
 */
class ConfigAction
{
>>>>>>> 7f6cf6be (.)
    private static ?self $instance = null;

    public function __construct()
    {
<<<<<<< HEAD
        // ---
        // require_once __DIR__.'/vendor/autoload.php';
    }

    /**
     * Undocumented function.
     */
    public static function getInstance(): self
    {
        if (! (self::$instance instanceof self)) {
            self::$instance = new self;
=======
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
}
