<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;
<<<<<<< Updated upstream

use Illuminate\Support\Facades\File;
=======
>>>>>>> Stashed changes
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    $this->testDir = sys_get_temp_dir().'/fix_structure_test_'.uniqid();
    mkdir($this->testDir, 0o755, true);

    chdir($this->testDir);
});

afterEach(function () {
    $this->rrmdir($this->testDir);
});

function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object !== '.' && $object !== '..') {
                if (is_dir($dir.DIRECTORY_SEPARATOR.$object) && ! is_link($dir.'/'.$object)) {
                    rrmdir($dir.DIRECTORY_SEPARATOR.$object);
                } else {
                    unlink($dir.DIRECTORY_SEPARATOR.$object);
                }
            }
        }
        rmdir($dir);
    }
}

test('creates necessary directories and files', function () {
    $this->artisan('xot:fix-structure')->assertExitCode(0);

    $directories = [
        'app/Models',
        'app/Http/Controllers',
        'app/Http/Requests',
        'app/Http/Resources',
        'app/Http/Middleware',
        'app/Providers',
        'database/migrations',
        'database/seeders',
        'database/factories',
        'resources/views',
        'routes',
        'tests/Feature',
        'tests/Unit',
    ];

    foreach ($directories as $directory) {
        $this->assertDirectoryExists($this->testDir.'/'.$directory);
    }

    $gitkeepFiles = [
        'app/Models/.gitkeep',
        'app/Http/Controllers/.gitkeep',
        'app/Http/Requests/.gitkeep',
        'app/Http/Resources/.gitkeep',
        'database/seeders/.gitkeep',
        'resources/views/.gitkeep',
    ];

    foreach ($gitkeepFiles as $file) {
        $this->assertFileExists($this->testDir.'/'.$file);
    }
});

test('does not overwrite existing files', function () {
    $testContent = 'Test content';
    $testFile = $this->testDir.'/routes/web.php';
    file_put_contents($testFile, $testContent);

    $this->artisan('xot:fix-structure')->assertExitCode(0);

    $this->assertStringEqualsFile($testFile, $testContent);
});

test('handles errors gracefully', function () {
    $nonWritableDir = $this->testDir.'/app';
    chmod($nonWritableDir, 0o555);

    $this->artisan('xot:fix-structure')->assertExitCode(1);

    chmod($nonWritableDir, 0o755);
});
