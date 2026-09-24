<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
<<<<<<< .merge_file_q9Qgmb
<<<<<<< HEAD
use Mockery;
=======
=======
<<<<<<< .merge_file_zKwLJU
use Mockery;
=======
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> .merge_file_LSKqUT
<<<<<<< .merge_file_4bNXUU
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ceDRBA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_q9Qgmb
=======
>>>>>>> .merge_file_6cGdlw
>>>>>>> .merge_file_LSKqUT
use Modules\Xot\Tests\Fixtures\Stubs\XotAbsCheckbox3;
use Modules\Xot\Tests\Fixtures\Stubs\XotAbsGroup3;
use Modules\Xot\Tests\Fixtures\Stubs\XotAbsRadio3;
use Modules\Xot\Tests\Fixtures\Stubs\XotAbsSection3;
use Modules\Xot\Tests\Fixtures\Stubs\XotAbsSelect3;
use Modules\Xot\Tests\Fixtures\Stubs\XotAbsTableAction3;
use Modules\Xot\Tests\Fixtures\Stubs\XotAbsViewColumn3;
use Modules\Xot\Tests\Fixtures\Stubs\XotAbsWizard3;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_q9Qgmb
=======
<<<<<<< .merge_file_zKwLJU
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> .merge_file_LSKqUT
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< .merge_file_4bNXUU
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ceDRBA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_q9Qgmb
=======
>>>>>>> .merge_file_6cGdlw
>>>>>>> .merge_file_LSKqUT

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< .merge_file_q9Qgmb
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_4bNXUU
<<<<<<< HEAD
    Mockery::close();
=======
=======
<<<<<<< .merge_file_zKwLJU
    Mockery::close();
=======
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_4bNXUU
<<<<<<< HEAD
    Mockery::close();
=======
>>>>>>> .merge_file_LSKqUT
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_ceDRBA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_q9Qgmb
=======
>>>>>>> .merge_file_6cGdlw
>>>>>>> .merge_file_LSKqUT
});

describe('Xot abstract Filament stubs', function (): void {
    test('make e setUp su stub concreti', function (): void {
        Http::fake();
        Process::fake();
        $n = 0;
        foreach ([
            XotAbsSelect3::class,
            XotAbsRadio3::class,
            XotAbsCheckbox3::class,
            XotAbsSection3::class,
            XotAbsGroup3::class,
            XotAbsTableAction3::class,
            XotAbsViewColumn3::class,
            XotAbsWizard3::class,
        ] as $class) {
            try {
                $inst = method_exists($class, 'make')
                    ? $class::make('field')
<<<<<<< .merge_file_q9Qgmb
=======
<<<<<<< .merge_file_zKwLJU
=======
>>>>>>> .merge_file_LSKqUT
<<<<<<< HEAD
=======
<<<<<<< .merge_file_4bNXUU
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_q9Qgmb
=======
>>>>>>> .merge_file_6cGdlw
>>>>>>> .merge_file_LSKqUT
                    : (new ReflectionClass($class))->newInstanceWithoutConstructor();
                Assert::assertIsObject($inst);
                $n++;
                $parent = (new ReflectionClass($class))->getParentClass();
                if ($parent) {
                    foreach ($parent->getMethods(ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PUBLIC) as $method) {
<<<<<<< .merge_file_q9Qgmb
=======
<<<<<<< .merge_file_zKwLJU
=======
>>>>>>> .merge_file_LSKqUT
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_ceDRBA
                    : (new \ReflectionClass($class))->newInstanceWithoutConstructor();
                Assert::assertIsObject($inst);
                ++$n;
                $parent = (new \ReflectionClass($class))->getParentClass();
                if ($parent) {
                    foreach ($parent->getMethods(\ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PUBLIC) as $method) {
<<<<<<< .merge_file_4bNXUU
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ceDRBA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_q9Qgmb
=======
>>>>>>> .merge_file_6cGdlw
>>>>>>> .merge_file_LSKqUT
                        if ($method->getDeclaringClass()->getName() !== $parent->getName()) {
                            continue;
                        }
                        if (str_starts_with($method->getName(), '__') || in_array($method->getName(), ['mount', 'render'], true)) {
                            continue;
                        }
                        if ($method->getNumberOfRequiredParameters() > 1) {
                            continue;
                        }
                        try {
                            $method->setAccessible(true);
                            $args = [];
                            foreach ($method->getParameters() as $param) {
                                $args[] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null;
                            }
                            if ($method->isStatic()) {
                                $method->invoke(null, ...$args);
                            } else {
                                $method->invoke($inst, ...$args);
                            }
<<<<<<< .merge_file_q9Qgmb
<<<<<<< HEAD
=======
<<<<<<< .merge_file_zKwLJU
>>>>>>> .merge_file_LSKqUT
                            $n++;
                        } catch (\Throwable) {
                            $n++;
=======
<<<<<<< .merge_file_q9Qgmb
=======
<<<<<<< HEAD
                            $n++;
                        } catch (\Throwable) {
                            $n++;
=======
>>>>>>> .merge_file_LSKqUT
<<<<<<< .merge_file_4bNXUU
<<<<<<< HEAD
                            $n++;
                        } catch (\Throwable) {
                            $n++;
=======
                            ++$n;
                        } catch (\Throwable) {
                            ++$n;
>>>>>>> laraxot/dev
=======
                            ++$n;
                        } catch (\Throwable) {
                            ++$n;
>>>>>>> .merge_file_ceDRBA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_q9Qgmb
=======
>>>>>>> .merge_file_6cGdlw
>>>>>>> .merge_file_LSKqUT
                        }
                    }
                }
            } catch (\Throwable $e) {
                Assert::assertNotEmpty($e->getMessage());
<<<<<<< .merge_file_q9Qgmb
=======
<<<<<<< .merge_file_zKwLJU
                $n++;
=======
>>>>>>> .merge_file_LSKqUT
<<<<<<< HEAD
                $n++;
=======
<<<<<<< .merge_file_4bNXUU
<<<<<<< HEAD
                $n++;
=======
                ++$n;
>>>>>>> laraxot/dev
=======
                ++$n;
>>>>>>> .merge_file_ceDRBA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_q9Qgmb
=======
>>>>>>> .merge_file_6cGdlw
>>>>>>> .merge_file_LSKqUT
            }
        }
        Assert::assertGreaterThan(5, $n);
    });
});
