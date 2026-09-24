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
<<<<<<< .merge_file_jYedXr
<<<<<<< HEAD
<<<<<<< HEAD
 * @property Model|null $model
=======
 * @property Model|null  $model
>>>>>>> laraxot/dev
=======
 * @property Model|null  $model
>>>>>>> 3792da0d (Check & fix styling)
=======
 * @property Model|null $model
>>>>>>> .merge_file_esL0Ch
 * @property object|null $service
 * @property string|null $tempDir
 * @property object|null $record
 * @property object|null $transition
 * @property object|null $resource
<<<<<<< .merge_file_jYedXr
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_esL0Ch
 * @property Model|null $testModel
 * @property object|null $extraClass
 * @property Model|null $baseModel
 * @property string|null $testDir
 * @property mixed $saved
 * @property mixed $extra_attributes
<<<<<<< .merge_file_jYedXr
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
 * @property Model|null  $testModel
 * @property object|null $extraClass
 * @property Model|null  $baseModel
 * @property string|null $testDir
 * @property mixed       $saved
 * @property mixed       $extra_attributes
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_esL0Ch
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

    /** @var list<string> */
    protected $connectionsToTransact = ['sqlite', 'user', 'tenant', 'xot'];

<<<<<<< .merge_file_jYedXr
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
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

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_esL0Ch
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

<<<<<<< HEAD
        $database = self::sharedSqlitePath();
=======
        $database = database_path('fixcity_data.sqlite');
>>>>>>> 3792da0d (Check & fix styling)

        /** @var array<string, array<string, mixed>> $connections */
        $connections = config('database.connections', []);

        foreach (array_keys($connections) as $connection) {
<<<<<<< .merge_file_jYedXr
<<<<<<< HEAD
<<<<<<< HEAD
            if (config("database.connections.{$connection}.driver") !== 'sqlite') {
=======
            if ('sqlite' !== config("database.connections.{$connection}.driver")) {
>>>>>>> laraxot/dev
=======
            if ('sqlite' !== config("database.connections.{$connection}.driver")) {
>>>>>>> 3792da0d (Check & fix styling)
=======
            if (config("database.connections.{$connection}.driver") !== 'sqlite') {
>>>>>>> .merge_file_esL0Ch
                continue;
            }

            $this->app['config']->set("database.connections.{$connection}.database", $database);
            DB::purge($connection);
        }
    }

    /**
     * @template T of object
     *
<<<<<<< .merge_file_jYedXr
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<T>  $class
=======
     * @param class-string<T> $class
     *
>>>>>>> laraxot/dev
=======
     * @param class-string<T> $class
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  class-string<T>  $class
>>>>>>> .merge_file_esL0Ch
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
<<<<<<< .merge_file_jYedXr
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<T>  $abstract
     * @param  (\Closure(MockInterface&T): void)|null  $callback
=======
     * @param class-string<T>                        $abstract
     * @param (\Closure(MockInterface&T): void)|null $callback
     *
>>>>>>> laraxot/dev
=======
     * @param class-string<T>                        $abstract
     * @param (\Closure(MockInterface&T): void)|null $callback
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  class-string<T>  $abstract
     * @param  (\Closure(MockInterface&T): void)|null  $callback
>>>>>>> .merge_file_esL0Ch
     * @return MockInterface&T
     */
    public function mockService(string $abstract, ?\Closure $callback = null): MockInterface
    {
        /** @var MockInterface&T $mock */
        $mock = $this->mock($abstract, $callback);

        return $mock;
    }

    /**
<<<<<<< .merge_file_jYedXr
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<\Throwable>  $exception
=======
     * @param class-string<\Throwable> $exception
>>>>>>> laraxot/dev
=======
     * @param class-string<\Throwable> $exception
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  class-string<\Throwable>  $exception
>>>>>>> .merge_file_esL0Ch
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
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< .merge_file_jYedXr
<<<<<<< HEAD
<<<<<<< HEAD
            if ($file === '.' || $file === '..') {
=======
            if ('.' === $file || '..' === $file) {
>>>>>>> laraxot/dev
=======
            if ('.' === $file || '..' === $file) {
>>>>>>> 3792da0d (Check & fix styling)
=======
            if ($file === '.' || $file === '..') {
>>>>>>> .merge_file_esL0Ch
                continue;
            }

            $path = $dir.'/'.$file;
            if (is_dir($path) && ! is_link($path)) {
                $this->rrmdir($path);
<<<<<<< HEAD

=======
>>>>>>> 3792da0d (Check & fix styling)
                continue;
            }

            unlink($path);
        }

        rmdir($dir);
    }
}
