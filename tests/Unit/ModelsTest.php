<?php

declare(strict_types=1);

uses(\Modules\Xot\Tests\TestCase::class);
use Modules\Tenant\Database\Factories\TenantFactory;
use Modules\Tenant\Models\Tenant;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use Modules\Xot\Database\Factories\ModuleFactory;
use Modules\Xot\Models\Module;
use PHPUnit\Framework\Assert;

it('can create a test user', function () {
    $user = UserFactory::new()->createOne([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    Assert::assertInstanceOf(User::class, $user);
    Assert::assertSame('Test User', $user->name);
    Assert::assertSame('test@example.com', $user->email);
});

it('can create a test tenant', function () {
    $tenant = TenantFactory::new()->createOne([
        'name' => 'Test Tenant',
        'domain' => 'test.example.com',
    ]);

    Assert::assertInstanceOf(Tenant::class, $tenant);
    Assert::assertSame('Test Tenant', $tenant->name);
    Assert::assertSame('test.example.com', $tenant->domain);
});

it('can create a test module', function () {
    $module = ModuleFactory::new()->createOne([
        'name' => 'TestModule',
        'enabled' => true,
    ]);

    Assert::assertInstanceOf(Module::class, $module);
    Assert::assertSame('TestModule', $module->name);
    Assert::assertTrue((bool) $module->enabled);
});
