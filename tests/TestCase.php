<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Mockery\MockInterface;
use PHPUnit\Framework\Assert;

use function Safe\rmdir;
use function Safe\scandir;
use function Safe\unlink;

/**
 * Base test case for Xot module.
 *
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
 *
 * @property object|null $action
<<<<<<< HEAD
 * @property Model|null $model
=======
 * @property Model|null  $model
>>>>>>> 7f6cf6be (.)
 * @property object|null $service
 * @property string|null $tempDir
 * @property object|null $record
 * @property object|null $transition
 * @property object|null $resource
<<<<<<< HEAD
 * @property Model|null $testModel
 * @property object|null $extraClass
 * @property Model|null $baseModel
 * @property string|null $testDir
 * @property mixed $saved
 * @property mixed $extra_attributes
=======
 * @property Model|null  $testModel
 * @property object|null $extraClass
 * @property Model|null  $baseModel
 * @property string|null $testDir
 * @property mixed       $saved
 * @property mixed       $extra_attributes
>>>>>>> 7f6cf6be (.)
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

    /** @var list<string> */
    protected $connectionsToTransact = ['sqlite', 'user', 'tenant', 'xot'];

    public mixed $action = null;

    public mixed $model = null;

    public mixed $service = null;

    public mixed $tempDir = null;

    public mixed $record = null;

    public mixed $transition = null;

    public mixed $resource = null;

    public mixed $testModel = null;

    public mixed $extraClass = null;

    public mixed $baseModel = null;

    public ?string $testDir = null;

    public mixed $saved = null;

    public mixed $extra_attributes = null;

    /**
     * @return array<int, class-string<ServiceProvider>>
     */
    protected function getPackageProviders(Application $app): array
    {
        return parent::getPackageProviders($app);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $database = database_path('fixcity_data.sqlite');

        /** @var array<string, array<string, mixed>> $connections */
        $connections = config('database.connections', []);

        foreach (array_keys($connections) as $connection) {
<<<<<<< HEAD
            if (config("database.connections.{$connection}.driver") !== 'sqlite') {
=======
            if ('sqlite' !== config("database.connections.{$connection}.driver")) {
>>>>>>> 7f6cf6be (.)
                continue;
            }

            $this->app['config']->set("database.connections.{$connection}.database", $database);
            DB::purge($connection);
        }
    }

    /**
     * @template T of object
     *
<<<<<<< HEAD
     * @param  class-string<T>  $class
=======
     * @param class-string<T> $class
     *
>>>>>>> 7f6cf6be (.)
     * @return T
     */
    public function getAction(string $class): object
    {
        Assert::assertInstanceOf($class, $this->action);

        /** @var T $action */
        $action = $this->action;

        return $action;
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
>>>>>>> 7f6cf6be (.)
     * @return MockInterface&T
     */
    public function mockService(string $abstract, ?\Closure $callback = null): MockInterface
    {
        /** @var MockInterface&T $mock */
        $mock = $this->mock($abstract, $callback);

        return $mock;
    }

    /**
<<<<<<< HEAD
     * @param  class-string<\Throwable>  $exception
=======
     * @param class-string<\Throwable> $exception
>>>>>>> 7f6cf6be (.)
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
>>>>>>> 7f6cf6be (.)
    }

    public function expectThrowableMessageMatches(string $pattern): void
    {
        $this->expectExceptionMessageMatches($pattern);
    }

    public function failTest(string $message = ''): void
    {
        $this->fail($message);
    }

    /**
     * Recursively remove a directory and all its contents.
     */
    public function rrmdir(string $dir): void
    {
        if (! is_dir($dir)) {
            return;
        }

        /** @var array<int, string> $files */
        $files = scandir($dir);

        foreach ($files as $file) {
<<<<<<< HEAD
            if ($file === '.' || $file === '..') {
=======
            if ('.' === $file || '..' === $file) {
>>>>>>> 7f6cf6be (.)
                continue;
            }

            $path = $dir.'/'.$file;
            if (is_dir($path) && ! is_link($path)) {
                $this->rrmdir($path);
<<<<<<< HEAD

=======
>>>>>>> 7f6cf6be (.)
                continue;
            }

            unlink($path);
        }

        rmdir($dir);
    }
}
