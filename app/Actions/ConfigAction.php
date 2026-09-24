<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

/**
 * Class ConfigAction.
 */
class ConfigAction
{
    private static ?self $instance = null;

<<<<<<< .merge_file_4KUCeX
    public function __construct() {}
=======
<<<<<<< HEAD
    public function __construct() {}
=======
    public function __construct()
    {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_S5QWyC

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< .merge_file_4KUCeX
            self::$instance = new self;
=======
<<<<<<< HEAD
            self::$instance = new self;
=======
            self::$instance = new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_S5QWyC
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }
}
