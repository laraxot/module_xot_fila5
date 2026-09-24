<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

<<<<<<< .merge_file_CLX9Ay
use Modules\Xot\Actions\File\AssetAction;
use Modules\Xot\Actions\File\AssetPathAction;
=======
<<<<<<< HEAD
use Modules\Xot\Actions\File\AssetAction;
use Modules\Xot\Actions\File\AssetPathAction;
=======
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\AssetAction;
use Modules\Xot\Actions\File\AssetPathAction;
use Modules\Xot\Actions\File\FixPathAction;
>>>>>>> laraxot/dev
>>>>>>> .merge_file_VzZA0n
use Modules\Xot\Actions\File\GetModulePathAction;
use Modules\Xot\Tests\TestCase;
use Nwidart\Modules\Facades\Module;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_CLX9Ay
=======
<<<<<<< HEAD
>>>>>>> .merge_file_VzZA0n
use ReflectionMethod;

use function Safe\chmod;
use function Safe\file_get_contents;
use function Safe\file_put_contents;
use function Safe\mkdir;
use function Safe\unlink;
<<<<<<< .merge_file_CLX9Ay
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_VzZA0n

uses(TestCase::class);

it('handles absolute urls in AssetAction', function (): void {
    $action = app(AssetAction::class);
    $url = 'https://example.com/asset.js';
    Assert::assertSame($url, $action->execute($url));
});

it('returns path if asset already exists in public folder', function (): void {
<<<<<<< .merge_file_CLX9Ay
=======
<<<<<<< HEAD
>>>>>>> .merge_file_VzZA0n
    $relative = 'assets/xot-test-exists-'.uniqid('', true).'.txt';
    $absolute = public_path($relative);
    if (! is_dir(\dirname($absolute))) {
        mkdir(\dirname($absolute), 0o755, true);
    }
    file_put_contents($absolute, 'already-public');

    try {
        $action = app(AssetAction::class);
        Assert::assertSame($relative, $action->execute($relative));
    } finally {
        if (is_file($absolute)) {
            unlink($absolute);
        }
    }
<<<<<<< .merge_file_CLX9Ay
=======
});

