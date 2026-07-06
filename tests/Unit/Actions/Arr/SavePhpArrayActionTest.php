<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Arr;

use Modules\Xot\Actions\Arr\SavePhpArrayAction;

beforeEach(function (): void {
    /* @var \Modules\Xot\Tests\TestCase $this */
    $this->action = app(SavePhpArrayAction::class);
    $this->tempDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'pest_test_'.uniqid();
    if (! file_exists($this->tempDir)) {
        mkdir($this->tempDir, 0755, true);
    }
});

afterEach(function (): void {
    /** @var TestCase $this */
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

describe('Save Php Array Action', function (): void {
    test('saves array to php file', function (): void {
        /** @var TestCase $this */
        $data = ['a' => 1, 'b' => 'test'];
        $path = $this->tempDir.'/data.php';

    $result = $this->action->execute($data, $path);

        Assert::assertTrue($result);
        $loaded = require $path;
        Assert::assertSame($data, $loaded);
    });

    test('saved file has strict types', function (): void {
        /** @var TestCase $this */
        $path = $this->tempDir.'/strict.php';
        app(SavePhpArrayAction::class)->execute(['x' => 1], $path);

        Assert::assertStringContainsString('declare(strict_types=1)', file_get_contents($path));
    });
});
