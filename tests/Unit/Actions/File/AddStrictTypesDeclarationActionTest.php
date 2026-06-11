<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\AddStrictTypesDeclarationAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;

class AddStrictTypesDeclarationActionTest extends TestCase
{
    protected string $workDir;

    protected function setUp(): void
    {
        parent::setUp();
        $this->action = app(AddStrictTypesDeclarationAction::class);
        $this->workDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'test_strict_types_'.uniqid();
        File::makeDirectory($this->workDir, 0755, true);
    }

    protected function tearDown(): void
    {
        if (File::isDirectory($this->workDir)) {
            File::deleteDirectory($this->workDir);
        }
        parent::tearDown();
    }

    #[Test]
    public function addsStrictTypesDeclarationToPhpFile(): void
    {
        $file = $this->workDir.'/test.php';
        File::put($file, "<?php\n\nnamespace Test;\n\nclass TestClass {}");

        app(AddStrictTypesDeclarationAction::class)->execute($file);

        $content = File::get($file);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    }

    #[Test]
    public function doesNotDuplicateStrictTypesIfAlreadyPresent(): void
    {
        $file = $this->workDir.'/test.php';
        File::put($file, "<?php\n\n\n\nnamespace Test;");

        app(AddStrictTypesDeclarationAction::class)->execute($file);

        $content = File::get($file);
        Assert::assertSame(1, substr_count($content, 'declare(strict_types=1)'));
    }

    #[Test]
    public function handlesFileWithExistingNamespace(): void
    {
        $file = $this->workDir.'/test.php';
        File::put($file, "<?php\n\n\n\nclass TestAction {}");

        app(AddStrictTypesDeclarationAction::class)->execute($file);

        $content = File::get($file);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
        Assert::assertStringContainsString('class TestAction {}', $content);
    }
}
