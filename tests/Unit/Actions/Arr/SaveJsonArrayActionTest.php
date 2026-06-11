<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Arr;

use Modules\Xot\Actions\Arr\SaveJsonArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Assert;
use function Safe\unlink;
use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\json_decode;
use function Safe\mkdir;
use function Safe\rmdir;

class SaveJsonArrayActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = app(SaveJsonArrayAction::class);
        $this->tempDir = sys_get_temp_dir().'/xot_arr_'.uniqid();
        mkdir($this->tempDir, 0755, true);
    }

    protected function tearDown(): void
    {
        if (isset($this->tempDir) && is_dir($this->tempDir)) {
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

    #[Test]
    public function saves_array_to_json_file(): void
    {
        $data = ['key' => 'value', 'nested' => ['a' => 1]];
        $path = $this->tempDir.'/data.json';

        $result = app(SaveJsonArrayAction::class)->execute($data, $path);
        Assert::assertSame($data, $result);

        Assert::assertTrue(file_exists($path));
    }

    #[Test]
    public function saves_empty_array(): void
    {
        $path = $this->tempDir.'/empty.json';
        $result = app(SaveJsonArrayAction::class)->execute([], $path);

        Assert::assertSame([], $result);
        Assert::assertSame([], json_decode(file_get_contents($path), true));
    }
}
