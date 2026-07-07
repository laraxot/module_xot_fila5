<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SaveJsonArrayAction;

beforeEach(function (): void {
<<<<<<< HEAD
    $this->action = app(SaveJsonArrayAction::class);
    $this->tempDir = sys_get_temp_dir().'/xot_array_'.uniqid();
    mkdir($this->tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($this->tempDir) && is_dir($this->tempDir)) {
        foreach (glob($this->tempDir.'/*') ?: [] as $file) {
            unlink($file);
        }
        rmdir($this->tempDir);
=======
    $action = app(SaveJsonArrayAction::class);
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

it('saves array to json', function (): void {
<<<<<<< HEAD
    $path = $this->tempDir.'/d.json';
    $result = $this->action->execute(['k' => 'v'], $path);
=======
    $path = $tempDir.'/d.json';
    $result = $action->execute(['k' => 'v'], $path);
>>>>>>> origin/dev
    expect($result)->toBeTrue();
    expect(json_decode(file_get_contents($path), true))->toBe(['k' => 'v']);
});
