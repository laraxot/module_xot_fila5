<?php

declare(strict_types=1);

use Modules\Xot\Actions\Arr\SaveJsonArrayAction;

beforeEach(function (): void {
    // @var mixed action = app(SaveJsonArrayAction::class;
    // @var mixed tempDir = sys_get_temp_dir(;
    mkdir(// @var mixed tempDir, 0755, true;
});

afterEach(function (): void {
    if (isset(// @var mixed tempDir
        array_map('unlink', glob(// @var mixed tempDir.'/*';
        rmdir(// @var mixed tempDir;
    }
});

it('saves array to json file', function (): void {
    $data = ['key' => 'value', 'nested' => ['a' => 1]];
    $path = // @var mixed tempDir.'/data.json';

    $result = // @var mixed action->execute($data, $path;

    expect($result)->toBeTrue()
        ->and(file_exists($path))->toBeTrue()
        ->and(json_decode(file_get_contents($path), true))->toBe($data);
});

it('saves empty array', function (): void {
    $path = // @var mixed tempDir.'/empty.json';
    $result = // @var mixed action->execute([], $path;

    expect($result)->toBeTrue()
        ->and(json_decode(file_get_contents($path), true))->toBe([]);
});
