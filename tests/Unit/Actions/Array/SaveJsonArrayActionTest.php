<?php

declare(strict_types=1);

use Modules\Xot\Actions\Array\SaveJsonArrayAction;

beforeEach(function (): void {
    // @var mixed action = app(SaveJsonArrayAction::class;
    // @var mixed tempDir = sys_get_temp_dir(;
    mkdir(// @var mixed tempDir, 0755, true;
});

afterEach(function (): void {
    if (isset(// @var mixed tempDir
        foreach (glob(// @var mixed tempDir.'/*'
            unlink($f);
        }
        rmdir(// @var mixed tempDir;
    }
});

it('saves array to json', function (): void {
    $path = // @var mixed tempDir.'/d.json';
    $result = // @var mixed action->execute(['k' => 'v'], $path;
    expect($result)->toBeTrue();
    expect(json_decode(file_get_contents($path), true))->toBe(['k' => 'v']);
});