it('publishes module asset to public assets path', function (): void {
    $moduleRoot = sys_get_temp_dir().'/xot_mod_'.uniqid('', true);
    $resourceFile = $moduleRoot.'/resources/css/style.css';
    mkdir(\dirname($resourceFile), 0o755, true);
    file_put_contents($resourceFile, 'body{}');

    $dest = public_path('assets/XotAssetTest/css/style.css');
    if (is_file($dest)) {
        unlink($dest);
    }

    app()->instance(GetModulePathAction::class, new class($moduleRoot) extends GetModulePathAction
    {
        public function __construct(private string $modulePath) {}
=======
    $path = 'css/app.css';

    // Spy on File facade to simulate existing file
    File::partialMock()->allows([
        'exists' => true,
    ]);

    $action = app(AssetAction::class);
    Assert::assertSame($path, $action->execute($path));
>>>>>>> .merge_file_VzZA0n
});

it('publishes module asset to public assets path', function (): void {
    $moduleRoot = sys_get_temp_dir().'/xot_mod_'.uniqid('', true);
    $resourceFile = $moduleRoot.'/resources/css/style.css';
    mkdir(\dirname($resourceFile), 0o755, true);
    file_put_contents($resourceFile, 'body{}');

<<<<<<< .merge_file_CLX9Ay
    $dest = public_path('assets/XotAssetTest/css/style.css');
    if (is_file($dest)) {
        unlink($dest);
    }

    app()->instance(GetModulePathAction::class, new class($moduleRoot) extends GetModulePathAction
    {
        public function __construct(private string $modulePath) {}
=======
    // Replace GetModulePathAction with a spy
    $getModulePathAction = new class($modulePath) extends GetModulePathAction {
        public function __construct(private string $modulePath)
        {
        }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_VzZA0n

        public function execute(string $module): string
        {
            return $this->modulePath;
        }
<<<<<<< .merge_file_CLX9Ay
=======
<<<<<<< HEAD
>>>>>>> .merge_file_VzZA0n
    });

    try {
        $result = app(AssetAction::class)->execute('XotAssetTest::css/style.css');
        Assert::assertStringContainsString('assets/XotAssetTest/css/style.css', $result);
        Assert::assertFileExists($dest);
    } finally {
        if (is_file($dest)) {
            unlink($dest);
        }
        if (is_file($resourceFile)) {
            unlink($resourceFile);
<<<<<<< .merge_file_CLX9Ay
=======
        }
    }
});

it('keeps published dest when force-copy fails (best-effort via copyAsset)', function (): void {
    $from = sys_get_temp_dir().'/xot_asset_from_'.uniqid('', true).'.bin';
    $to = sys_get_temp_dir().'/xot_asset_to_'.uniqid('', true).'.bin';
    file_put_contents($from, 'source-bytes');
    file_put_contents($to, 'dest-already-published');
    chmod($to, 0444);

    try {
        $action = app(AssetAction::class);
        $method = new ReflectionMethod(AssetAction::class, 'copyAsset');
        $method->invoke($action, $from, $to, 'assets/demo/icon.png', true);

        Assert::assertFileExists($to);
        Assert::assertSame('dest-already-published', file_get_contents($to));
    } finally {
        chmod($to, 0644);
        if (is_file($from)) {
            unlink($from);
        }
        if (is_file($to)) {
            unlink($to);
        }
    }
});

it('skips force-copy when destination exists but is not writable', function (): void {
    $from = sys_get_temp_dir().'/xot_asset_from_'.uniqid('', true).'.bin';
    $to = sys_get_temp_dir().'/xot_asset_to_'.uniqid('', true).'.bin';
    file_put_contents($from, 'new-source');
    file_put_contents($to, 'keep-me');
    chmod($to, 0444);

    try {
        $action = app(AssetAction::class);
        $method = new ReflectionMethod(AssetAction::class, 'copyAsset');
        $method->invoke($action, $from, $to, 'assets/demo/icon.png', true);

        Assert::assertSame('keep-me', file_get_contents($to));
    } finally {
        chmod($to, 0644);
        if (is_file($from)) {
            unlink($from);
        }
        if (is_file($to)) {
            unlink($to);
        }
    }
});

it('calculates asset path correctly in AssetPathAction', function (): void {
    Module::partialMock()
        ->shouldReceive('getModulePath')
        ->with('User')
        ->andReturn('/path/to/User/');
=======
    };

    app()->instance(GetModulePathAction::class, $getModulePathAction);

    // Replace FixPathAction with a spy (identity function)
    $fixPathAction = new class extends FixPathAction {
        public function execute(string $path): string
        {
            return $path;
>>>>>>> .merge_file_VzZA0n
        }
    }
});

it('keeps published dest when force-copy fails (best-effort via copyAsset)', function (): void {
    $from = sys_get_temp_dir().'/xot_asset_from_'.uniqid('', true).'.bin';
    $to = sys_get_temp_dir().'/xot_asset_to_'.uniqid('', true).'.bin';
    file_put_contents($from, 'source-bytes');
    file_put_contents($to, 'dest-already-published');
    chmod($to, 0444);

    try {
        $action = app(AssetAction::class);
        $method = new ReflectionMethod(AssetAction::class, 'copyAsset');
        $method->invoke($action, $from, $to, 'assets/demo/icon.png', true);

        Assert::assertFileExists($to);
        Assert::assertSame('dest-already-published', file_get_contents($to));
    } finally {
        chmod($to, 0644);
        if (is_file($from)) {
            unlink($from);
        }
        if (is_file($to)) {
            unlink($to);
        }
    }
});

it('skips force-copy when destination exists but is not writable', function (): void {
    $from = sys_get_temp_dir().'/xot_asset_from_'.uniqid('', true).'.bin';
    $to = sys_get_temp_dir().'/xot_asset_to_'.uniqid('', true).'.bin';
    file_put_contents($from, 'new-source');
    file_put_contents($to, 'keep-me');
    chmod($to, 0444);

    try {
        $action = app(AssetAction::class);
        $method = new ReflectionMethod(AssetAction::class, 'copyAsset');
        $method->invoke($action, $from, $to, 'assets/demo/icon.png', true);

        Assert::assertSame('keep-me', file_get_contents($to));
    } finally {
        chmod($to, 0644);
        if (is_file($from)) {
            unlink($from);
        }
        if (is_file($to)) {
            unlink($to);
        }
    }
});

it('calculates asset path correctly in AssetPathAction', function (): void {
<<<<<<< .merge_file_CLX9Ay
    Module::partialMock()
        ->shouldReceive('getModulePath')
        ->with('User')
        ->andReturn('/path/to/User/');
=======
    // Spy on Module facade
    Module::partialMock()->allows([
        'getModulePath' => function (string $module): string {
            return 'User' === $module ? '/path/to/User/' : '';
        },
    ]);
>>>>>>> laraxot/dev
>>>>>>> .merge_file_VzZA0n

    $action = app(AssetPathAction::class);
    $result = $action->execute('User::js/app.js');

    Assert::assertSame('/path/to/User/resources/js/app.js', $result);
});
