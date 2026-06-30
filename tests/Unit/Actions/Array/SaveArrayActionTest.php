<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SaveArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD

use function Safe\glob;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\unlink;

uses(TestCase::class);

/** @var string|null $arrayTestTempDir */
$arrayTestTempDir = null;

beforeEach(function () use (&$arrayTestTempDir): void {
    $arrayTestTempDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'pest_test_'.uniqid();
    if (! file_exists($arrayTestTempDir)) {
        mkdir($arrayTestTempDir, 0755, true);
    }
});

afterEach(function () use (&$arrayTestTempDir): void {
    if (! is_string($arrayTestTempDir) || ! file_exists($arrayTestTempDir)) {
        return;
    }

    foreach (glob($arrayTestTempDir.'/*') ?: [] as $file) {
        if (is_string($file)) {
            unlink($file);
        }
    }

    rmdir($arrayTestTempDir);
    $arrayTestTempDir = null;
});

describe('Save Array Action', function () use (&$arrayTestTempDir): void {
    test('saves array in json format', function () use (&$arrayTestTempDir): void {
        Assert::assertIsString($arrayTestTempDir);
        $path = $arrayTestTempDir.'/data.json';
=======

use function Safe\glob;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\unlink;

uses(TestCase::class);

beforeEach(function (): void {
    $this->action = app(SaveArrayAction::class);
    $this->tempDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'pest_test_'.uniqid();
    if (! file_exists($this->tempDir)) {
        mkdir($this->tempDir, 0755, true);
    }
});

afterEach(function (): void {
    if (isset($this->tempDir) && file_exists($this->tempDir)) {
        $dir = $this->tempDir;
        $files = glob($dir.'/*');
        foreach ($files as $file) {
            $this->assertIsString($file);
            unlink($file);
        }
        rmdir($dir);
    }
});

describe('Save Array Action', function (): void {
    test('saves array in json format', function (): void {
        $path = $this->tempDir.'/data.json';
>>>>>>> 64619e34 (.)

        $result = app(SaveArrayAction::class)->execute(['a' => 1], $path, 'json');

        Assert::assertTrue($result);
    });

<<<<<<< HEAD
    test('saves array in php format by default', function () use (&$arrayTestTempDir): void {
        Assert::assertIsString($arrayTestTempDir);
        $path = $arrayTestTempDir.'/data.php';

        $result = app(SaveArrayAction::class)->execute(['b' => 2], $path);
        Assert::assertTrue($result);

        Assert::assertSame(['b' => 2], require $path);
    });

    test('throws for unsupported format', function () use (&$arrayTestTempDir): void {
        Assert::assertIsString($arrayTestTempDir);

        try {
            app(SaveArrayAction::class)->execute([], $arrayTestTempDir.'/invalid.txt', 'xml');
=======
    test('saves array in php format by default', function (): void {
        $path = $this->tempDir.'/data.php';

        $result = app(SaveArrayAction::class)->execute(['b' => 2], $path);
        Assert::assertSame(['b' => 2], $result);

        Assert::assertNotNull(require $path);
    });

    test('throws for unsupported format', function (): void {
        try {
            app(SaveArrayAction::class)->execute([], $this->tempDir.'/invalid.txt', 'xml');
>>>>>>> 64619e34 (.)
            Assert::fail('Expected exception not thrown');
        } catch (\InvalidArgumentException) {
            // Expected
        }
    });
});
