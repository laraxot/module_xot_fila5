<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Mockery\MockInterface;
use Modules\User\Database\Factories\TenantFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Tenant;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Database\Factories\ModuleFactory;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Module;
use Modules\Xot\Providers\XotServiceProvider;
use PHPUnit\Framework\MockObject\MockObject;
<<<<<<< HEAD
=======
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
use Safe\Exceptions\FilesystemException;
>>>>>>> laraxot/dev

/**
 * Class XotBaseTestCase.
 *
 * Shared bootstrap base test case for module tests.
 * DatabaseTransactions belongs in each module TestCase when that module needs transactional isolation.
 *
 * @property object|null $action
<<<<<<< HEAD
 * @property Model|null $model
=======
 * @property Model|null  $model
>>>>>>> laraxot/dev
 * @property object|null $service
 * @property object|null $widget
 * @property string|null $tempDir
 * @property object|null $record
 * @property object|null $transition
 * @property object|null $resource
<<<<<<< HEAD
=======
 * @property Model|null  $testModel
 * @property object|null $extraClass
 * @property Model|null  $baseModel
 * @property string|null $testDir
 * @property string|null $workDir
 * @property mixed       $saved
 * @property mixed       $extra_attributes
>>>>>>> laraxot/dev
 * @property Model|null $testModel
 * @property object|null $extraClass
 * @property Model|null $baseModel
 * @property string|null $testDir
 * @property string|null $workDir
 * @property mixed $saved
 * @property mixed $extra_attributes
 */
abstract class XotBaseTestCase extends BaseTestCase
{
    use CreatesApplication;

    public mixed $action = null;

    public mixed $model = null;

    public mixed $service = null;

    public mixed $widget = null;

    public mixed $tempDir = null;

    public mixed $record = null;

    public mixed $transition = null;

    public mixed $resource = null;

    public mixed $testModel = null;

    public mixed $extraClass = null;

    public mixed $baseModel = null;

    public ?string $testDir = null;

    public ?string $workDir = null;

    public mixed $saved = null;

    public mixed $extra_attributes = null;

    /**
     * @param  array<string, mixed>  $data
     */
    public function assertDatabaseHasRow(string $table, array $data, ?string $connection = null): void
    {
        $this->assertDatabaseHas($table, $data, $connection);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function assertDatabaseMissingRow(string $table, array $data, ?string $connection = null): void
    {
        $this->assertDatabaseMissing($table, $data, $connection);
    }

    public function assertDatabaseCountRow(string $table, int $count, ?string $connection = null): void
    {
        $this->assertDatabaseCount($table, $count, $connection);
    }

    /**
     * @template T of object
     *
<<<<<<< HEAD
     * @param  class-string<T>  $class
=======
     * @param class-string<T> $class
     *
>>>>>>> laraxot/dev
     * @return MockObject&T
     */
    public function createUnitMock(string $class): MockObject
    {
        return $this->createMock($class);
    }

    /**
     * @template T of object
     *
<<<<<<< HEAD
     * @param  class-string<T>  $abstract
     * @param  (\Closure(MockInterface&T): void)|null  $callback
=======
     * @param class-string<T>                        $abstract
     * @param (\Closure(MockInterface&T): void)|null $callback
     *
>>>>>>> laraxot/dev
     * @return MockInterface&T
     */
    public function mockService(string $abstract, ?\Closure $callback = null): MockInterface
    {
        /** @var MockInterface&T $mock */
        $mock = $this->mock($abstract, $callback);

        return $mock;
    }

<<<<<<< HEAD
=======
    /**
     * @phpstan-ignore return.internalClass
     */
    public function expectsOnce(): InvokedCount
    {
        return $this->once();
    }

    /**
     * @phpstan-ignore return.internalClass
     */
    public function expectsExactly(int $count): InvokedCount
    {
        return $this->exactly($count);
    }

    /**
     * @phpstan-ignore return.internalClass
     */
    public function expectsAtLeastOnce(): InvokedAtLeastOnce
    {
        return $this->atLeastOnce();
    }

>>>>>>> laraxot/dev
    public function skipTest(string $message = ''): never
    {
        $this->markTestSkipped($message);
    }

    /**
     * @param  class-string<\Throwable>  $exceptionClass
     */
    public function expectApplicationException(string $exceptionClass, ?string $message = null): void
    {
        $this->expectException($exceptionClass);
<<<<<<< HEAD
        if ($message !== null) {
=======
        if (null !== $message) {
>>>>>>> laraxot/dev
            $this->expectExceptionMessageIsOrContains($message);
        }
    }

    /**
     * @return array<int, class-string<ServiceProvider>>
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
            XotServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        // Nei test non esiste una build Vite (public_html/build/manifest.json):
        // i blade con @vite renderizzano senza asset invece di lanciare ViewException.
        $this->withoutVite();

        if (! $this->app->bound('translator')) {
            $this->app->singleton('translator', function (Application $app) {
                return new Translator(
<<<<<<< HEAD
                    new ArrayLoader,
=======
                    new ArrayLoader(),
>>>>>>> laraxot/dev
                    'en'
                );
            });
        }
    }

    protected function tearDown(): void
    {
        try {
            if ($this->app instanceof Application) {
                /** @var DatabaseManager $db */
                $db = $this->app->make('db');

                /** @var array<string, mixed> $connections */
                $connections = (array) config('database.connections', []);
                foreach (array_keys($connections) as $name) {
                    $db->disconnect((string) $name);
                }

                $db->disconnect();
                $db->purge();
            }
        } catch (\Throwable) {
            // Ignore teardown disconnection issues to avoid masking test failures.
        }

