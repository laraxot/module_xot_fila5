<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Arr;

use Modules\Xot\Actions\Arr\SavePhpArrayAction;

beforeEach(function (): void {
<<<<<<< HEAD
    $this->action = app(SavePhpArrayAction::class);
    $this->tempDir = sys_get_temp_dir().'/xot_arr_php_'.uniqid();
    mkdir($this->tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($this->tempDir) && is_dir($this->tempDir)) {
        array_map('unlink', glob($this->tempDir.'/*') ?: []);
        rmdir($this->tempDir);
=======
    $action = app(SavePhpArrayAction::class);
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

it('saves array to php file', function (): void {
    $data = ['a' => 1, 'b' => 'test'];
<<<<<<< HEAD
    $path = $this->tempDir.'/data.php';

    $result = $this->action->execute($data, $path);
=======
    $path = $tempDir.'/data.php';

    $result = $action->execute($data, $path);
>>>>>>> origin/dev

    expect($result)->toBeTrue();
    $loaded = require $path;
    expect($loaded)->toBe($data);
});

it('saved file has strict types', function (): void {
<<<<<<< HEAD
    $path = $this->tempDir.'/strict.php';
    $this->action->execute(['x' => 1], $path);
=======
    $path = $tempDir.'/strict.php';
    $action->execute(['x' => 1], $path);
>>>>>>> origin/dev

    expect(file_get_contents($path))->toContain('declare(strict_types=1)');
});
