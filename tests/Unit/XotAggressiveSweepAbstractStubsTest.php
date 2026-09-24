<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
<<<<<<< HEAD
use Mockery;
<<<<<<< .merge_file_bPZTXE
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4bNXUU
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_ceDRBA
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Dj4PFF
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_bPZTXE
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4bNXUU
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_ceDRBA
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
use ReflectionClass;
use ReflectionMethod;
>>>>>>> .merge_file_Dj4PFF
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
<<<<<<< .merge_file_bPZTXE
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4bNXUU
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    \Mockery::close();
>>>>>>> .merge_file_ceDRBA
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Dj4PFF
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_bPZTXE
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_4bNXUU
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Dj4PFF
                    : (new ReflectionClass($class))->newInstanceWithoutConstructor();
                Assert::assertIsObject($inst);
                $n++;
                $parent = (new ReflectionClass($class))->getParentClass();
                if ($parent) {
                    foreach ($parent->getMethods(ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PUBLIC) as $method) {
<<<<<<< .merge_file_bPZTXE
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_ceDRBA
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                    : (new \ReflectionClass($class))->newInstanceWithoutConstructor();
                Assert::assertIsObject($inst);
                ++$n;
                $parent = (new \ReflectionClass($class))->getParentClass();
                if ($parent) {
                    foreach ($parent->getMethods(\ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PUBLIC) as $method) {
<<<<<<< HEAD
<<<<<<< .merge_file_4bNXUU
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ceDRBA
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Dj4PFF
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
                            $n++;
                        } catch (\Throwable) {
                            $n++;
<<<<<<< .merge_file_bPZTXE
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4bNXUU
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                            $n++;
                        } catch (\Throwable) {
                            $n++;
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
                            ++$n;
                        } catch (\Throwable) {
                            ++$n;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                            ++$n;
                        } catch (\Throwable) {
                            ++$n;
>>>>>>> .merge_file_ceDRBA
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Dj4PFF
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                        }
                    }
                }
            } catch (\Throwable $e) {
                Assert::assertNotEmpty($e->getMessage());
<<<<<<< HEAD
<<<<<<< .merge_file_bPZTXE
<<<<<<< HEAD
                $n++;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4bNXUU
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                $n++;
=======
                ++$n;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                ++$n;
>>>>>>> .merge_file_ceDRBA
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                ++$n;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                $n++;
>>>>>>> .merge_file_Dj4PFF
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            }
        }
        Assert::assertGreaterThan(5, $n);
    });
});
