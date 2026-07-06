<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Arr;

use Modules\Xot\Actions\Arr\SaveJsonArrayAction;

beforeEach(function (): void {
    /** @var \Modules\Xot\Tests\TestCase $this */
        $this->action = app(SaveJsonArrayAction::class);
    $this->tempDir = sys_get_temp_dir().'/xot_arr_'.uniqid();
    mkdir($this->tempDir, 0755, true);
});

afterEach(function (): void {
    /** @var \Modules\Xot\Tests\TestCase $this */
        if (isset($this->tempDir) && is_dir($this->tempDir)) {
        $dir = $this->tempDir;
        $files = glob($dir.'/*');
        foreach ($files as $file) {
            $this->assertIsString($file);
            unlink($file);
        }
        rmdir($dir);
    }
});

describe('Save Json Array Action', function (): void {
    test('saves array to json file', function (): void {
        /** @var \Modules\Xot\Tests\TestCase $this */
        $data = ['key' => 'value', 'nested' => ['a' => 1]];
        $path = $this->tempDir.'/data.json';

    $result = $this->action->execute($data, $path);

        Assert::assertTrue(file_exists($path));
    });

    test('saves empty array', function (): void {
        /** @var \Modules\Xot\Tests\TestCase $this */
        $path = $this->tempDir.'/empty.json';
        $result = app(SaveJsonArrayAction::class)->execute([], $path);

        Assert::assertSame([], $result);
        Assert::assertSame([], json_decode(file_get_contents($path), true));
    });
});
