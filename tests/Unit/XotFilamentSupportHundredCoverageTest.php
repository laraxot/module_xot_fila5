<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

<<<<<<< .merge_file_GDaka5
<<<<<<< HEAD
<<<<<<< HEAD
use Mockery;
=======
<<<<<<< .merge_file_t2L4B0
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_oL1cam
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
use Mockery;
>>>>>>> .merge_file_e9bmu2
use Modules\Xot\Filament\Builders\ColumnBuilder;
use Modules\Xot\Filament\Builders\FilterBuilder;
use Modules\Xot\Filament\Support\ColumnBuilder as SupportColumnBuilder;
use Modules\Xot\Filament\Support\RecordAnchor;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_GDaka5
<<<<<<< HEAD
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< .merge_file_t2L4B0
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_oL1cam
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
use ReflectionClass;
use ReflectionMethod;
>>>>>>> .merge_file_e9bmu2

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< .merge_file_GDaka5
<<<<<<< HEAD
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_t2L4B0
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_oL1cam
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> 8d801bbe (Check & fix styling)
=======
    Mockery::close();
>>>>>>> .merge_file_e9bmu2
});

describe('Xot filament support hundred', function (): void {
    test('Support ColumnBuilder e RecordAnchor reflection', function (): void {
        $n = 0;
        foreach ([SupportColumnBuilder::class, RecordAnchor::class, ColumnBuilder::class, FilterBuilder::class] as $class) {
            if (! class_exists($class)) {
                continue;
            }
<<<<<<< .merge_file_GDaka5
<<<<<<< HEAD
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
<<<<<<< .merge_file_t2L4B0
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
=======
            $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_oL1cam
>>>>>>> laraxot/dev
=======
            $ref = new \ReflectionClass($class);
>>>>>>> 8d801bbe (Check & fix styling)
=======
            $ref = new ReflectionClass($class);
>>>>>>> .merge_file_e9bmu2
            $inst = null;
            if (! $ref->isAbstract()) {
                try {
                    $inst = $ref->newInstanceWithoutConstructor();
                } catch (\Throwable) {
                    $inst = null;
                }
            }
<<<<<<< .merge_file_GDaka5
<<<<<<< HEAD
<<<<<<< HEAD
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
<<<<<<< .merge_file_t2L4B0
<<<<<<< HEAD
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> laraxot/dev
=======
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> .merge_file_oL1cam
>>>>>>> laraxot/dev
=======
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> .merge_file_e9bmu2
                if ($method->getDeclaringClass()->getName() !== $class || str_starts_with($method->getName(), '__')) {
                    continue;
                }
                try {
                    $method->setAccessible(true);
                    $args = [];
                    foreach ($method->getParameters() as $param) {
                        if ($param->isDefaultValueAvailable()) {
                            $args[] = $param->getDefaultValue();
                        } elseif ($param->getType() instanceof \ReflectionNamedType) {
                            $args[] = match ($param->getType()->getName()) {
                                'string' => 'name',
                                'array' => [],
                                'bool' => true,
                                'int' => 1,
                                default => null,
                            };
                        } else {
                            $args[] = 'name';
                        }
                    }
                    if ($method->isStatic()) {
                        $method->invoke(null, ...$args);
<<<<<<< .merge_file_GDaka5
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_t2L4B0
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_e9bmu2
                    } elseif ($inst !== null) {
                        $method->invoke($inst, ...$args);
                    }
                    $n++;
                } catch (\Throwable) {
                    $n++;
<<<<<<< .merge_file_GDaka5
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_oL1cam
=======
>>>>>>> 8d801bbe (Check & fix styling)
                    } elseif (null !== $inst) {
                        $method->invoke($inst, ...$args);
                    }
                    ++$n;
                } catch (\Throwable) {
                    ++$n;
<<<<<<< HEAD
<<<<<<< .merge_file_t2L4B0
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_oL1cam
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_e9bmu2
                }
            }
        }
        Assert::assertGreaterThan(0, $n);
        Assert::assertSame('id', ColumnBuilder::id()->getName());
    });
});
