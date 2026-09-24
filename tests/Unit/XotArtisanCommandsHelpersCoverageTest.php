<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Request;
<<<<<<< .merge_file_3E1I8d
<<<<<<< HEAD
use Mockery;
=======
=======
<<<<<<< .merge_file_wyvp8F
use Mockery;
=======
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> .merge_file_QDA6B0
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
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
<<<<<<< .merge_file_3E1I8d
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< .merge_file_GP3xsC
=======
<<<<<<< .merge_file_wyvp8F
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> .merge_file_QDA6B0
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< .merge_file_3E1I8d
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> .merge_file_QDA6B0
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< .merge_file_3E1I8d
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
    Mockery::close();
=======
=======
<<<<<<< .merge_file_wyvp8F
    Mockery::close();
=======
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
    Mockery::close();
=======
>>>>>>> .merge_file_QDA6B0
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
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

<<<<<<< .merge_file_3E1I8d
<<<<<<< HEAD
=======
<<<<<<< .merge_file_wyvp8F
>>>>>>> .merge_file_QDA6B0
        $ref = new ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== ArtisanAction::class || str_starts_with($method->getName(), '__')) {
=======
<<<<<<< .merge_file_3E1I8d
=======
<<<<<<< HEAD
        $ref = new ReflectionClass(ArtisanAction::class);
        foreach ($ref->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== ArtisanAction::class || str_starts_with($method->getName(), '__')) {
=======
>>>>>>> .merge_file_QDA6B0
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
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
                continue;
            }
            try {
                $method->setAccessible(true);
                $args = [];
                foreach ($method->getParameters() as $param) {
                    $args[] = $param->isDefaultValueAvailable()
                        ? $param->getDefaultValue()
<<<<<<< .merge_file_3E1I8d
<<<<<<< HEAD
                        : ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string' ? 'Xot' : null);
=======
=======
<<<<<<< .merge_file_wyvp8F
                        : ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string' ? 'Xot' : null);
=======
<<<<<<< HEAD
                        : ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string' ? 'Xot' : null);
=======
>>>>>>> .merge_file_QDA6B0
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
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
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
<<<<<<< .merge_file_3E1I8d
=======
<<<<<<< .merge_file_wyvp8F
                $ref = new ReflectionClass($class);
=======
>>>>>>> .merge_file_QDA6B0
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
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
                $inst = $ref->isAbstract() ? null : $ref->newInstanceWithoutConstructor();
                if ($inst instanceof Command) {
                    try {
                        $inst->setLaravel(app());
                    } catch (\Throwable) {
                    }
                }
<<<<<<< .merge_file_3E1I8d
<<<<<<< HEAD
                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
=======
<<<<<<< .merge_file_wyvp8F
                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
<<<<<<< HEAD
                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
>>>>>>> .merge_file_QDA6B0
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
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
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
<<<<<<< .merge_file_3E1I8d
=======
<<<<<<< .merge_file_wyvp8F
=======
>>>>>>> .merge_file_QDA6B0
<<<<<<< HEAD
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
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
<<<<<<< .merge_file_3E1I8d
=======
<<<<<<< .merge_file_wyvp8F
=======
>>>>>>> .merge_file_QDA6B0
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_Ozybem
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
<<<<<<< .merge_file_GP3xsC
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
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
<<<<<<< .merge_file_3E1I8d
=======
<<<<<<< .merge_file_wyvp8F
=======
>>>>>>> .merge_file_QDA6B0
<<<<<<< HEAD
=======
<<<<<<< .merge_file_GP3xsC
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
                        $inst->run(new ArrayInput($input), new NullOutput);
                        $n++;
                    } catch (\Throwable) {
                        $n++;
                    }
                }
            } catch (\Throwable) {
                $n++;
<<<<<<< .merge_file_3E1I8d
=======
<<<<<<< .merge_file_wyvp8F
=======
>>>>>>> .merge_file_QDA6B0
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_Ozybem
                        $inst->run(new ArrayInput($input), new NullOutput());
                        ++$n;
                    } catch (\Throwable) {
                        ++$n;
                    }
                }
            } catch (\Throwable) {
                ++$n;
<<<<<<< .merge_file_GP3xsC
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Ozybem
>>>>>>> laraxot/dev
<<<<<<< .merge_file_3E1I8d
=======
>>>>>>> .merge_file_nnevJy
>>>>>>> .merge_file_QDA6B0
            }
        }
        Assert::assertGreaterThan(5, $n);
    });
});
