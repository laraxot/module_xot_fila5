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
<<<<<<< .merge_file_ccZVNi
use Safe\Exceptions\FilesystemException;
=======
<<<<<<< HEAD
use Safe\Exceptions\FilesystemException;
=======
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xV2Tkf

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
 * @property Model|null $testModel
 * @property object|null $extraClass
 * @property Model|null $baseModel
 * @property string|null $testDir
 * @property string|null $workDir
 * @property mixed $saved
 * @property mixed $extra_attributes
=======
 * @property Model|null  $testModel
 * @property object|null $extraClass
 * @property Model|null  $baseModel
 * @property string|null $testDir
 * @property string|null $workDir
 * @property mixed       $saved
 * @property mixed       $extra_attributes
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
>>>>>>> laraxot/dev
     */
    public function assertDatabaseHasRow(string $table, array $data, ?string $connection = null): void
    {
        $this->assertDatabaseHas($table, $data, $connection);
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
     * @param  class-string<\Throwable>  $exceptionClass
=======
     * @param class-string<\Throwable> $exceptionClass
>>>>>>> laraxot/dev
     */
    public function expectApplicationException(string $exceptionClass, ?string $message = null): void
    {
        $this->expectException($exceptionClass);
<<<<<<< HEAD
        if ($message !== null) {
            $this->expectExceptionMessageIsOrContains($message);
=======
        if (null !== $message) {
            $this->expectExceptionMessage($message);
>>>>>>> laraxot/dev
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

<<<<<<< HEAD
        // Nei test non esiste una build Vite (public_html/build/manifest.json):
        // i blade con @vite renderizzano senza asset invece di lanciare ViewException.
        $this->withoutVite();

        if (! $this->app->bound('translator')) {
            $this->app->singleton('translator', function (Application $app) {
                return new Translator(
                    new ArrayLoader,
=======
        if (! $this->app->bound('translator')) {
            $this->app->singleton('translator', function ($app) {
                return new Translator(
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
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
     */
    protected static function createTestTenant(array $attributes = []): Tenant
    {
        /** @var Tenant $tenant */
        $tenant = TenantFactory::new()->createOne($attributes);

        return $tenant;
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
     */
    protected static function createTestModule(array $attributes = []): Module
    {
        return ModuleFactory::new()->createOne($attributes);
    }

    /**
<<<<<<< HEAD
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

        if (is_string($configured) && $configured !== '') {
            return database_path($configured);
        }

        try {
            /** @var list<string> $found */
            $found = \Safe\glob(database_path('*.sqlite'));
        } catch (FilesystemException) {
            $found = [];
        }

        if (count($found) === 1) {
            return $found[0];
        }

        return database_path('test_data.sqlite');
    }

    /**
     * Punta ogni connessione sqlite al file condiviso e condivide un solo PDO.
=======
     * Point every sqlite connection at fixcity_data.sqlite and share one PDO.
>>>>>>> laraxot/dev
     *
     * Multiple named connections (activity, user, gdpr, …) on the same SQLite file
     * each opening their own transaction causes "database is locked". Sharing the
     * primary PDO lets DatabaseTransactions roll back all module writes together.
     *
     * Call before parent::setUp() when the test case uses DatabaseTransactions.
     */
<<<<<<< HEAD
    protected function prepareSharedSqliteForTesting(): void
    {
        if ($this->app === null) {
            $this->refreshApplication();
        }

        $database = self::sharedSqlitePath();

        // La connessione opzionale 'user' (driver mysql) senza database configurato
        // (DB_DATABASE_USER vuoto) ripiega su sqlite condiviso: stesso fallback di
        // XotBaseMigration::resolveConnectionName(), altrimenti ogni insert su users
        // fallisce con "No database selected" sulle macchine senza il DB dedicato.
        $userDatabase = config('database.connections.user.database');
        if (! is_string($userDatabase) || $userDatabase === '') {
            $this->app['config']->set('database.connections.user', [
                'driver' => 'sqlite',
                'database' => $database,
                'prefix' => '',
                'foreign_key_constraints' => true,
            ]);
        }
=======
    protected function prepareSharedFixcitySqliteForTesting(): void
    {
        if (null === $this->app) {
            $this->refreshApplication();
        }

        $database = database_path('fixcity_data.sqlite');
>>>>>>> laraxot/dev

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
<<<<<<< HEAD
     * @param  class-string<\Throwable>  $exception
=======
     * @param class-string<\Throwable> $exception
>>>>>>> laraxot/dev
     */
    public function expectThrowable(string $exception): void
    {
        $this->expectException($exception);
    }

    public function expectThrowableMessage(string $message): void
    {
<<<<<<< HEAD
        $this->expectExceptionMessageIsOrContains($message);
=======
        $this->expectExceptionMessage($message);
>>>>>>> laraxot/dev
    }

    public function expectThrowableMessageMatches(string $pattern): void
    {
        $this->expectExceptionMessageMatches($pattern);
    }
}
