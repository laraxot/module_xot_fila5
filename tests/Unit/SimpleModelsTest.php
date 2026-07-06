<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Modules\Xot\Database\Factories\ModuleFactory;
use Modules\Xot\Models\Module;
use PHPUnit\Framework\Assert;
uses(Modules\Xot\Tests\TestCase::class);

it('can create a test module', function () {
    $module = Module::factory()->create([
        'name' => 'TestModule',
        'enabled' => true,
    ]);

    expect($module)->toBeInstanceOf(Module::class);
    expect($module->name)->toBe('TestModule');
    expect($module->enabled)->toBeTrue();
});

it('can run migrations', function () {
    $this->artisan('migrate', ['--env' => 'testing', '--force' => true]);
});
