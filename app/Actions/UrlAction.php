<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Spatie\QueueableAction\QueueableAction;

/**
 * Undocumented class.
 */
class UrlAction
{
    use QueueableAction;
<<<<<<< HEAD
<<<<<<< .merge_file_sgMvch
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_VTlxLX
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======

>>>>>>> .merge_file_JrkjHR
=======
<<<<<<< HEAD

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    private static ?self $instance = null;

    public function __construct()
    {
    }
<<<<<<< HEAD
<<<<<<< .merge_file_VTlxLX
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_nZSRpw

    private static ?self $instance = null;

    public function __construct() {}
<<<<<<< .merge_file_sgMvch
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_JrkjHR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_nZSRpw
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
<<<<<<< HEAD
<<<<<<< .merge_file_sgMvch
<<<<<<< HEAD
<<<<<<< HEAD
            self::$instance = new self;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_VTlxLX
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
>>>>>>> .merge_file_JrkjHR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            self::$instance = new self();
>>>>>>> 3792da0d (Check & fix styling)
=======
            self::$instance = new self;
>>>>>>> .merge_file_nZSRpw
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

    public function checkValidUrl(string $url): bool
    {
<<<<<<< HEAD
<<<<<<< .merge_file_sgMvch
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_VTlxLX
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_JrkjHR
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        return false !== filter_var($url, FILTER_VALIDATE_URL);
    }

    public function execute(): void
    {
    }
<<<<<<< HEAD
<<<<<<< .merge_file_VTlxLX
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_nZSRpw
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function execute(): void {}
<<<<<<< .merge_file_sgMvch
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_JrkjHR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_nZSRpw
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
