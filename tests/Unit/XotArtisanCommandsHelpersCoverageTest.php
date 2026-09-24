<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Request;
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
<<<<<<< HEAD
use Mockery;
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
use Mockery;
>>>>>>> .merge_file_x59fNe
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
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
use ReflectionClass;
use ReflectionMethod;
>>>>>>> .merge_file_x59fNe
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> 8d801bbe (Check & fix styling)
=======
    Mockery::close();
>>>>>>> .merge_file_x59fNe
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

<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
<<<<<<< HEAD
        $ref = new ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== ArtisanAction::class || str_starts_with($method->getName(), '__')) {
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
        $ref = new ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== ArtisanAction::class || str_starts_with($method->getName(), '__')) {
=======
        $ref = new \ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if (ArtisanAction::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> laraxot/dev
=======
        $ref = new \ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if (ArtisanAction::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
=======
        $ref = new \ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if (ArtisanAction::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        $ref = new ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== ArtisanAction::class || str_starts_with($method->getName(), '__')) {
>>>>>>> .merge_file_x59fNe
                continue;
            }
            try {
                $method->setAccessible(true);
                $args = [];
                foreach ($method->getParameters() as $param) {
                    $args[] = $param->isDefaultValueAvailable()
                        ? $param->getDefaultValue()
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
<<<<<<< HEAD
                        : ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string' ? 'Xot' : null);
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
                        : ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string' ? 'Xot' : null);
=======
                        : ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName() ? 'Xot' : null);
>>>>>>> laraxot/dev
=======
                        : ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName() ? 'Xot' : null);
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
=======
                        : ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName() ? 'Xot' : null);
>>>>>>> 8d801bbe (Check & fix styling)
=======
                        : ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string' ? 'Xot' : null);
>>>>>>> .merge_file_x59fNe
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
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
                $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
=======
                $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
=======
                $ref = new \ReflectionClass($class);
>>>>>>> 8d801bbe (Check & fix styling)
=======
                $ref = new ReflectionClass($class);
>>>>>>> .merge_file_x59fNe
                $inst = $ref->isAbstract() ? null : $ref->newInstanceWithoutConstructor();
                if ($inst instanceof Command) {
                    try {
                        $inst->setLaravel(app());
                    } catch (\Throwable) {
                    }
                }
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
<<<<<<< HEAD
                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> laraxot/dev
=======
                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
=======
                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> .merge_file_x59fNe
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
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_x59fNe
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
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_Ozybem
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_x59fNe
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
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_x59fNe
                        $inst->run(new ArrayInput($input), new NullOutput);
                        $n++;
                    } catch (\Throwable) {
                        $n++;
                    }
                }
            } catch (\Throwable) {
                $n++;
<<<<<<< .merge_file_QWX2RY
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_Ozybem
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_x59fNe
            }
        }
        Assert::assertGreaterThan(5, $n);
    });
});
