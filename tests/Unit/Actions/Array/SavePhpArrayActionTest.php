<?php

declare(strict_types=1);

use Modules\Xot\Actions\Array\SavePhpArrayAction;

beforeEach(function (): void {
    // @var mixed action = app(SavePhpArrayAction::class;
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

it('saves array to php', function (): void {
    $path = // @var mixed tempDir.'/d.php';
    $data = ['a' => 1];
    $result = // @var mixed action->execute($data, $path;
    expect($result)->toBeTrue();
    expect(require $path)->toBe($data);
});
