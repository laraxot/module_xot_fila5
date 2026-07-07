<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Arr;

use Modules\Xot\Actions\Arr\SaveJsonArrayAction;

beforeEach(function (): void {
<<<<<<< HEAD
    $this->action = app(SaveJsonArrayAction::class);
    $this->tempDir = sys_get_temp_dir().'/xot_arr_'.uniqid();
    mkdir($this->tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($this->tempDir) && is_dir($this->tempDir)) {
        array_map('unlink', glob($this->tempDir.'/*') ?: []);
        rmdir($this->tempDir);
=======
    $action = app(SaveJsonArrayAction::class);
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

it('saves array to json file', function (): void {
    $data = ['key' => 'value', 'nested' => ['a' => 1]];
<<<<<<< HEAD
    $path = $this->tempDir.'/data.json';

    $result = $this->action->execute($data, $path);
=======
    $path = $tempDir.'/data.json';

    $result = $action->execute($data, $path);
>>>>>>> origin/dev

    expect($result)->toBeTrue()
        ->and(file_exists($path))->toBeTrue()
        ->and(json_decode(file_get_contents($path), true))->toBe($data);
});

it('saves empty array', function (): void {
<<<<<<< HEAD
    $path = $this->tempDir.'/empty.json';
    $result = $this->action->execute([], $path);
=======
    $path = $tempDir.'/empty.json';
    $result = $action->execute([], $path);
>>>>>>> origin/dev

    expect($result)->toBeTrue()
        ->and(json_decode(file_get_contents($path), true))->toBe([]);
});
