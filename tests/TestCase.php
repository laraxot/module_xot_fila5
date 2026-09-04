<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;
use Mockery;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\MockObject\MockObject;

use function Safe\rmdir;
use function Safe\scandir;
use function Safe\unlink;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // use DatabaseMigrations;

    // =============================================================================
    // SHARED TEST HELPER FUNCTIONS (DRY Pattern)
    // =============================================================================
    // Queste funzioni erano duplicate in molti file di test
    // Centralizzate qui per manutenibilità e coerenza
    // =============================================================================

    /**
     * Generate a unique email for testing to prevent database conflicts.
     */
    protected static function generateUniqueEmail(): string
    {
        $faker = fake();

        return $faker->unique()->safeEmail();
    }

    /**
     * Get the configured User class via XotData (correct architecture pattern).
     *
     * @return class-string<Model&UserContract>
     */
    protected static function getUserClass(): string
    {
        return XotData::make()->getUserClass();
    }

    /**
     * @template T of object
     *
     * @param  class-string<T>  $class
     * @return MockObject&T
     */
    protected function createUnitMock(string $class): MockObject
    {
        return $this->createMock($class);
    }

    public function expectThrowableMessage(string $message): void
    {
        $this->expectExceptionMessageMatches('/'.preg_quote($message, '/').'/');
    }

    protected function bindInstance(string $abstract, object $instance): void
    {
        app()->instance($abstract, $instance);
    }

    protected function rrmdir(string $dir): void
    {
        if (! is_dir($dir)) {
            return;
        }

        /** @var list<string> $objects */
        $objects = scandir($dir);

        foreach ($objects as $object) {
            if ($object === '.' || $object === '..') {
                continue;
            }

            $path = $dir.DIRECTORY_SEPARATOR.$object;

            if (is_dir($path) && ! is_link($path)) {
                $this->rrmdir($path);
            } else {
                unlink($path);
            }
        }

        rmdir($dir);
    }

    /**
     * Create a test user via XotData pattern with proper architecture.
     *
     * @param  array<string, mixed>  $attributes
     */
    protected static function createTestUser(array $attributes = []): UserContract
    {
        $defaultData = [
            'email' => static::generateUniqueEmail(),
            'password' => Hash::make('password123'),
            'name' => fake()->name(),
        ];

        $userData = array_merge($defaultData, $attributes);

        /** @var Factory<Model&UserContract> $factory */
        $factory = UserFactory::new();
        /** @var UserContract&Model $user */
        $user = $factory->create($userData);

        return $user;
    }

    /**
     * Mock XotData for widget testing (Gold Standard Pattern).
     *
     * Prevents "Class not found" errors and provides consistent behavior
     * across all widget tests.
     */
    protected static function mockXotData(): void
    {
        $mockXotData = Mockery::mock(XotData::class)->makePartial();

        // Mock dei metodi critici con fallback sicuri
        $mockXotData->shouldReceive('getUserClass')->andReturn(User::class);

        $mockXotData
            ->shouldReceive('getUserResourceClassByType')
            ->with('patient')
            ->andReturn('\\Modules\\User\\Filament\\Resources\\PatientResource');

        $mockXotData
            ->shouldReceive('getUserResourceClassByType')
            ->with('doctor')
            ->andReturn('\\Modules\\User\\Filament\\Resources\\DoctorResource');

        $mockXotData
            ->shouldReceive('getUserResourceClassByType')
            ->with(Mockery::any())
            ->andReturn('\\Modules\\User\\Filament\\Resources\\UserResource');

        $mockXotData->shouldReceive('make')->andReturn($mockXotData);

        // ✅ CRITICO: Bind nel container per risoluzione automatica
        app()->instance(XotData::class, $mockXotData);
    }

    /**
     * Create test user with specific type for multi-type testing.
     *
     * @param  array<string, mixed>  $attributes
     */
    protected static function createTestUserWithType(string $type, array $attributes = []): UserContract
    {
        $attributes['type'] = $type;

        return static::createTestUser($attributes);
    }

    /**
     * Generate test data array with common fields.
     *
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    protected static function generateTestData(array $overrides = []): array
    {
        $defaultData = [
            'name' => fake()->name(),
            'email' => static::generateUniqueEmail(),
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        return array_merge($defaultData, $overrides);
    }

    /**
     * Assert that user is authenticated with correct type.
     */
    protected function assertUserAuthenticated(?string $expectedType = null): void
    {
        $this->assertAuthenticated();

        if ($expectedType !== null) {
            /** @var UserContract|null $user */
            $user = auth()->user();
            $this->assertNotNull($user);

            if ($user && method_exists($user, 'type')) {
                $this->assertEquals($expectedType, $user->type ?? null);
            }
        }
    }
}
