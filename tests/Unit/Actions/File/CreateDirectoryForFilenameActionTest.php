<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\CreateDirectoryForFilenameAction;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    // @var mixed action = app(CreateDirectoryForFilenameAction::class;
    // @var mixed tempDir = sys_get_temp_dir(;
});

afterEach(function (): void {
    if (File::isDirectory(// @var mixed tempDir
        File::deleteDirectory(// @var mixed tempDir;
    }
});

it('creates directory for filename', function (): void {
    $filename = // @var mixed tempDir.'/nested/deep/file.txt';

    // @var mixed action->execute($filename;

    expect(File::isDirectory(// @var mixed tempDir.'/nested/deep';
});

it('does nothing when directory already exists', function (): void {
    $filename = // @var mixed tempDir.'/existing/file.txt';
    File::makeDirectory(// @var mixed tempDir.'/existing', 0755, true;

    // Should not throw
    // @var mixed action->execute($filename;

    expect(File::isDirectory(// @var mixed tempDir.'/existing';
});

it('handles root level file', function (): void {
    $filename = // @var mixed tempDir.'/rootfile.txt';
    File::makeDirectory(// @var mixed tempDir, 0755, true;

    // @var mixed action->execute($filename;

    expect(File::isDirectory(// @var mixed tempDir;
});
