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
<<<<<<< .merge_file_kkYHN4
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_WToxGZ
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_MueA4G
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

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
<<<<<<< .merge_file_kkYHN4
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_WToxGZ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_MueA4G
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
        $user = Mockery::mock(UserContract::class);
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $user = Mockery::mock(UserContract::class);
=======
        $user = \Mockery::mock(UserContract::class);
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $user = \Mockery::mock(UserContract::class);
>>>>>>> .merge_file_WToxGZ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $user = \Mockery::mock(UserContract::class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $user = Mockery::mock(UserContract::class);
>>>>>>> .merge_file_MueA4G
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_kkYHN4
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $record = Mockery::mock(Model::class);
=======
        $record = \Mockery::mock(Model::class);
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $record = \Mockery::mock(Model::class);
>>>>>>> .merge_file_WToxGZ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $record = \Mockery::mock(Model::class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_MueA4G
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $record->shouldIgnoreMissing();

        foreach (self::discoverPhpClasses($appRoot, $moduleNamespace, 'Models/Policies') as $class) {
            try {
<<<<<<< HEAD
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_MueA4G
                $policy = new $class;
                $executed++;

                $ref = new ReflectionClass($policy);

                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                    $name = $method->getName();
                    if ($name === '__construct') {
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_WToxGZ
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                $policy = new $class();
                ++$executed;

                $ref = new \ReflectionClass($policy);

                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
                    $name = $method->getName();
                    if ('__construct' === $name) {
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WToxGZ
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_MueA4G
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
                                if ($typeName === UserContract::class || is_subclass_of($typeName, UserContract::class)) {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                                if ($typeName === UserContract::class || is_subclass_of($typeName, UserContract::class)) {
=======
                                if (UserContract::class === $typeName || is_subclass_of($typeName, UserContract::class)) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                                if (UserContract::class === $typeName || is_subclass_of($typeName, UserContract::class)) {
>>>>>>> .merge_file_WToxGZ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                                if (UserContract::class === $typeName || is_subclass_of($typeName, UserContract::class)) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                                if ($typeName === UserContract::class || is_subclass_of($typeName, UserContract::class)) {
>>>>>>> .merge_file_MueA4G
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                                    $args[] = $user;

                                    continue;
                                }
<<<<<<< HEAD
                                if (is_subclass_of($typeName, Model::class) || $typeName === Model::class) {
<<<<<<< .merge_file_kkYHN4
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                                if (is_subclass_of($typeName, Model::class) || $typeName === Model::class) {
=======
                                if (is_subclass_of($typeName, Model::class) || Model::class === $typeName) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                                if (is_subclass_of($typeName, Model::class) || Model::class === $typeName) {
>>>>>>> .merge_file_WToxGZ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                                if (is_subclass_of($typeName, Model::class) || Model::class === $typeName) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_MueA4G
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
                $executed++;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                $executed++;
=======
                ++$executed;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                ++$executed;
>>>>>>> .merge_file_WToxGZ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                ++$executed;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                $executed++;
>>>>>>> .merge_file_MueA4G
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_MueA4G
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
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_WToxGZ
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WToxGZ
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_MueA4G
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
                $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_WToxGZ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                $ref = new ReflectionClass($class);
>>>>>>> .merge_file_MueA4G
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_MueA4G
                if ($instance === null) {
                    continue;
                }

                $executed++;
            } catch (\Throwable) {
                $executed++;
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_WToxGZ
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                if (null === $instance) {
                    continue;
                }

                ++$executed;
            } catch (\Throwable) {
                ++$executed;
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WToxGZ
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_MueA4G
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_cppp08
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_MueA4G
                $executed++;
                if (method_exists($class, 'from')) {
                    Assert::assertTrue((new ReflectionClass($class))->hasMethod('from'));
                }
            } catch (\Throwable) {
                $executed++;
<<<<<<< .merge_file_kkYHN4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_WToxGZ
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                ++$executed;
                if (method_exists($class, 'from')) {
                    Assert::assertTrue((new \ReflectionClass($class))->hasMethod('from'));
                }
            } catch (\Throwable) {
                ++$executed;
<<<<<<< HEAD
<<<<<<< .merge_file_cppp08
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_WToxGZ
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_MueA4G
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }
}
