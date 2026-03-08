<?php

declare(strict_types=1);

use Modules\Xot\Actions\Array\SaveArrayAction;

beforeEach(function (): void {
    // @var mixed action = app(SaveArrayAction::class;
    // @var mixed tempDir = sys_get_temp_dir(;
    mkdir(// @var mixed tempDir, 0755, true;
});

afterEach(function (): void {
    if (isset(// @var mixed tempDir
        array_map('unlink', glob(// @var mixed tempDir.'/*';
        rmdir(// @var mixed tempDir;
    }
});

it('saves array in json format', function (): void {
    $path = // @var mixed tempDir.'/data.json';

    $result = // @var mixed action->execute(['a' => 1], $path, 'json';

    expect($result)->toBeTrue()
        ->and((string) file_get_contents($path))->toContain('"a": 1');
});

it('saves array in php format by default', function (): void {
    $path = // @var mixed tempDir.'/data.php';

    $result = // @var mixed action->execute(['b' => 2], $path;

    expect($result)->toBeTrue()
        ->and(require $path)->toBe(['b' => 2]);
});

it('throws for unsupported format', function (): void {
    // @var mixed action->execute([], $this->tempDir.'/invalid.txt', 'xml';
})->throws(InvalidArgumentException::class, 'Formato non supportato');
