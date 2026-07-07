<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SaveArrayAction;

beforeEach(function (): void {
<<<<<<< HEAD
    $this->action = app(SaveArrayAction::class);
    $this->tempDir = sys_get_temp_dir().'/xot_save_array_'.uniqid();
    mkdir($this->tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($this->tempDir) && is_dir($this->tempDir)) {
        array_map('unlink', glob($this->tempDir.'/*') ?: []);
        rmdir($this->tempDir);
=======
    $action = app(SaveArrayAction::class);
    $tempDir = sys_get_temp_dir();
    mkdir($tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($tempDir))
        array_map('unlink', glob($tempDir.'/*'));
        rmdir($tempDir);
>>>>>>> origin/dev
    }
});

it('saves array in json format', function (): void {
<<<<<<< HEAD
    $path = $this->tempDir.'/data.json';

    $result = $this->action->execute(['a' => 1], $path, 'json');
=======
    $path = $tempDir.'/data.json';

    $result = $action->execute(['a' => 1], $path, 'json');
>>>>>>> origin/dev

    expect($result)->toBeTrue()
        ->and((string) file_get_contents($path))->toContain('"a": 1');
});

it('saves array in php format by default', function (): void {
<<<<<<< HEAD
    $path = $this->tempDir.'/data.php';

    $result = $this->action->execute(['b' => 2], $path);
=======
    $path = $tempDir.'/data.php';

    $result = $action->execute(['b' => 2], $path);
>>>>>>> origin/dev

    expect($result)->toBeTrue()
        ->and(require $path)->toBe(['b' => 2]);
});

it('throws for unsupported format', function (): void {
<<<<<<< HEAD
    $this->action->execute([], $this->tempDir.'/invalid.txt', 'xml');
=======
    $action->execute([], $this->tempDir.'/invalid.txt', 'xml');
>>>>>>> origin/dev
})->throws(InvalidArgumentException::class, 'Formato non supportato');
