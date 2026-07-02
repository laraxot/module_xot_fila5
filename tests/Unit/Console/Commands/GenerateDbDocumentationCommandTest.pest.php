<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Modules\Xot\Tests\TestCase;
use Webmozart\Assert\Assert;

use function Safe\file_put_contents;
use function Safe\json_encode;

uses(TestCase::class);

beforeEach(function (): void {
    $this->testSchemaPath = storage_path('tests/schema.json');
    $this->testOutputDir = storage_path('tests/docs');

    if (! File::exists(\dirname($this->testSchemaPath))) {
        File::makeDirectory(\dirname($this->testSchemaPath), 0o755, true);
    }

    $testSchema = [
        'database' => 'test_db',
        'connection' => 'mysql',
        'tables' => [
            'users' => [
                'columns' => [
                    'id' => [
                        'type' => 'bigint',
                        'nullable' => false,
                        'default' => null,
                        'extra' => 'auto_increment',
                    ],
                    'name' => [
                        'type' => 'varchar(255)',
                        'nullable' => false,
                        'default' => null,
                    ],
                ],
                'primary_key' => [
                    'columns' => ['id'],
                ],
                'indexes' => [
                    'name_index' => [
                        'columns' => ['name'],
                        'type' => 'index',
                    ],
                ],
                'foreign_keys' => [],
                'record_count' => 10,
            ],
        ],
        'relationships' => [],
    ];

    file_put_contents($this->testSchemaPath, json_encode($testSchema, JSON_PRETTY_PRINT));

    if (File::exists($this->testOutputDir)) {
        File::deleteDirectory($this->testOutputDir);
    }
});

afterEach(function (): void {
    if (is_string($this->testSchemaPath) && File::exists($this->testSchemaPath)) {
        File::delete($this->testSchemaPath);
    }
    if (is_string($this->testOutputDir) && File::exists($this->testOutputDir)) {
        File::deleteDirectory($this->testOutputDir);
    }
});

test('it generates database documentation', function (): void {
    $schemaPath = $this->testSchemaPath;
    $outputDir = $this->testOutputDir;
    Assert::notNull($schemaPath);
    Assert::notNull($outputDir);

    $exitCode = Artisan::call('xot:generate-db-documentation', [
        '--schema' => $schemaPath,
        '--output' => $outputDir,
    ]);

    expect($exitCode)->toBe(0);
    expect(File::exists($outputDir.'/database-documentation.md'))
        ->toBeTrue()
        ->and(File::exists($outputDir.'/tables/users.md'))
        ->toBeTrue();
});

test('it handles missing schema file', function (): void {
    $schemaPath = $this->testSchemaPath;
    $outputDir = $this->testOutputDir;
    Assert::notNull($schemaPath);
    Assert::notNull($outputDir);

    File::delete($schemaPath);

    $exitCode = Artisan::call('xot:generate-db-documentation', [
        '--schema' => $schemaPath,
        '--output' => $outputDir,
    ]);

    expect($exitCode)->not->toBe(0);
});

test('it handles invalid schema file', function (): void {
    $schemaPath = $this->testSchemaPath;
    $outputDir = $this->testOutputDir;
    Assert::notNull($schemaPath);
    Assert::notNull($outputDir);

    file_put_contents($schemaPath, 'invalid json');

    $exitCode = Artisan::call('xot:generate-db-documentation', [
        '--schema' => $schemaPath,
        '--output' => $outputDir,
    ]);

    expect($exitCode)->not->toBe(0);
});

test('it handles missing output directory', function (): void {
    $schemaPath = $this->testSchemaPath;
    $outputDir = $this->testOutputDir;
    Assert::notNull($schemaPath);
    Assert::notNull($outputDir);

    if (File::exists($outputDir)) {
        File::deleteDirectory($outputDir);
    }

    $exitCode = Artisan::call('xot:generate-db-documentation', [
        '--schema' => $schemaPath,
        '--output' => $outputDir,
    ]);

    expect($exitCode)->toBe(0)->and(File::isDirectory($outputDir))->toBeTrue();
});
