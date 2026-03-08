<?php

declare(strict_types=1);

use Modules\Xot\Actions\Arr\SavePhpArrayAction;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    // @var mixed action = app(SavePhpArrayAction::class;
    // @var mixed tempDir = sys_get_temp_dir(;
    mkdir(// @var mixed tempDir, 0755, true;
});

afterEach(function (): void {
    if (isset(// @var mixed tempDir
        array_map('unlink', glob(// @var mixed tempDir.'/*';
        rmdir(// @var mixed tempDir;
    }
});

it('saves array to php file', function (): void {
    $data = ['a' => 1, 'b' => 'test'];
    $path = // @var mixed tempDir.'/data.php';

    $result = // @var mixed action->execute($data, $path;

    expect($result)->toBeTrue();
    $loaded = require $path;
    expect($loaded)->toBe($data);
});

it('saved file has strict types', function (): void {
    $path = // @var mixed tempDir.'/strict.php';
    // @var mixed action->execute(['x' => 1], $path;

    expect(file_get_contents($path))->toContain('declare(strict_types=1)');
});
