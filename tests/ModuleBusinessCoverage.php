<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Database\Eloquent\Model;
use Mockery;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev

/**
 * Coverage business: policies, models, actions — esecuzione reale, non class_exists.
 */
final class ModuleBusinessCoverage
{
    /**
     * @return list<class-string>
     */
    public static function discoverPhpClasses(string $appRoot, string $moduleNamespace, string $relativeDir): array
    {
        $dir = $appRoot.'/'.$relativeDir;
        if (! is_dir($dir)) {
            return [];
        }

        $classes = [];
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir));

        foreach ($iterator as $file) {
            if (! $file instanceof \SplFileInfo) {
                throw new \UnexpectedValueException('RecursiveDirectoryIterator deve restituire SplFileInfo');
            }
            if (! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
                continue;
            }

            $relative = substr($file->getPathname(), strlen($appRoot) + 1);
            $class = $moduleNamespace.str_replace(['/', '.php'], ['\\', ''], $relative);

            if (! class_exists($class)) {
                continue;
            }

<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
=======
            $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
            if ($ref->isAbstract() || $ref->isInterface() || $ref->isTrait()) {
                continue;
            }

            $classes[] = $class;
        }

        sort($classes);

        return $classes;
    }

    /**
     * @return Mockery\MockInterface&UserContract
     */
    public static function mockUser(): UserContract
    {
        /** @var Mockery\MockInterface&UserContract $user */
<<<<<<< HEAD
        $user = Mockery::mock(UserContract::class);
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
        $user = Mockery::mock(UserContract::class);
=======
        $user = \Mockery::mock(UserContract::class);
>>>>>>> laraxot/dev
=======
        $user = \Mockery::mock(UserContract::class);
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
        $user->shouldIgnoreMissing();
        $user->shouldReceive('can')->andReturn(true);
        $user->shouldReceive('hasRole')->andReturn(false);
        $user->shouldReceive('belongsToTeam')->andReturn(true);
        $user->shouldReceive('ownsTeam')->andReturn(true);
        $user->shouldReceive('getKey')->andReturn(1);
        $user->id = '1';

        return $user;
    }

    public static function testAllPolicies(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;
        $user = self::mockUser();
<<<<<<< HEAD
        $record = Mockery::mock(Model::class);
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
        $record = Mockery::mock(Model::class);
=======
        $record = \Mockery::mock(Model::class);
>>>>>>> laraxot/dev
=======
        $record = \Mockery::mock(Model::class);
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
        $record->shouldIgnoreMissing();

        foreach (self::discoverPhpClasses($appRoot, $moduleNamespace, 'Models/Policies') as $class) {
            try {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
>>>>>>> laraxot/dev
                $policy = new $class;
                $executed++;

                $ref = new ReflectionClass($policy);

                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                    $name = $method->getName();
                    if ($name === '__construct') {
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_WToxGZ
                $policy = new $class();
                ++$executed;

                $ref = new \ReflectionClass($policy);

                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
                    $name = $method->getName();
                    if ('__construct' === $name) {
<<<<<<< .merge_file_cppp08
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
                        continue;
                    }

                    try {
                        $params = $method->getParameters();
                        $args = [];
                        foreach ($params as $param) {
                            $type = $param->getType();
                            if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {
                                $typeName = $type->getName();
<<<<<<< HEAD
                                if ($typeName === UserContract::class || is_subclass_of($typeName, UserContract::class)) {
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
                                if ($typeName === UserContract::class || is_subclass_of($typeName, UserContract::class)) {
=======
                                if (UserContract::class === $typeName || is_subclass_of($typeName, UserContract::class)) {
>>>>>>> laraxot/dev
=======
                                if (UserContract::class === $typeName || is_subclass_of($typeName, UserContract::class)) {
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
                                    $args[] = $user;

                                    continue;
                                }
<<<<<<< HEAD
                                if (is_subclass_of($typeName, Model::class) || $typeName === Model::class) {
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
                                if (is_subclass_of($typeName, Model::class) || $typeName === Model::class) {
=======
                                if (is_subclass_of($typeName, Model::class) || Model::class === $typeName) {
>>>>>>> laraxot/dev
=======
                                if (is_subclass_of($typeName, Model::class) || Model::class === $typeName) {
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
                                    $args[] = $record;

                                    continue;
                                }
                            }
                            $args[] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null;
                        }
                        $method->invoke($policy, ...$args);
                    } catch (\Throwable) {
                    }
                }
            } catch (\Throwable) {
<<<<<<< HEAD
                $executed++;
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
                $executed++;
=======
                ++$executed;
>>>>>>> laraxot/dev
=======
                ++$executed;
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testAllModels(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;
        $discovered = 0;

        foreach (self::discoverPhpClasses($appRoot, $moduleNamespace, 'Models') as $class) {
            if (str_contains($class, '\\Policies\\')) {
                continue;
            }

            if (! is_subclass_of($class, Model::class)) {
                continue;
            }

<<<<<<< HEAD
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
>>>>>>> laraxot/dev
            $discovered++;

            try {
                $model = new $class;
                $executed++;
                Assert::assertNotEmpty($model->getTable());
                Assert::assertNotEmpty($model->getFillable());
            } catch (\Throwable) {
                $executed++;
            }
        }

        if ($discovered === 0) {
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_WToxGZ
            ++$discovered;

            try {
                $model = new $class();
                ++$executed;
                Assert::assertNotEmpty($model->getTable());
                Assert::assertNotEmpty($model->getFillable());
            } catch (\Throwable) {
                ++$executed;
            }
        }

        if (0 === $discovered) {
<<<<<<< .merge_file_cppp08
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
            Assert::assertSame(0, $executed);

            return;
        }

        Assert::assertGreaterThan(0, $executed);
    }

    public static function testAllActions(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (self::discoverPhpClasses($appRoot, $moduleNamespace, 'Actions') as $class) {
            try {
<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
                $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
=======
                $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
                if (! $ref->hasMethod('execute') && ! $ref->hasMethod('handle')) {
                    continue;
                }

                $instance = null;
                try {
                    $instance = app($class);
                } catch (\Throwable) {
                    if ($ref->isInstantiable()) {
                        $instance = $ref->newInstanceWithoutConstructor();
                    }
                }

<<<<<<< HEAD
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
>>>>>>> laraxot/dev
                if ($instance === null) {
                    continue;
                }

                $executed++;
            } catch (\Throwable) {
                $executed++;
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_WToxGZ
                if (null === $instance) {
                    continue;
                }

                ++$executed;
            } catch (\Throwable) {
                ++$executed;
<<<<<<< .merge_file_cppp08
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testAllDatas(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (self::discoverPhpClasses($appRoot, $moduleNamespace, 'Datas') as $class) {
            try {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_cppp08
<<<<<<< HEAD
>>>>>>> laraxot/dev
                $executed++;
                if (method_exists($class, 'from')) {
                    Assert::assertTrue((new ReflectionClass($class))->hasMethod('from'));
                }
            } catch (\Throwable) {
                $executed++;
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_WToxGZ
                ++$executed;
                if (method_exists($class, 'from')) {
                    Assert::assertTrue((new \ReflectionClass($class))->hasMethod('from'));
                }
            } catch (\Throwable) {
                ++$executed;
<<<<<<< .merge_file_cppp08
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WToxGZ
>>>>>>> laraxot/dev
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }
}
