<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
use Mockery;
use Modules\SaluteOra\Models\User;
>>>>>>> 5a14301c (.)
=======
use Mockery;
use Modules\SaluteOra\Models\User;
>>>>>>> 5a14301c (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
use Mockery;
use Modules\SaluteOra\Models\User;
>>>>>>> 53d6a6ba (.)
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    // use DatabaseMigrations;

    // SHARED TEST HELPER FUNCTIONS (DRY Pattern)
    // Queste funzioni erano duplicate in molti file di test
    // Centralizzate qui per manutenibilità e coerenza

    /**
     * Generate a unique email for testing to prevent database conflicts.
=======
=======
>>>>>>> 3fbbf1f5 (.)
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 5a14301c (.)
=======
=======
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======

>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
=======
>>>>>>> f1d4085 (.)
>>>>>>> 7131bd09 (.)
=======
=======

>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
    //use DatabaseMigrations;

    // =============================================================================
    // SHARED TEST HELPER FUNCTIONS (DRY Pattern)
    // =============================================================================
    // Queste funzioni erano duplicate in molti file di test
    // Centralizzate qui per manutenibilità e coerenza
    // =============================================================================

    /**
     * Generate a unique email for testing to prevent database conflicts.
     *
     * @return string
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
     */
    protected static function generateUniqueEmail(): string
    {
        $faker = fake();
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
        return $faker->unique()->safeEmail();
    }

    /**
     * Get the configured User class via XotData (correct architecture pattern).
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> 5a14301c (.)
=======
     *
     * @return string
>>>>>>> 5a14301c (.)
     */
    protected static function getUserClass(): string
    {
        return XotData::make()->getUserClass();
    }

    /**
     * Create a test user via XotData pattern with proper architecture.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> 5a14301c (.)
=======
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> 5a14301c (.)
=======
     * @param  array<string, mixed>  $attributes
>>>>>>> cc7fb225 (.)
     */
    protected static function createTestUser(array $attributes = []): UserContract
    {
        $userClass = static::getUserClass();
        $defaultData = [
            'email' => static::generateUniqueEmail(),
            'password' => Hash::make('password123'),
            'name' => fake()->name(),
        ];

        $userData = array_merge($defaultData, $attributes);

        /** @var UserContract&Model $user */
        $user = $userClass::factory()->create($userData);

        return $user;
    }

    /**
     * Mock XotData for widget testing (Gold Standard Pattern).
     *
     * Prevents "Class not found" errors and provides consistent behavior
     * across all widget tests.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 5a14301c (.)
=======
     *
     * @return void
>>>>>>> 5a14301c (.)
     */
    protected static function mockXotData(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $mockXotData = Mockery::mock(XotData::class)->makePartial();
=======
<<<<<<< HEAD
        $mockXotData = \Mockery::mock(XotData::class)->makePartial();
=======
        $mockXotData = Mockery::mock(XotData::class)->makePartial();
=======
        $mockXotData = \Mockery::mock(XotData::class)->makePartial();
=======
        $mockXotData = Mockery::mock(XotData::class)->makePartial();
>>>>>>> b7afadf9 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 73eab74 (.)
>>>>>>> d2b0a27 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> 6dcebf8a (.)
=======
        $mockXotData = Mockery::mock(XotData::class)->makePartial();
>>>>>>> 53d6a6ba (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> b7afadf9 (.)
=======
        $mockXotData = Mockery::mock(XotData::class)->makePartial();
>>>>>>> 71586de2 (.)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ->with(Mockery::any())
            ->andReturn('\\Modules\\User\\Filament\\Resources\\UserResource');

        $mockXotData->shouldReceive('make')->andReturn($mockXotData);

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        
        // Mock dei metodi critici con fallback sicuri
        $mockXotData->shouldReceive('getUserClass')
            ->andReturn(User::class);
            
        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with('patient')
            ->andReturn('\\Modules\\User\\Filament\\Resources\\PatientResource');
            
        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with('doctor')  
            ->andReturn('\\Modules\\User\\Filament\\Resources\\DoctorResource');
            
        $mockXotData->shouldReceive('getUserResourceClassByType')
=======
>>>>>>> 53d6a6ba (.)
            ->with(Mockery::any())
=======
            /* @phpstan-ignore-next-line method.notFound, method.nonObject */
            ->with(\Mockery::any())
            /* @phpstan-ignore-next-line method.nonObject */
>>>>>>> b7afadf9 (.)
            ->andReturn('\\Modules\\User\\Filament\\Resources\\UserResource');

        /* @phpstan-ignore-next-line method.notFound, method.nonObject */
        $mockXotData->shouldReceive('make')->andReturn($mockXotData);

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        
        // Mock dei metodi critici con fallback sicuri
        $mockXotData->shouldReceive('getUserClass')
            ->andReturn(User::class);
            
        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with('patient')
            ->andReturn('\\Modules\\User\\Filament\\Resources\\PatientResource');
            
        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with('doctor')  
            ->andReturn('\\Modules\\User\\Filament\\Resources\\DoctorResource');
            
        $mockXotData->shouldReceive('getUserResourceClassByType')
=======
>>>>>>> 71586de2 (.)
            ->with(Mockery::any())
            ->andReturn('\\Modules\\User\\Filament\\Resources\\UserResource');

        $mockXotData->shouldReceive('make')->andReturn($mockXotData);

        // ✅ CRITICO: Bind nel container per risoluzione automatica
        app()->instance(XotData::class, $mockXotData);
    }

    /**
     * Create test user with specific type for multi-type testing.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param string $type
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> 5a14301c (.)
=======
     * @param string $type
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> 5a14301c (.)
=======
     * @param  array<string, mixed>  $attributes
>>>>>>> cc7fb225 (.)
     */
    protected static function createTestUserWithType(string $type, array $attributes = []): UserContract
    {
        $attributes['type'] = $type;
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
        return static::createTestUser($attributes);
    }

    /**
     * Generate test data array with common fields.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $overrides
=======
     * @param array<string, mixed> $overrides
>>>>>>> 5a14301c (.)
=======
     * @param array<string, mixed> $overrides
>>>>>>> 5a14301c (.)
=======
     * @param  array<string, mixed>  $overrides
>>>>>>> cc7fb225 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
     */
    protected function assertUserAuthenticated(?string $expectedType = null): void
=======
=======
>>>>>>> 5a14301c (.)
     *
     * @param string|null $expectedType
     * @return void
     */
    protected function assertUserAuthenticated(null|string $expectedType = null): void
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
    {
        $this->assertAuthenticated();

        if ($expectedType !== null) {
            /** @var UserContract|null $user */
            $user = auth()->user();
<<<<<<< HEAD
<<<<<<< HEAD
            self::assertNotNull($user);

            if ($user && method_exists($user, 'type')) {
                self::assertSame($expectedType, $user->type ?? null);
=======
=======
>>>>>>> 5a14301c (.)
            $this->assertNotNull($user);

            if ($user && method_exists($user, 'type')) {
                $this->assertEquals($expectedType, $user->type ?? null);
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
            }
        }
    }
}