        parent::tearDown();
    }

    protected static function generateUniqueEmail(): string
    {
        return 'test-'.uniqid((string) mt_rand(), true).'@example.com';
    }

    /**
     * @return class-string<Model&UserContract>
     */
    protected static function getUserClass(): string
    {
        return XotData::make()->getUserClass();
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    protected static function createTestUser(array $attributes = []): UserContract
    {
        /** @var Factory<Model&UserContract> $factory */
        $factory = UserFactory::new();
        /** @var UserContract $user */
<<<<<<< HEAD
        $user = $factory->create($attributes);
=======
        $user = $factory->createOne($attributes);
>>>>>>> laraxot/dev

        return $user;
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    protected static function createTestTenant(array $attributes = []): Tenant
    {
        /** @var Tenant $tenant */
        $tenant = TenantFactory::new()->createOne($attributes);

        return $tenant;
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    protected static function createTestModule(array $attributes = []): Module
    {
        return ModuleFactory::new()->createOne($attributes);
    }

    /**
     * Path of the shared SQLite database used by module tests.
     *
     * I moduli sono condivisi fra piu' progetti: il nome del file non puo' essere
     * cablato qui, altrimenti il framework porta con se' il nome del progetto in cui e'
     * nato. Si risolve in tre passi, dal piu' esplicito al piu' neutro:
     *
     * 1. `config('xot.testing.sqlite_file')` — il progetto dichiara il proprio file;
     * 2. l'unico `*.sqlite` presente in `database/` — il caso normale, funziona senza
     *    configurare niente e qualunque sia il nome scelto dal progetto;
     * 3. `test_data.sqlite` — default neutro quando la cartella e' vuota o ambigua.
     *
     * Single source of truth per `prepareSharedSqliteForTesting()` e per
     * `xot:build-test-sqlite`, che ha bisogno dello stesso path per costruire il file.
     */
    public static function sharedSqlitePath(): string
    {
        $configured = config('xot.testing.sqlite_file');

<<<<<<< HEAD
        if (is_string($configured) && $configured !== '') {
=======
        if (is_string($configured) && '' !== $configured) {
>>>>>>> laraxot/dev
            return database_path($configured);
        }

        try {
            /** @var list<string> $found */
            $found = \Safe\glob(database_path('*.sqlite'));
<<<<<<< HEAD
=======
        } catch (FilesystemException) {
            $found = [];
        }

        if (count($found) === 1) {
        if (1 === count($found)) {
>>>>>>> laraxot/dev
        } catch (\Safe\Exceptions\FilesystemException) {
            $found = [];
        }

        if (count($found) === 1) {
            return $found[0];
        }

        return database_path('test_data.sqlite');
    }

    /**
     * Punta ogni connessione sqlite al file condiviso e condivide un solo PDO.
     *
     * Multiple named connections (activity, user, gdpr, …) on the same SQLite file
     * each opening their own transaction causes "database is locked". Sharing the
     * primary PDO lets DatabaseTransactions roll back all module writes together.
     *
     * Call before parent::setUp() when the test case uses DatabaseTransactions.
     */
    protected function prepareSharedSqliteForTesting(): void
    {
<<<<<<< HEAD
        if ($this->app === null) {
=======
        if (null === $this->app) {
>>>>>>> laraxot/dev
            $this->refreshApplication();
        }

        $database = self::sharedSqlitePath();

        // La connessione opzionale 'user' (driver mysql) senza database configurato
        // (DB_DATABASE_USER vuoto) ripiega su sqlite condiviso: stesso fallback di
        // XotBaseMigration::resolveConnectionName(), altrimenti ogni insert su users
        // fallisce con "No database selected" sulle macchine senza il DB dedicato.
        $userDatabase = config('database.connections.user.database');
<<<<<<< HEAD
        if (! is_string($userDatabase) || $userDatabase === '') {
=======
        if (! is_string($userDatabase) || '' === $userDatabase) {
>>>>>>> laraxot/dev
            $this->app['config']->set('database.connections.user', [
                'driver' => 'sqlite',
                'database' => $database,
                'prefix' => '',
                'foreign_key_constraints' => true,
            ]);
        }

        /** @var array<string, array<string, mixed>> $connections */
        $connections = config('database.connections', []);

        /** @var list<string> $sqliteConnections */
        $sqliteConnections = [];

        foreach (array_keys($connections) as $connection) {
<<<<<<< HEAD
            if (config("database.connections.{$connection}.driver") !== 'sqlite') {
=======
            if ('sqlite' !== config("database.connections.{$connection}.driver")) {
>>>>>>> laraxot/dev
                continue;
            }

            $sqliteConnections[] = $connection;
            $this->app['config']->set("database.connections.{$connection}.database", $database);
            $this->app['config']->set("database.connections.{$connection}.busy_timeout", 10000);
        }

        foreach ($sqliteConnections as $connection) {
            DB::purge($connection);
        }

<<<<<<< HEAD
        if ($sqliteConnections === []) {
=======
        if ([] === $sqliteConnections) {
>>>>>>> laraxot/dev
            return;
        }

        $primaryName = in_array('sqlite', $sqliteConnections, true)
            ? 'sqlite'
            : $sqliteConnections[0];

        /** @var DatabaseManager $database */
        $database = $this->app->make('db');
        $primaryConnection = $database->connection($primaryName);

        $managerReflection = new \ReflectionClass($database);
        $connectionsProperty = $managerReflection->getProperty('connections');
        $connectionsProperty->setAccessible(true);

        /** @var array<string, mixed> $resolved */
        $resolved = $connectionsProperty->getValue($database);

        foreach ($sqliteConnections as $connection) {
            $resolved[$connection] = $primaryConnection;
        }

        $connectionsProperty->setValue($database, $resolved);
    }

<<<<<<< HEAD
=======
    /**
     * Legacy alias kept for module TestCases that still call the old name.
     *
     * @deprecated use {@see prepareSharedSqliteForTesting()}
     */
    protected function prepareSharedFixcitySqliteForTesting(): void
    {
        $this->prepareSharedSqliteForTesting();
    }

>>>>>>> laraxot/dev
    public function bindInstance(string $abstract, object $instance): void
    {
        $this->instance($abstract, $instance);
    }

    public function disableExceptionHandling(): void
    {
        $this->withoutExceptionHandling();
    }

    public function enableExceptionHandling(): void
    {
        $this->withExceptionHandling();
    }

    /**
     * @param  class-string<\Throwable>  $exception
     */
    public function expectThrowable(string $exception): void
    {
        $this->expectException($exception);
    }

    public function expectThrowableMessage(string $message): void
    {
        $this->expectExceptionMessageIsOrContains($message);
    }

    public function expectThrowableMessageMatches(string $pattern): void
    {
        $this->expectExceptionMessageMatches($pattern);
    }
}
