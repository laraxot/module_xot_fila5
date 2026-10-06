<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;

/**
 * Trait CreatesApplication.
 *
 * Provides the createApplication method for test cases.
 * This trait is used by all module test cases to bootstrap the Laravel application.
 */
trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication(): Application
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $app = require __DIR__.'/../../../bootstrap/app.php';
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 5a14301c (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 3fbbf1f5 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 399f46d3 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $app = require __DIR__ . '/../../../bootstrap/app.php';
=======
        $app = require __DIR__.'/../../../bootstrap/app.php';
>>>>>>> a12f125f4a (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> b93ef594b4 (.)
=======
        $app = require __DIR__.'/../../../bootstrap/app.php';
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> ca9324a4 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 5a14301c (.)
=======
=======
>>>>>>> 21348520 (.)
=======
>>>>>>> 88ea7103 (.)
=======
=======
>>>>>>> 6dcebf8a (.)
=======
        $app = require __DIR__.'/../../../bootstrap/app.php';
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b7afadf9 (.)
        /** @var Application */
        $app = require __DIR__.'/../../../bootstrap/app.php';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> b7afadf9 (.)
        $app = require __DIR__ . '/../../../bootstrap/app.php';
=======
        $app = require __DIR__.'/../../../bootstrap/app.php';
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> ca9324a4 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
=======
        $app = require __DIR__.'/../../../bootstrap/app.php';
>>>>>>> f1d4085 (.)
>>>>>>> 7131bd09 (.)
=======
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 9db27d12 (.)
=======
=======
>>>>>>> b7afadf9 (.)
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 73eab74 (.)
>>>>>>> d2b0a27 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 300ef70 (.)
>>>>>>> 6dcebf8a (.)
=======
        $app = require __DIR__.'/../../../bootstrap/app.php';
>>>>>>> 53d6a6ba (.)
=======
=======
        $app = require __DIR__ . '/../../../bootstrap/app.php';
>>>>>>> 300ef70 (.)
>>>>>>> a6ef6dc7 (.)
>>>>>>> b7afadf9 (.)
=======
        $app = require __DIR__.'/../../../bootstrap/app.php';
>>>>>>> 71586de2 (.)
=======
        $app = require __DIR__.'/../../../bootstrap/app.php';
>>>>>>> 249a0067 (.)

=======
        // Get base path (assuming tests are in Modules/{Module}/tests/)
        $basePath = realpath(__DIR__.'/../../../');

        // Explicitly set the base path before requiring bootstrap/app.php
        $_ENV['APP_BASE_PATH'] = $basePath;

        $app = require $basePath.'/bootstrap/app.php';

        // Bind essential paths if they are not correctly resolved
        $app->instance('path.base', $basePath);
        $app->bind('path.public', fn () => $basePath.'/public_html');
        $app->bind('path.storage', fn () => $basePath.'/storage');

        // Bootstrap kernel to ensure all service providers and aliases are registered
>>>>>>> laraxot/develop
        $app->make(Kernel::class)->bootstrap();
        $app->boot(); // Ensure all service providers are booted

        return $app;
    }
}
