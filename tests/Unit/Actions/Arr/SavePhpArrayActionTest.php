<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Arr;

use Modules\Xot\Actions\Arr\SavePhpArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\unlink;

class SavePhpArrayActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = app(SavePhpArrayAction::class);
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
    public function testSaves_array_to_php_file(): void
    {
        $data = ['a' => 1, 'b' => 'test'];
        $path = $this->tempDir.'/data.php';

        $result = app(SavePhpArrayAction::class)->execute($data, $path);

        Assert::assertTrue($result);
        $loaded = require $path;
        Assert::assertSame($data, $loaded);
    }
    public function testSaved_file_has_strict_types(): void
    {
        $path = $this->tempDir.'/strict.php';
        app(SavePhpArrayAction::class)->execute(['x' => 1], $path);

        Assert::assertStringContainsString('declare(strict_types=1)', file_get_contents($path));
    }
}
