<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Illuminate\Testing\PendingCommand;
use Modules\Xot\Tests\TestCase;

use function Safe\chmod;
use function Safe\chdir;
use function Safe\file_put_contents;
use function Safe\mkdir;

uses(TestCase::class);

beforeEach(function (): void {
    $this->testDir = sys_get_temp_dir().'/fix_structure_test_'.uniqid();
    mkdir($this->testDir, 0o755, true);
    chdir($this->testDir);
});

afterEach(function (): void {
    if (is_string($this->testDir) && $this->testDir !== '') {
        $this->rrmdir($this->testDir);
    }
});

test('creates necessary directories and files', function (): void {
    $command = $this->artisan('xot:fix-structure');
    if ($command instanceof PendingCommand) {
        $command->assertExitCode(0);
    }

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

    $testDir = $this->testDir;
    foreach ($directories as $directory) {
        $this->assertDirectoryExists($testDir.'/'.$directory);
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
        $this->assertFileExists($testDir.'/'.$file);
    }
});

test('does not overwrite existing files', function (): void {
    $testContent = 'Test content';
    $testDir = $this->testDir;
    $testFile = $testDir.'/routes/web.php';
    file_put_contents($testFile, $testContent);

    $command = $this->artisan('xot:fix-structure');
    if ($command instanceof PendingCommand) {
        $command->assertExitCode(0);
    }

    $this->assertStringEqualsFile($testFile, $testContent);
});

test('handles errors gracefully', function (): void {
    $testDir = $this->testDir;
    $nonWritableDir = $testDir.'/app';
    chmod($nonWritableDir, 0o555);

    $command = $this->artisan('xot:fix-structure');
    if ($command instanceof PendingCommand) {
        $command->assertExitCode(1);
    }

    chmod($nonWritableDir, 0o755);
});
