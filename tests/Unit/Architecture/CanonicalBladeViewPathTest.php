<?php

declare(strict_types=1);

use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('architecture', 'issue-93');

/**
 * Guardia per il percorso canonico delle viste Blade Xot.
 *
 * @see Modules/Xot/docs/architecture/canonical-blade-view-path.md
 */
it('mantiene resources/views come percorso canonico e congela il residuo legacy', function (): void {
    $moduleRoot = base_path('Modules/Xot');
    $canonicalViewRoot = $moduleRoot.'/resources/views';
    $legacyViewRoot = $moduleRoot.'/app/Resources/views';

    Assert::assertDirectoryExists($canonicalViewRoot);
    Assert::assertDirectoryExists($legacyViewRoot);

    $legacyFiles = [];
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($legacyViewRoot, FilesystemIterator::SKIP_DOTS),
    );

    foreach ($iterator as $file) {
        if (! $file instanceof SplFileInfo || ! $file->isFile() || $file->getExtension() !== 'php') {
            continue;
        }

        $path = $file->getPathname();
        $relative = substr($path, strlen($legacyViewRoot) + 1);
        Assert::assertIsString($relative);
        $legacyFiles[] = str_replace(DIRECTORY_SEPARATOR, '/', $relative);
    }

    sort($legacyFiles);

    Assert::assertSame([
        'admin/index/acts/test.blade.php',
        'admin/test/index/acts/test_mail.blade.php',
        'livewire/test.blade.php',
        'test.blade.php',
    ], $legacyFiles);
});
