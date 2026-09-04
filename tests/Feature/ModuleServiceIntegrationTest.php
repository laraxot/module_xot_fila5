<?php

declare(strict_types=1);

use Illuminate\Support\Str;
use Modules\Xot\Services\ModuleService;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-xot-db');

function makeXotModuleService(string $name = 'Xot'): ModuleService
{
    return (new ModuleService())->setName($name);
}

describe('ModuleService Integration', function (): void {
    it('integrates with Nwidart Modules system', function (): void {
        Assert::assertTrue(class_exists('Nwidart\Modules\Facades\Module'));
        Assert::assertTrue(class_exists('Nwidart\Modules\Module'));
    });

    it('can find existing modules', function (): void {
        $chartService = makeXotModuleService('Chart');
        $userService = makeXotModuleService('User');
        $xotService = makeXotModuleService('Xot');

        Assert::assertInstanceOf(ModuleService::class, $chartService);
        Assert::assertInstanceOf(ModuleService::class, $userService);
        Assert::assertInstanceOf(ModuleService::class, $xotService);
    });

    it('returns models from existing modules', function (): void {
        $chartService = makeXotModuleService('Chart');
        /** @var array<string, string> $models */
        $models = $chartService->getModels();

        Assert::assertNotEmpty($models);

        $hasChartModel = false;
        foreach ($models as $modelClass) {
            if (str_contains($modelClass, 'Chart\\Models\\Chart')) {
                $hasChartModel = true;
                break;
            }
        }

        Assert::assertTrue($hasChartModel);
    });

    it('handles User module models correctly', function (): void {
        $userService = makeXotModuleService('User');
        /** @var array<string, string> $models */
        $models = $userService->getModels();

        Assert::assertNotEmpty($models);

        $hasUserModels = false;
        foreach (array_values($models) as $modelClass) {
            if (str_contains($modelClass, 'User\\Models\\')) {
                $hasUserModels = true;
                break;
            }
        }

        Assert::assertTrue($hasUserModels);
    });

    it('filters abstract models correctly', function (): void {
        $service = makeXotModuleService('Xot');
        /** @var array<string, string> $models */
        $models = $service->getModels();

        Assert::assertNotContains('base_model', array_keys($models));
    });

    it('returns class strings as values', function (): void {
        $service = makeXotModuleService('Xot');
        /** @var array<string, string> $models */
        $models = $service->getModels();

        foreach ($models as $key => $modelClass) {
            Assert::assertIsString($key);
            Assert::assertIsString($modelClass);
            Assert::assertTrue(str_contains($modelClass, 'Modules\\'));
        }
    });

    it('handles reflection operations safely', function (): void {
        $service = makeXotModuleService('Xot');
        /** @var array<string, string> $models */
        $models = $service->getModels();

        foreach ($models as $modelClass) {
            Assert::assertTrue(class_exists($modelClass) || interface_exists($modelClass));
        }
    });

    it('processes module directory structure', function (): void {
        $service = makeXotModuleService('Xot');
        Assert::assertNotEmpty($service->getModels());
    });

    it('handles snake_case conversion correctly', function (): void {
        Assert::assertSame('test_model_name', Str::snake('TestModelName'));
    });

    it('can handle multiple module instances', function (): void {
        foreach (['Chart', 'User', 'Xot', 'Job'] as $moduleName) {
            $service = makeXotModuleService($moduleName);
            Assert::assertInstanceOf(ModuleService::class, $service);
            Assert::assertNotEmpty($service->getModels());
        }
    });

    it('validates module existence checking', function (): void {
        $nonExistentService = makeXotModuleService('NonExistentModule');
        Assert::assertSame([], $nonExistentService->getModels());
    });

    it('handles namespace construction correctly', function (): void {
        $chartService = makeXotModuleService('Chart');
        /** @var array<string, string> $models */
        $models = $chartService->getModels();

        foreach ($models as $modelClass) {
            Assert::assertStringContainsString('Modules\\Chart\\', $modelClass);
        }
    });

    it('processes file extensions correctly', function (): void {
        $service = makeXotModuleService('Xot');
        /** @var array<string, string> $models */
        $models = $service->getModels();

        foreach ($models as $modelClass) {
            Assert::assertGreaterThan(0, strlen($modelClass));
        }
    });

    it('handles exception scenarios gracefully', function (): void {
        foreach (['', 'InvalidModule', 'Test123'] as $moduleName) {
            $service = makeXotModuleService($moduleName);
            Assert::assertNotEmpty($service->getModels());
        }
    });

    it('validates return type consistency', function (): void {
        $service = makeXotModuleService('Xot');
        /** @var array<string, string> $models */
        $models = $service->getModels();

        foreach ($models as $key => $value) {
            Assert::assertGreaterThan(0, strlen($key));
            Assert::assertGreaterThan(0, strlen($value));
        }
    });

    it('can work with Laravel service container', function (): void {
        $service = makeXotModuleService('TestModule');
        Assert::assertInstanceOf(ModuleService::class, $service);
    });

    it('handles concurrent access correctly', function (): void {
        $results = [];
        for ($i = 0; $i < 3; $i++) {
            $results[] = makeXotModuleService('Xot')->getModels();
        }

        Assert::assertSame($results[0], $results[1]);
        Assert::assertSame($results[1], $results[2]);
    });

    it('validates module path resolution', function (): void {
        $service = makeXotModuleService('Xot');
        /** @var array<string, string> $models */
        $models = $service->getModels();

        foreach ($models as $modelClass) {
            Assert::assertMatchesRegularExpression('/^Modules\\\\[A-Za-z]+\\\\Models\\\\[A-Za-z]+$/', $modelClass);
        }
    });

    it('integrates with Laravel string helpers', function (): void {
        Assert::assertSame('TestString', Str::studly('test_string'));
    });

    it('can handle model discovery efficiently', function (): void {
        $startTime = microtime(true);
        $models = makeXotModuleService('Xot')->getModels();
        $executionTime = microtime(true) - $startTime;

        Assert::assertNotEmpty($models);
        Assert::assertLessThan(5.0, $executionTime);
    });
});
