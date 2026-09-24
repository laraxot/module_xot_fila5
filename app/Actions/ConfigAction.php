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
<<<<<<< .merge_file_50b49w
=======
<<<<<<< .merge_file_q6iunZ
=======
>>>>>>> .merge_file_BDyAYB
    public function __construct() {}
=======
<<<<<<< .merge_file_1lWDbk
<<<<<<< HEAD
    public function __construct()
    {
    }
=======
<<<<<<< HEAD
<<<<<<< .merge_file_50b49w
=======
>>>>>>> .merge_file_yNCEvu
>>>>>>> .merge_file_BDyAYB
    public function __construct()
    {
    }
=======
    public function __construct() {}
>>>>>>> laraxot/dev
<<<<<<< .merge_file_50b49w
=======
<<<<<<< .merge_file_q6iunZ
=======
>>>>>>> .merge_file_BDyAYB
>>>>>>> laraxot/dev
=======
    public function __construct()
    {
    }
>>>>>>> .merge_file_jPSZ5X
>>>>>>> laraxot/dev
<<<<<<< .merge_file_50b49w
=======
>>>>>>> .merge_file_yNCEvu
>>>>>>> .merge_file_BDyAYB

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< HEAD
<<<<<<< .merge_file_50b49w
=======
<<<<<<< .merge_file_q6iunZ
=======
>>>>>>> .merge_file_BDyAYB
            self::$instance = new self;
=======
<<<<<<< .merge_file_1lWDbk
<<<<<<< HEAD
            self::$instance = new self();
=======
<<<<<<< HEAD
<<<<<<< .merge_file_50b49w
=======
>>>>>>> .merge_file_yNCEvu
>>>>>>> .merge_file_BDyAYB
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_50b49w
=======
<<<<<<< .merge_file_q6iunZ
=======
>>>>>>> .merge_file_BDyAYB
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> .merge_file_jPSZ5X
>>>>>>> laraxot/dev
<<<<<<< .merge_file_50b49w
=======
>>>>>>> .merge_file_yNCEvu
>>>>>>> .merge_file_BDyAYB
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }
}
