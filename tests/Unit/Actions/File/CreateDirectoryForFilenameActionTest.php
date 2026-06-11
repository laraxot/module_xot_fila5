<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\CreateDirectoryForFilenameAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Assert;

class CreateDirectoryForFilenameActionTest extends TestCase
{
    protected string $workDir;

    protected function setUp(): void
    {
        parent::setUp();
        $this->action = app(CreateDirectoryForFilenameAction::class);
        $this->workDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'test_create_dir_'.uniqid();
        if (! File::isDirectory($this->workDir)) {
            File::makeDirectory($this->workDir, 0755, true);
        }
    }

    protected function tearDown(): void
    {
        if (File::isDirectory($this->workDir)) {
            File::deleteDirectory($this->workDir);
        }
        parent::tearDown();
    }

    #[Test]
    public function creates_directory_for_filename(): void
    {
        $filename = $this->workDir.'/nested/deep/file.txt';

        app(CreateDirectoryForFilenameAction::class)->execute($filename);

        Assert::assertTrue(File::isDirectory($this->workDir.'/nested/deep'));
    }

    #[Test]
    public function does_nothing_when_directory_already_exists(): void
    {
        $filename = $this->workDir.'/existing/file.txt';
        File::makeDirectory($this->workDir.'/existing', 0755, true);

        app(CreateDirectoryForFilenameAction::class)->execute($filename);

        Assert::assertTrue(File::isDirectory($this->workDir.'/existing'));
    }

    #[Test]
    public function handles_root_level_file(): void
    {
        $filename = $this->workDir.'/rootfile.txt';
        File::makeDirectory($this->workDir, 0755, true);

        app(CreateDirectoryForFilenameAction::class)->execute($filename);

        Assert::assertTrue(File::isDirectory($this->workDir));
    }
}
