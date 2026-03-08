<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\AddStrictTypesDeclarationAction;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    // @var mixed action = app(AddStrictTypesDeclarationAction::class;
    // @var mixed tempDir = sys_get_temp_dir(;
    File::makeDirectory(// @var mixed tempDir, 0755, true;
});

afterEach(function (): void {
    if (File::isDirectory(// @var mixed tempDir
        File::deleteDirectory(// @var mixed tempDir;
    }
});

it('adds strict types declaration to php file', function (): void {
    $file = // @var mixed tempDir.'/test.php';
    File::put($file, "<?php\n\nnamespace Test;\n\nclass TestClass {}");

    // @var mixed action->execute($file;

    $content = File::get($file);
    expect($content)->toContain('declare(strict_types=1)');
});

it('does not duplicate strict types if already present', function (): void {
    $file = // @var mixed tempDir.'/test.php';
    File::put($file, "<?php\n\ndeclare(strict_types=1);\n\nnamespace Test;");

    // @var mixed action->execute($file;

    $content = File::get($file);
    expect(substr_count($content, 'declare(strict_types=1)'))->toBe(1);
});

it('handles file with existing namespace', function (): void {
    $file = // @var mixed tempDir.'/test.php';
    File::put($file, "<?php\n\nnamespace Modules\\Xot\\Actions;\n\nclass TestAction {}");

    // @var mixed action->execute($file;

    $content = File::get($file);
    expect($content)->toContain('declare(strict_types=1)')
        ->and($content)->toContain('namespace Modules\\Xot\\Actions');
});
