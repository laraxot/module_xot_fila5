<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SaveJsonArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD

beforeEach(function (): void {
    $action = app(SaveJsonArrayAction::class);
    $tempDir = sys_get_temp_dir();
    mkdir($tempDir, 0755, true);
});

afterEach(function () use (&$arrayTestTempDir): void {
    if (! is_string($arrayTestTempDir) || ! is_dir($arrayTestTempDir)) {
        return;
=======

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\json_decode;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\unlink;

uses(TestCase::class);

/** @var string|null $arrayTestTempDir */
$arrayTestTempDir = null;

beforeEach(function () use (&$arrayTestTempDir): void {
    $arrayTestTempDir = sys_get_temp_dir().'/xot_array_'.uniqid();
    mkdir($arrayTestTempDir, 0755, true);
});

<<<<<<< HEAD
afterEach(function (): void {
    $tempDir = $this->tempDir;
    if (isset($tempDir) && is_string($tempDir) && is_dir($tempDir)) {
        foreach (glob($tempDir.'/*') ?: [] as $file) {
            if (is_string($file)) {
                unlink($file);
            }
        }
        rmdir($tempDir);
>>>>>>> 64619e34 (.)
=======
afterEach(function () use (&$arrayTestTempDir): void {
    if (! is_string($arrayTestTempDir) || ! is_dir($arrayTestTempDir)) {
        return;
>>>>>>> 61938ca4 (delete .claude-audit/)
    }

    foreach (glob($arrayTestTempDir.'/*') ?: [] as $file) {
        if (is_string($file)) {
            unlink($file);
        }
        rmdir($this->tempDir);
    }
});

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
describe('Save Json Array Action', function () use (&$arrayTestTempDir): void {
    test('saves array to json', function () use (&$arrayTestTempDir): void {
        Assert::assertIsString($arrayTestTempDir);
        $path = $arrayTestTempDir.'/d.json';
<<<<<<< HEAD
=======
describe('Save Json Array Action', function (): void {
    test('saves array to json', function (): void {
        $path = $this->tempDir.'/d.json';
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
        $result = app(SaveJsonArrayAction::class)->execute(['k' => 'v'], $path);
        Assert::assertTrue($result);
        Assert::assertSame(['k' => 'v'], json_decode(file_get_contents($path), true));
    });
});
