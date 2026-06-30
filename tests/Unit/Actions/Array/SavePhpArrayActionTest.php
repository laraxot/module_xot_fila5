<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SavePhpArrayAction;
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

describe('Save Php Array Action', function () use (&$arrayTestTempDir): void {
    test('saves array to php', function () use (&$arrayTestTempDir): void {
        Assert::assertIsString($arrayTestTempDir);
        $path = $arrayTestTempDir.'/d.php';
=======

use function Safe\glob;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\unlink;

uses(TestCase::class);

beforeEach(function (): void {
    $this->action = app(SavePhpArrayAction::class);
    $this->tempDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'pest_test_'.uniqid();
    if (! file_exists($this->tempDir)) {
        mkdir($this->tempDir, 0755, true);
    }
});

afterEach(function (): void {
    $tempDir = $this->tempDir;
    if (isset($tempDir) && is_string($tempDir) && file_exists($tempDir)) {
        $files = glob($tempDir.'/*');
        foreach ($files as $f) {
            if (is_string($f)) {
                unlink($f);
            }
        }
        rmdir($tempDir);
    }
});

describe('Save Php Array Action', function (): void {
    test('saves array to php', function (): void {
        $path = $this->tempDir.'/d.php';
>>>>>>> 64619e34 (.)
        $data = ['a' => 1];
        $result = app(SavePhpArrayAction::class)->execute($data, $path);
        Assert::assertTrue($result);
        Assert::assertSame($data, require $path);
    });
});
