<?php

declare(strict_types=1);
<<<<<<< HEAD
use Illuminate\Support\Facades\Artisan;
use Modules\Xot\Database\Factories\ModuleFactory;
use Modules\Xot\Models\Module;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======

uses(Modules\Xot\Tests\TestCase::class);
use Illuminate\Support\Facades\Artisan;
use Modules\Xot\Database\Factories\ModuleFactory;
use Modules\Xot\Models\Module;
use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
it('can create a test module', function () {
    $module = ModuleFactory::new()->createOne([
        'name' => 'TestModule',
        'enabled' => true,
    ]);

    Assert::assertInstanceOf(Module::class, $module);
    Assert::assertSame('TestModule', $module->name);
    Assert::assertTrue((bool) $module->enabled);
});

it('can run migrations', function () {
    Artisan::call('migrate', ['--env' => 'testing', '--force' => true]);
});
