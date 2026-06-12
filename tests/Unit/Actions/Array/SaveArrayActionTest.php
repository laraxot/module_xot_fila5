<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SaveArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;

use function Safe\glob;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\unlink;

class SaveArrayActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = app(SaveArrayAction::class);
        $this->tempDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'pest_test_'.uniqid();
        if (! file_exists($this->tempDir)) {
            mkdir($this->tempDir, 0755, true);
        }
    }

    protected function tearDown(): void
    {
        if (isset($this->tempDir) && file_exists($this->tempDir)) {
            $dir = $this->tempDir;
            $files = glob($dir.'/*');
            foreach ($files as $file) {
                $this->assertIsString($file);
                unlink($file);
            }
            rmdir($dir);
        }
        parent::tearDown();
    }
    public function testSaves_array_in_json_format(): void
    {
        $path = $this->tempDir.'/data.json';

        $result = app(SaveArrayAction::class)->execute(['a' => 1], $path, 'json');

        Assert::assertTrue($result);
    }
    public function testSaves_array_in_php_format_by_default(): void
    {
        $path = $this->tempDir.'/data.php';

        $result = app(SaveArrayAction::class)->execute(['b' => 2], $path);
        Assert::assertSame(['b' => 2], $result);

        Assert::assertNotNull(require $path);
    }
    public function testThrows_for_unsupported_format(): void
    {
        try {
            app(SaveArrayAction::class)->execute([], $this->tempDir.'/invalid.txt', 'xml');
            Assert::fail('Expected exception not thrown');
        } catch (\InvalidArgumentException) {
            // Expected
        }
    }
}
