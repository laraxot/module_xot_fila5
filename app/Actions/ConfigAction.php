<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

/**
 * Class ConfigAction.
 */
class ConfigAction
{
    private static ?self $instance = null;

<<<<<<< .merge_file_R2ZLih
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
    public function __construct()
    {
    }
=======
    public function __construct() {}
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
    public function __construct()
    {
    }
>>>>>>> .merge_file_jPSZ5X
>>>>>>> laraxot/dev
=======
    public function __construct()
    {
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
    public function __construct() {}
>>>>>>> .merge_file_2leZFH

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< .merge_file_R2ZLih
<<<<<<< HEAD
<<<<<<< HEAD
            self::$instance = new self;
=======
<<<<<<< .merge_file_1lWDbk
<<<<<<< HEAD
            self::$instance = new self();
=======
<<<<<<< HEAD
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> .merge_file_jPSZ5X
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> 3792da0d (Check & fix styling)
=======
            self::$instance = new self;
>>>>>>> .merge_file_2leZFH
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }
}
