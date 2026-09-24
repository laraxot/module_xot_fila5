<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

/**
 * Class ConfigAction.
 */
class ConfigAction
{
    private static ?self $instance = null;

<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct() {}
=======
<<<<<<< .merge_file_1lWDbk
<<<<<<< HEAD
    public function __construct()
    {
    }
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
    public function __construct()
    {
    }
=======
    public function __construct() {}
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    public function __construct()
    {
    }
>>>>>>> .merge_file_jPSZ5X
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< HEAD
<<<<<<< HEAD
            self::$instance = new self;
=======
<<<<<<< .merge_file_1lWDbk
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
            self::$instance = new self();
>>>>>>> .merge_file_jPSZ5X
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }
}
