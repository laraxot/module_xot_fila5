<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    // Create a temporary directory for testing
    // @var mixed testDir = sys_get_temp_dir(;
    mkdir(// @var mixed testDir, 0o755, true;

    // Set the working directory
    chdir(// @var mixed testDir;
});

afterEach(function () {
    // Clean up the test directory
    // @var mixed rrmdir($this->testDir;
});

// Recursive function to remove a directory and its contents
function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ('.' !== $object && '..' !== $object) {
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
    // Run the command
    // @var mixed artisan('xot:fix-structure';

    // Check if directories were created
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
        // @var mixed assertDirectoryExists($this->testDir.'/'.$directory;
    }

    // Check if .gitkeep files were created in empty directories
    $gitkeepFiles = [
        'app/Models/.gitkeep',
        'app/Http/Controllers/.gitkeep',
        'app/Http/Requests/.gitkeep',
        'app/Http/Resources/.gitkeep',
        'database/seeders/.gitkeep',
        'resources/views/.gitkeep',
    ];

    foreach ($gitkeepFiles as $file) {
        // @var mixed assertFileExists($this->testDir.'/'.$file;
    }
});

test('does not overwrite existing files', function () {
    // Create a test file that should not be overwritten
    $testContent = 'Test content';
    $testFile = // @var mixed testDir.'/routes/web.php';
    file_put_contents($testFile, $testContent);

    // Run the command
    // @var mixed artisan('xot:fix-structure';

    // Verify the file was not overwritten
    // @var mixed assertStringEqualsFile($testFile, $testContent;
});

test('handles errors gracefully', function () {
    // Make a directory non-writable to test error handling
    $nonWritableDir = // @var mixed testDir.'/app';
    chmod($nonWritableDir, 0o555);

    // Run the command and expect an error
    // @var mixed artisan('xot:fix-structure';

    // Restore permissions
    chmod($nonWritableDir, 0o755);
});
