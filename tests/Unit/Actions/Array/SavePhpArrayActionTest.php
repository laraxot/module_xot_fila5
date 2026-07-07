<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SavePhpArrayAction;

beforeEach(function (): void {
<<<<<<< HEAD
    $this->action = app(SavePhpArrayAction::class);
    $this->tempDir = sys_get_temp_dir().'/xot_array_php_'.uniqid();
    mkdir($this->tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($this->tempDir) && is_dir($this->tempDir)) {
        foreach (glob($this->tempDir.'/*') ?: [] as $file) {
            unlink($file);
        }
        rmdir($this->tempDir);
=======
    $action = app(SavePhpArrayAction::class);
    $tempDir = sys_get_temp_dir();
    mkdir($tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($tempDir))
        foreach (glob($tempDir.'/*'))
            unlink($f);
        }
        rmdir($tempDir);
>>>>>>> origin/dev
    }
});

it('saves array to php', function (): void {
<<<<<<< HEAD
    $path = $this->tempDir.'/d.php';
    $data = ['a' => 1];
    $result = $this->action->execute($data, $path);
=======
    $path = $tempDir.'/d.php';
    $data = ['a' => 1];
    $result = $action->execute($data, $path);
>>>>>>> origin/dev
    expect($result)->toBeTrue();
    expect(require $path)->toBe($data);
});
