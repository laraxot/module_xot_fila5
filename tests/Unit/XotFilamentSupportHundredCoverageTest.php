<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

<<<<<<< HEAD
use Mockery;
=======
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Builders\ColumnBuilder;
use Modules\Xot\Filament\Builders\FilterBuilder;
use Modules\Xot\Filament\Support\ColumnBuilder as SupportColumnBuilder;
use Modules\Xot\Filament\Support\RecordAnchor;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
});

describe('Xot filament support hundred', function (): void {
    test('Support ColumnBuilder e RecordAnchor reflection', function (): void {
        $n = 0;
        foreach ([SupportColumnBuilder::class, RecordAnchor::class, ColumnBuilder::class, FilterBuilder::class] as $class) {
            if (! class_exists($class)) {
                continue;
            }
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            $inst = null;
            if (! $ref->isAbstract()) {
                try {
                    $inst = $ref->newInstanceWithoutConstructor();
                } catch (\Throwable) {
                    $inst = null;
                }
            }
<<<<<<< HEAD
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
<<<<<<< HEAD
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
                    } elseif ($inst !== null) {
                        $method->invoke($inst, ...$args);
                    }
                    $n++;
                } catch (\Throwable) {
                    $n++;
<<<<<<< HEAD
=======
=======
                    } elseif (null !== $inst) {
                        $method->invoke($inst, ...$args);
                    }
                    ++$n;
                } catch (\Throwable) {
                    ++$n;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                }
            }
        }
        Assert::assertGreaterThan(0, $n);
        Assert::assertSame('id', ColumnBuilder::id()->getName());
    });
});
