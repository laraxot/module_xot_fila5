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
<<<<<<< .merge_file_q6iunZ
=======
    public function __construct() {}
=======
<<<<<<< .merge_file_1lWDbk
<<<<<<< HEAD
    public function __construct()
    {
    }
=======
<<<<<<< HEAD
>>>>>>> .merge_file_yNCEvu
    public function __construct()
    {
    }
=======
    public function __construct() {}
>>>>>>> laraxot/dev
<<<<<<< .merge_file_q6iunZ
=======
>>>>>>> laraxot/dev
=======
    public function __construct()
    {
    }
>>>>>>> .merge_file_jPSZ5X
>>>>>>> laraxot/dev
>>>>>>> .merge_file_yNCEvu

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< HEAD
<<<<<<< .merge_file_q6iunZ
=======
            self::$instance = new self;
=======
<<<<<<< .merge_file_1lWDbk
<<<<<<< HEAD
            self::$instance = new self();
=======
<<<<<<< HEAD
>>>>>>> .merge_file_yNCEvu
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_q6iunZ
=======
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> .merge_file_jPSZ5X
>>>>>>> laraxot/dev
>>>>>>> .merge_file_yNCEvu
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }
}
