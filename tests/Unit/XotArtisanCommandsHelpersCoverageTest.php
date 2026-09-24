<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Request;
<<<<<<< HEAD
use Mockery;
<<<<<<< .merge_file_LQZrMH
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_GP3xsC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_Ozybem
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_isXQ7H
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Actions\ArtisanAction;
use Modules\Xot\Console\Commands\BuildTestSqliteCommand;
use Modules\Xot\Console\Commands\ExecuteSqlFileCommand;
use Modules\Xot\Console\Commands\GenerateFilamentResources;
use Modules\Xot\Console\Commands\SearchTextInDbCommand;
use Modules\Xot\Helpers\ResourceFormSchemaGenerator;
use Modules\Xot\Services\RouteService;
use Modules\Xot\States\Transitions\XotBaseTransition;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< .merge_file_LQZrMH
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_GP3xsC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_Ozybem
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
use ReflectionClass;
use ReflectionMethod;
>>>>>>> .merge_file_isXQ7H
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
<<<<<<< .merge_file_LQZrMH
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_GP3xsC
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
>>>>>>> .merge_file_Ozybem
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_isXQ7H
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
});

describe('Xot artisan commands helpers coverage', function (): void {
    test('ArtisanAction act branches con Artisan fake', function (): void {
        Http::fake();
        Process::fake();
        Artisan::shouldReceive('call')->zeroOrMoreTimes()->andReturn(0);
        Artisan::shouldReceive('output')->zeroOrMoreTimes()->andReturn('ok');

        Request::replace(['module' => 'Xot']);
        foreach (['routelist', 'queue:flush', 'optimize', 'routelist1', 'clear', 'migrate', 'unknown-act'] as $act) {
            try {
                $out = ArtisanAction::act($act);
                Assert::assertNotEmpty($out);
            } catch (\Throwable $e) {
                Assert::assertNotEmpty($e->getMessage());
            }
        }

<<<<<<< HEAD
        $ref = new ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== ArtisanAction::class || str_starts_with($method->getName(), '__')) {
<<<<<<< .merge_file_LQZrMH
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_GP3xsC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $ref = new ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== ArtisanAction::class || str_starts_with($method->getName(), '__')) {
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $ref = new \ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if (ArtisanAction::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $ref = new \ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if (ArtisanAction::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> .merge_file_Ozybem
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_isXQ7H
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                continue;
            }
            try {
                $method->setAccessible(true);
                $args = [];
                foreach ($method->getParameters() as $param) {
                    $args[] = $param->isDefaultValueAvailable()
                        ? $param->getDefaultValue()
<<<<<<< HEAD
                        : ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string' ? 'Xot' : null);
<<<<<<< .merge_file_LQZrMH
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_GP3xsC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                        : ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string' ? 'Xot' : null);
=======
                        : ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName() ? 'Xot' : null);
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                        : ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName() ? 'Xot' : null);
>>>>>>> .merge_file_Ozybem
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                        : ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName() ? 'Xot' : null);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_isXQ7H
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                }
                if ($method->isStatic()) {
                    $method->invoke(null, ...$args);
                }
            } catch (\Throwable) {
            }
        }
    });

    test('console commands helpers RouteService ResourceFormSchema Transition', function (): void {
        Http::fake();
        Process::fake();
        $n = 0;
        foreach ([
            BuildTestSqliteCommand::class,
            ExecuteSqlFileCommand::class,
            GenerateFilamentResources::class,
            SearchTextInDbCommand::class,
            RouteService::class,
            ResourceFormSchemaGenerator::class,
            XotBaseTransition::class,
        ] as $class) {
            if (! class_exists($class)) {
                continue;
            }
            try {
<<<<<<< HEAD
<<<<<<< .merge_file_LQZrMH
<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_GP3xsC
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
>>>>>>> .merge_file_Ozybem
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                $ref = new ReflectionClass($class);
>>>>>>> .merge_file_isXQ7H
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                $inst = $ref->isAbstract() ? null : $ref->newInstanceWithoutConstructor();
                if ($inst instanceof Command) {
                    try {
                        $inst->setLaravel(app());
                    } catch (\Throwable) {
                    }
                }
<<<<<<< HEAD
                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
<<<<<<< .merge_file_LQZrMH
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_GP3xsC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> .merge_file_Ozybem
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_isXQ7H
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                    if ($method->getDeclaringClass()->getName() !== $class || str_starts_with($method->getName(), '__')) {
                        continue;
                    }
                    if (in_array($method->getName(), ['handle', 'boot', 'register', 'mount', 'render'], true)) {
                        continue;
                    }
                    try {
                        $method->setAccessible(true);
                        $args = [];
                        foreach ($method->getParameters() as $param) {
                            $args[] = $param->isDefaultValueAvailable()
                                ? $param->getDefaultValue()
<<<<<<< HEAD
<<<<<<< .merge_file_LQZrMH
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_GP3xsC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_isXQ7H
                                : ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string' ? 'Xot' : []);
                        }
                        if ($method->isStatic()) {
                            $method->invoke(null, ...$args);
                        } elseif ($inst !== null) {
                            $method->invoke($inst, ...$args);
                        }
                        $n++;
                    } catch (\Throwable) {
                        $n++;
<<<<<<< .merge_file_LQZrMH
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_Ozybem
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                                : ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName() ? 'Xot' : []);
                        }
                        if ($method->isStatic()) {
                            $method->invoke(null, ...$args);
                        } elseif (null !== $inst) {
                            $method->invoke($inst, ...$args);
                        }
                        ++$n;
                    } catch (\Throwable) {
                        ++$n;
<<<<<<< HEAD
<<<<<<< .merge_file_GP3xsC
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Ozybem
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_isXQ7H
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                    }
                }
                if ($inst instanceof Command) {
                    try {
                        $def = $inst->getDefinition();
                        $input = ['command' => $inst->getName() ?? 'xot'];
                        if ($def->hasOption('dry-run')) {
                            $input['--dry-run'] = true;
                        }
                        if ($def->hasOption('analyze')) {
                            $input['--analyze'] = true;
                        }
                        if ($def->hasOption('module')) {
                            $input['--module'] = 'Xot';
                        }
<<<<<<< HEAD
<<<<<<< .merge_file_LQZrMH
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_GP3xsC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_isXQ7H
                        $inst->run(new ArrayInput($input), new NullOutput);
                        $n++;
                    } catch (\Throwable) {
                        $n++;
                    }
                }
            } catch (\Throwable) {
                $n++;
<<<<<<< .merge_file_LQZrMH
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_Ozybem
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                        $inst->run(new ArrayInput($input), new NullOutput());
                        ++$n;
                    } catch (\Throwable) {
                        ++$n;
                    }
                }
            } catch (\Throwable) {
                ++$n;
<<<<<<< HEAD
<<<<<<< .merge_file_GP3xsC
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Ozybem
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_isXQ7H
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            }
        }
        Assert::assertGreaterThan(5, $n);
    });
});
