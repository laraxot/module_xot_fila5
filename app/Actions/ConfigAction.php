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
<<<<<<< .merge_file_R2ZLih
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct() {}
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_1lWDbk
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    public function __construct()
    {
    }
=======
<<<<<<< HEAD
    public function __construct()
    {
    }
=======
    public function __construct() {}
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    public function __construct()
    {
    }
>>>>>>> .merge_file_jPSZ5X
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    public function __construct()
    {
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
    public function __construct() {}
>>>>>>> .merge_file_2leZFH
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< HEAD
<<<<<<< .merge_file_R2ZLih
<<<<<<< HEAD
<<<<<<< HEAD
            self::$instance = new self;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_1lWDbk
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
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
            self::$instance = new self();
>>>>>>> .merge_file_jPSZ5X
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> 3792da0d (Check & fix styling)
=======
            self::$instance = new self;
>>>>>>> .merge_file_2leZFH
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }
}
