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

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< HEAD
            self::$instance = new self();
=======
<<<<<<< HEAD
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }
}
