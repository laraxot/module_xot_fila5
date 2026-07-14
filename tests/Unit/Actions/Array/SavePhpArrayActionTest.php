<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SavePhpArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

beforeEach(function (): void {
    $action = app(SavePhpArrayAction::class);
    $tempDir = sys_get_temp_dir();
    mkdir($tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($tempDir))
        foreach (glob($tempDir.'/*'))
            unlink($f);
        }
        rmdir($this->tempDir);
    }
});

describe('Save Php Array Action', function () use (&$arrayTestTempDir): void {
    test('saves array to php', function () use (&$arrayTestTempDir): void {
        Assert::assertIsString($arrayTestTempDir);
        $path = $arrayTestTempDir.'/d.php';
        $data = ['a' => 1];
        $result = app(SavePhpArrayAction::class)->execute($data, $path);
        Assert::assertTrue($result);
        Assert::assertSame($data, require $path);
    });
});
