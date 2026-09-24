<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Arr;

use Modules\Xot\Actions\Arr\SavePhpArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\unlink;

uses(TestCase::class);

<<<<<<< HEAD
// $this dentro le closure Pest e' tipizzato da Pest come TestCall, non come
// Modules\Xot\Tests\TestCase: PHPStan vieta di ritipizzare $this via @var, quindi
// la temp dir del test vive in una variabile locale condivisa per riferimento.
$tempDir = '';

beforeEach(function () use (&$tempDir): void {
    $tempDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'pest_test_'.uniqid();
    if (! file_exists($tempDir)) {
        mkdir($tempDir, 0755, true);
    }
});

afterEach(function () use (&$tempDir): void {
    if ($tempDir !== '' && file_exists($tempDir)) {
        $files = glob($tempDir.'/*');
        foreach ($files as $file) {
            Assert::assertIsString($file);
            unlink($file);
        }
        rmdir($tempDir);
    }
});

describe('Save Php Array Action', function () use (&$tempDir): void {
    test('saves array to php file', function () use (&$tempDir): void {
        $data = ['a' => 1, 'b' => 'test'];
        $path = $tempDir.'/data.php';
=======
beforeEach(function (): void {
    $this->action = app(SavePhpArrayAction::class);
    $this->tempDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'pest_test_'.uniqid();
    if (! file_exists($this->tempDir)) {
        mkdir($this->tempDir, 0755, true);
    }
});

afterEach(function (): void {
    if (isset($this->tempDir) && file_exists($this->tempDir)) {
        $dir = $this->tempDir;
        $files = glob($dir.'/*');
        foreach ($files as $file) {
            $this->assertIsString($file);
            unlink($file);
        }
        rmdir($dir);
    }
});

describe('Save Php Array Action', function (): void {
    test('saves array to php file', function (): void {
        $data = ['a' => 1, 'b' => 'test'];
        $path = $this->tempDir.'/data.php';
>>>>>>> laraxot/dev

        $result = app(SavePhpArrayAction::class)->execute($data, $path);

        Assert::assertTrue($result);
        $loaded = require $path;
        Assert::assertSame($data, $loaded);
    });

<<<<<<< HEAD
    test('saved file has strict types', function () use (&$tempDir): void {
        $path = $tempDir.'/strict.php';
=======
    test('saved file has strict types', function (): void {
        $path = $this->tempDir.'/strict.php';
>>>>>>> laraxot/dev
        app(SavePhpArrayAction::class)->execute(['x' => 1], $path);

        Assert::assertStringContainsString('declare(strict_types=1)', file_get_contents($path));
    });
<<<<<<< HEAD

    test('nested arrays are written one key per line never inline', function () use (&$tempDir): void {
        // Ordine utente 2026-09-16: mai 'nav' => ['a' => 1, 'b' => 2] su una riga.
        $path = $tempDir.'/nested.php';
        app(SavePhpArrayAction::class)->execute([
            'navigation' => [
                'label' => 'Dipendenti',
                'icon' => 'heroicon-o-user',
                'sort' => 11,
            ],
            'title' => 'Compilazione Scheda Dipendente',
        ], $path);

        $content = file_get_contents($path);
        Assert::assertStringNotContainsString(
            "'navigation' => ['label'",
            $content,
            'VarExporter-style compact nested array is forbidden',
        );
        Assert::assertMatchesRegularExpression(
            "/'navigation' => \\[\\n\\s+'label' =>/",
            $content,
        );
        Assert::assertSame(
            [
                'navigation' => [
                    'label' => 'Dipendenti',
                    'icon' => 'heroicon-o-user',
                    'sort' => 11,
                ],
                'title' => 'Compilazione Scheda Dipendente',
            ],
            require $path,
        );
    });
=======
>>>>>>> laraxot/dev
});
