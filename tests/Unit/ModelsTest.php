<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Xot\Tests\Unit;

=======
uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 64619e34 (.)
use Modules\Tenant\Database\Factories\TenantFactory;
use Modules\Tenant\Models\Tenant;
use Modules\UI\Models\Asset;
use Modules\User\Models\User;
use Modules\Xot\Models\Module;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======
use PHPUnit\Framework\Assert;
>>>>>>> 64619e34 (.)

it('can create a test user', function () {
    $user = User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    expect($user)->toBeInstanceOf(User::class);
    expect($user->name)->toBe('Test User');
    expect($user->email)->toBe('test@example.com');
});

it('can create a test tenant', function () {
    $tenant = Tenant::factory()->create([
        'name' => 'Test Tenant',
        'domain' => 'test.example.com',
    ]);

    expect($tenant)->toBeInstanceOf(Tenant::class);
    expect($tenant->name)->toBe('Test Tenant');
    expect($tenant->domain)->toBe('test.example.com');
});

it('can resolve a sushi module row', function () {
<<<<<<< HEAD
=======
    /** @var Modules\Xot\Tests\TestCase $this */
>>>>>>> 64619e34 (.)
    $module = Module::query()->first();

    if (null === $module) {
        $this->markTestSkipped('No nwidart modules registered in test runtime.');
    }

    Assert::assertInstanceOf(Module::class, $module);
    Assert::assertNotEmpty($module->name);
});
