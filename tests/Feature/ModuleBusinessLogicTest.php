<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Module;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Sushi\Sushi;

uses(TestCase::class);

describe('Module sushi business logic', function (): void {
    it('extends eloquent model and uses sushi', function (): void {
        $module = new Module();

        Assert::assertInstanceOf(Model::class, $module);
        Assert::assertContains(Sushi::class, class_uses_recursive(Module::class));
    });

    it('exposes fillable attributes aligned with nwidart registry', function (): void {
        $module = new Module();

        Assert::assertSame(
            ['name', 'status', 'priority', 'path', 'icon', 'colors'],
            $module->getFillable(),
        );
    });

    it('casts status and colors correctly', function (): void {
        $module = new Module();
        $casts = $module->getCasts();

        Assert::assertSame('boolean', $casts['status'] ?? null);
        Assert::assertSame('array', $casts['colors'] ?? null);
        Assert::assertSame('integer', $casts['priority'] ?? null);
    });

    it('loads rows from registered nwidart modules', function (): void {
        $module = Module::query()->first();

        if ($module === null) {
            return;
        }

        Assert::assertInstanceOf(Module::class, $module);
        Assert::assertNotEmpty($module->name);
        Assert::assertIsString($module->path);
    });

    it('getRows returns module registry snapshot', function (): void {
        $module = new Module();
        $rows = $module->getRows();

        if ($rows === []) {
            return;
        }

        $first = $rows[0];
        Assert::assertArrayHasKey('name', $first);
        Assert::assertArrayHasKey('status', $first);
        Assert::assertArrayHasKey('path', $first);
    });

    it('can set and read dynamic attributes via eloquent API', function (): void {
        $module = new Module();
        $module->setAttribute('name', 'TestModule');
        $module->setAttribute('status', true);
        $module->setAttribute('priority', 10);

        Assert::assertSame('TestModule', $module->getAttribute('name'));
        Assert::assertTrue($module->getAttribute('status'));
        Assert::assertSame(10, $module->getAttribute('priority'));
    });
});
