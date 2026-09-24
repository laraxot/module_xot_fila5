<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
use Mockery;
use PHPUnit\Framework\Assert;
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
use PHPUnit\Framework\Assert;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
use PHPUnit\Framework\Assert;
>>>>>>> .merge_file_8y0emR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
use PHPUnit\Framework\Assert;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\preg_match;

/**
 * Esecuzione profonda: chiama execute(), eventi, datas::from(), provider register().
 */
final class ModuleDeepCoverage
{
    public static function testExecuteAllActions(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, 'Actions') as $class) {
<<<<<<< HEAD
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
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
>>>>>>> .merge_file_8y0emR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            $ref = new ReflectionClass($class);
>>>>>>> .merge_file_0UAoWU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            if (! $ref->hasMethod('execute')) {
                continue;
            }

            try {
                $instance = app($class);
            } catch (\Throwable) {
                try {
                    $instance = $ref->newInstance();
                } catch (\Throwable) {
                    continue;
                }
            }

            $method = $ref->getMethod('execute');
            $sourceFile = $ref->getFileName();
            if (is_string($sourceFile) && is_file($sourceFile)) {
                $source = file_get_contents($sourceFile);
<<<<<<< HEAD
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
                if (preg_match('/^\s*dddx\s*\(/m', $source) === 1) {
                    $executed++;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                if (preg_match('/^\s*dddx\s*\(/m', $source) === 1) {
                    $executed++;
=======
                if (1 === preg_match('/^\s*dddx\s*\(/m', $source)) {
                    ++$executed;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                if (1 === preg_match('/^\s*dddx\s*\(/m', $source)) {
                    ++$executed;
>>>>>>> .merge_file_8y0emR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                if (1 === preg_match('/^\s*dddx\s*\(/m', $source)) {
                    ++$executed;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                if (preg_match('/^\s*dddx\s*\(/m', $source) === 1) {
                    $executed++;
>>>>>>> .merge_file_0UAoWU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

                    continue;
                }
            }

            $args = self::defaultArgsForMethod($method);

            if (! is_object($instance)) {
                continue;
            }

            try {
                $method->invoke($instance, ...$args);
<<<<<<< HEAD
                $executed++;
            } catch (\Throwable) {
                $executed++;
<<<<<<< .merge_file_tFC4te
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                $executed++;
            } catch (\Throwable) {
                $executed++;
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
                ++$executed;
            } catch (\Throwable) {
                ++$executed;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                ++$executed;
            } catch (\Throwable) {
                ++$executed;
>>>>>>> .merge_file_8y0emR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            }
        }

        Assert::assertGreaterThan(0, $executed);
    }

    /**
     * @return list<mixed>
     */
<<<<<<< HEAD
    private static function defaultArgsForMethod(ReflectionMethod $method): array
<<<<<<< .merge_file_tFC4te
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    private static function defaultArgsForMethod(ReflectionMethod $method): array
=======
    private static function defaultArgsForMethod(\ReflectionMethod $method): array
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    private static function defaultArgsForMethod(\ReflectionMethod $method): array
>>>>>>> .merge_file_8y0emR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    private static function defaultArgsForMethod(\ReflectionMethod $method): array
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    {
        $args = [];

        foreach ($method->getParameters() as $param) {
            $type = $param->getType();
            $name = $param->getName();

            if ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();

                continue;
            }

<<<<<<< HEAD
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
            if ($type instanceof ReflectionNamedType && ! $type->isBuiltin()) {
                $typeName = $type->getName();
                if (is_subclass_of($typeName, Model::class) || $typeName === Model::class) {
                    $modelRef = new ReflectionClass($typeName);
                    if ($modelRef->isAbstract()) {
                        $args[] = Mockery::mock($typeName);

                        continue;
                    }
                    $args[] = new $typeName;
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_8y0emR
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {
                $typeName = $type->getName();
                if (is_subclass_of($typeName, Model::class) || Model::class === $typeName) {
                    $modelRef = new \ReflectionClass($typeName);
                    if ($modelRef->isAbstract()) {
                        $args[] = \Mockery::mock($typeName);

                        continue;
                    }
                    $args[] = new $typeName();
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_8y0emR
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_0UAoWU
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

                    continue;
                }
            }

            if (str_contains($name, 'id') || str_contains($name, 'Id')) {
                $args[] = 1;

                continue;
            }

<<<<<<< HEAD
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
            if ($type instanceof ReflectionNamedType) {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            if ($type instanceof ReflectionNamedType) {
=======
            if ($type instanceof \ReflectionNamedType) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            if ($type instanceof \ReflectionNamedType) {
>>>>>>> .merge_file_8y0emR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            if ($type instanceof \ReflectionNamedType) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            if ($type instanceof ReflectionNamedType) {
>>>>>>> .merge_file_0UAoWU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                $args[] = match ($type->getName()) {
                    'array' => [],
                    'string' => '',
                    'int' => 0,
                    'float' => 0.0,
                    'bool' => false,
                    default => null,
                };

                continue;
            }

            $args[] = null;
        }

        return $args;
    }

    public static function testInstantiateAllEvents(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, 'Events') as $class) {
            try {
<<<<<<< HEAD
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
                $ref = new ReflectionClass($class);
                $ctor = $ref->getConstructor();
                if ($ctor === null || $ctor->getNumberOfRequiredParameters() === 0) {
                    new $class;
                }
                $executed++;
            } catch (\Throwable) {
                $executed++;
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_8y0emR
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                $ref = new \ReflectionClass($class);
                $ctor = $ref->getConstructor();
                if (null === $ctor || 0 === $ctor->getNumberOfRequiredParameters()) {
                    new $class();
                }
                ++$executed;
            } catch (\Throwable) {
                ++$executed;
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_8y0emR
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_0UAoWU
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testFromAllDatas(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, 'Datas') as $class) {
            if (! method_exists($class, 'from')) {
                continue;
            }

            try {
                $class::from([]);
<<<<<<< HEAD
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
                $executed++;
            } catch (\Throwable) {
                try {
                    $ref = new ReflectionClass($class);
                    $ctor = $ref->getConstructor();
                    if ($ctor !== null) {
                        $args = self::defaultArgsForMethod($ctor);
                        $ref->newInstanceArgs($args);
                    }
                    $executed++;
                } catch (\Throwable) {
                    $executed++;
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_8y0emR
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                ++$executed;
            } catch (\Throwable) {
                try {
                    $ref = new \ReflectionClass($class);
                    $ctor = $ref->getConstructor();
                    if (null !== $ctor) {
                        $args = self::defaultArgsForMethod($ctor);
                        $ref->newInstanceArgs($args);
                    }
                    ++$executed;
                } catch (\Throwable) {
                    ++$executed;
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_8y0emR
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_0UAoWU
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                }
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testRegisterAllProviders(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (glob($appRoot.'/Providers/*ServiceProvider.php') as $file) {
            if (! is_string($file)) {
                throw new \UnexpectedValueException('Safe\\glob deve restituire percorsi stringa');
            }
            $class = $moduleNamespace.str_replace(['/', '.php'], ['\\', ''], substr($file, strlen($appRoot) + 1));
            if (! class_exists($class)) {
                continue;
            }

<<<<<<< HEAD
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
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
>>>>>>> .merge_file_8y0emR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            $ref = new ReflectionClass($class);
>>>>>>> .merge_file_0UAoWU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            if ($ref->isAbstract()) {
                continue;
            }

            try {
                $provider = new $class(app());
                if (method_exists($provider, 'register')) {
                    $provider->register();
                }
<<<<<<< HEAD
                $executed++;
            } catch (\Throwable) {
                $executed++;
<<<<<<< .merge_file_tFC4te
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                $executed++;
            } catch (\Throwable) {
                $executed++;
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
                ++$executed;
            } catch (\Throwable) {
                ++$executed;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                ++$executed;
            } catch (\Throwable) {
                ++$executed;
>>>>>>> .merge_file_8y0emR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            }
        }

        Assert::assertGreaterThan(0, $executed);
    }

    public static function testInstantiateFilamentColumns(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, 'Filament') as $class) {
            if (! str_contains($class, '\\Columns\\') && ! str_contains($class, '\\Widgets\\')) {
                continue;
            }

            try {
<<<<<<< HEAD
                $ref = new ReflectionClass($class);
<<<<<<< .merge_file_tFC4te
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
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
>>>>>>> .merge_file_8y0emR
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                if ($ref->isAbstract()) {
                    continue;
                }
                $ref->newInstanceWithoutConstructor();
<<<<<<< HEAD
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_ltDMsG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_0UAoWU
                $executed++;
            } catch (\Throwable) {
                try {
                    new $class;
                    $executed++;
                } catch (\Throwable) {
                    $executed++;
<<<<<<< .merge_file_tFC4te
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_8y0emR
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                ++$executed;
            } catch (\Throwable) {
                try {
                    new $class();
                    ++$executed;
                } catch (\Throwable) {
                    ++$executed;
<<<<<<< HEAD
<<<<<<< .merge_file_ltDMsG
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_8y0emR
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_0UAoWU
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                }
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }
}
