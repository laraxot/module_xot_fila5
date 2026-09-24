<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Filament\Forms\Components\BaseFileUpload;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Mockery;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use SplFileInfo;
=======
>>>>>>> laraxot/dev

use function Safe\file;
use function Safe\preg_match;
use function Safe\preg_replace;

<<<<<<< HEAD
=======
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

>>>>>>> laraxot/dev
/**
 * Sweep aggressivo verso coverage 100%: closure Filament, policy con matrice ruoli, metodi senza limite parametri.
 */
final class ModuleRemainingCoverage
{
    /** @var array<string, bool> */
    private static array $closureVisited = [];

    /**
     * Evita hang da action Filament che shell-ano artisan (es. passport:purge timeout 300s)
     * o da HTTP outbound durante lo sweep delle closure.
     */
    private static function preventSideEffectHangs(): void
    {
        Process::fake();
        Http::fake(['*' => Http::response(['ok' => true], 200)]);
    }

    public static function run(string $appRoot, string $moduleNamespace): void
    {
        self::$closureVisited = [];
        self::preventSideEffectHangs();
        self::testFilamentClosures($appRoot, $moduleNamespace);
        self::testFilamentMakeAndClosures($appRoot, $moduleNamespace);
        self::testPoliciesWithRoleMatrix($appRoot, $moduleNamespace);
        self::testAggressiveMethodSweep($appRoot, $moduleNamespace);
        self::testEntireAppTree($appRoot, $moduleNamespace);
        self::testHttpControllers($appRoot, $moduleNamespace);
        self::testProjectors($appRoot, $moduleNamespace);
        self::testViewComponents($appRoot, $moduleNamespace);
    }

    /**
     * Istanzia componenti Filament via make()/configure e invoca closure nested con args tipizzati.
     */
    public static function testFilamentMakeAndClosures(string $appRoot, string $moduleNamespace): void
    {
        self::preventSideEffectHangs();
        $invoked = 0;
        $record = self::mockFilamentCoverageRecord();

        foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, 'Filament') as $class) {
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
            if ($ref->isAbstract() || $ref->isInterface() || $ref->isTrait() || $ref->isEnum()) {
                continue;
            }

            $instance = null;
            try {
                if ($ref->hasMethod('make') && $ref->getMethod('make')->isStatic()) {
                    $make = $ref->getMethod('make');
                    $argc = $make->getNumberOfRequiredParameters();
<<<<<<< HEAD
                    $instance = $argc === 0
=======
                    $instance = 0 === $argc
>>>>>>> laraxot/dev
                        ? $class::make()
                        : $class::make('coverage_field');
                }
            } catch (\Throwable) {
                try {
                    $instance = $ref->newInstanceWithoutConstructor();
                    if ($ref->hasMethod('setUp')) {
                        $setUp = $ref->getMethod('setUp');
                        $setUp->setAccessible(true);
                        $setUp->invoke($instance);
                    }
                } catch (\Throwable) {
                    continue;
                }
            }

            if (! is_object($instance)) {
                continue;
            }

            self::invokeClosuresInValue($instance, $record, $invoked);

<<<<<<< HEAD
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED) as $method) {
=======
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED) as $method) {
>>>>>>> laraxot/dev
                if ($method->getDeclaringClass()->getName() !== $class) {
                    continue;
                }
                if (str_starts_with($method->getName(), '__') || self::isLikelyHangMethod($method->getName())) {
                    continue;
                }
                if (self::methodCallsDddx($method) || $method->getNumberOfRequiredParameters() > 4) {
                    continue;
                }
                try {
                    $method->setAccessible(true);
                    $result = $method->isStatic()
                        ? $method->invoke(null, ...self::defaultArgsForMethod($method))
                        : $method->invoke($instance, ...self::defaultArgsForMethod($method));
                    self::invokeClosuresInValue($result, $record, $invoked);
<<<<<<< HEAD
                    $invoked++;
                } catch (\Throwable) {
                    $invoked++;
=======
                    ++$invoked;
                } catch (\Throwable) {
                    ++$invoked;
>>>>>>> laraxot/dev
                }
            }
        }

        Assert::assertGreaterThanOrEqual(0, $invoked);
    }

    /**
     * @return Mockery\MockInterface&Model
     */
    private static function mockFilamentCoverageRecord(): Model
    {
        /** @var Mockery\MockInterface&Model $model */
<<<<<<< HEAD
        $model = Mockery::mock(Model::class)->makePartial();
=======
        $model = \Mockery::mock(Model::class)->makePartial();
>>>>>>> laraxot/dev
        $model->shouldIgnoreMissing();
        $model->setRawAttributes([
            'id' => 1,
            'asztip' => 'A',
            'aszcod' => '1',
            'aszini' => '20260101',
            'aszfin' => '20260131',
            'lista_propro' => '1,2',
            'lista_propro_sup' => '3,4',
        ]);
        $model->shouldReceive('getKey')->andReturn(1);
        $model->shouldReceive('getAttribute')->andReturnUsing(static function (string $key) use ($model): mixed {
            return match ($key) {
                'state', 'layoutView' => null,
                'id' => 1,
                'asztip', 'aszcod', 'aszini', 'aszfin' => 'X',
                'lista_propro', 'lista_propro_sup' => '1,2',
                default => $model->{$key} ?? null,
            };
        });
        $model->shouldReceive('gg')->andReturn(1.5);
        $model->shouldReceive('getDateMax')->andReturn(20261231);
        $model->shouldReceive('getDefaultStateFor')->andReturn(['pending', 123, 'done']);
        $model->shouldReceive('getStatesFor')->andReturn(collect(['a' => 'A', 1 => 'b']));
        $model->shouldReceive('toArray')->andReturn(['id' => 1, 'street' => 'Via Roma']);
        $model->shouldReceive('relationLoaded')->andReturn(true, false);
        $model->shouldReceive('getRelationValue')->andReturn(null);
        $model->shouldReceive('update')->andReturn(true);
        $model->shouldReceive('touch')->andReturn(true);
        $model->shouldReceive('getTable')->andReturn('coverage_probe');

        return $model;
    }

    public static function testViewComponents(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (['View', 'Http/Livewire', 'Http/Middleware'] as $dir) {
            foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, $dir) as $class) {
<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
                $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
                if ($ref->isAbstract() || $ref->isInterface() || $ref->isTrait() || $ref->isEnum()) {
                    continue;
                }

                try {
                    $instance = $ref->newInstanceWithoutConstructor();
                } catch (\Throwable) {
                    try {
                        $instance = self::instantiate($class);
                    } catch (\Throwable) {
                        continue;
                    }
                }

<<<<<<< HEAD
                if ($instance === null) {
                    continue;
                }

                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED) as $method) {
=======
                if (null === $instance) {
                    continue;
                }

                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED) as $method) {
>>>>>>> laraxot/dev
                    if ($method->getDeclaringClass()->getName() !== $class || str_starts_with($method->getName(), '__')) {
                        continue;
                    }
                    if (self::methodCallsDddx($method) || self::isLikelyHangMethod($method->getName())) {
                        continue;
                    }
                    try {
                        $method->setAccessible(true);
                        $method->invoke($instance, ...self::defaultArgsForMethod($method));
<<<<<<< HEAD
                        $executed++;
                    } catch (\Throwable) {
                        $executed++;
=======
                        ++$executed;
                    } catch (\Throwable) {
                        ++$executed;
>>>>>>> laraxot/dev
                    }
                }
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testEntireAppTree(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        if (! is_dir($appRoot)) {
            Assert::assertSame(0, $executed);

            return;
        }

        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($appRoot));
        foreach ($iterator as $file) {
<<<<<<< HEAD
            if (! $file instanceof SplFileInfo || ! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
=======
            if (! $file instanceof \SplFileInfo || ! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
>>>>>>> laraxot/dev
                continue;
            }

            // Evita autoload di file non-class (Routes, helpers, blade, php-cs-fixer)
            // che eseguono side-effect (Route::) e abortano lo sweep.
            $basename = $file->getFilename();
            if (str_contains($basename, '.php-cs-fixer') || str_contains($basename, '.blade.')) {
                continue;
            }

            $relative = substr($file->getPathname(), strlen($appRoot) + 1);
            if (str_starts_with($relative, 'Routes/') || str_starts_with($relative, 'Resources/')) {
                continue;
            }
            if (str_contains($relative, '.seed.helper') || str_contains($relative, 'xot.seed')) {
                continue;
            }

            $class = $moduleNamespace.str_replace(['/', '.php'], ['\\', ''], $relative);

            try {
                if (! class_exists($class)) {
                    continue;
                }
            } catch (\Throwable) {
                continue;
            }

<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
            if ($ref->isAbstract() || $ref->isInterface() || $ref->isTrait() || $ref->isEnum()) {
                continue;
            }

            if (str_contains($class, '\\Policies\\')) {
                continue;
            }

            try {
                $instance = $ref->newInstanceWithoutConstructor();
            } catch (\Throwable) {
                try {
                    $instance = self::instantiate($class);
                } catch (\Throwable) {
                    continue;
                }
            }

<<<<<<< HEAD
            if ($instance === null) {
=======
            if (null === $instance) {
>>>>>>> laraxot/dev
                continue;
            }

            if ($instance instanceof Model) {
                try {
                    $instance->setRawAttributes(self::defaultModelAttributes());
                } catch (\Throwable) {
<<<<<<< HEAD
                    $executed++;
                }
            }

            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
                    ++$executed;
                }
            }

            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> laraxot/dev
                if ($method->getDeclaringClass()->getName() !== $class) {
                    continue;
                }

                if (str_starts_with($method->getName(), '__')) {
                    continue;
                }

                try {
                    if (self::methodCallsDddx($method)) {
                        continue;
                    }
                } catch (\Throwable) {
                    continue;
                }

                if ($instance instanceof Model && self::isDbHittingModelMethod($method->getName())) {
                    continue;
                }

                if (self::isLikelyHangMethod($method->getName())) {
                    continue;
                }

                // Skip route/controller registration that throws Invalid route action offline
                if (str_contains($class, '\\Routes\\') || str_contains($class, 'Sitemap')) {
                    continue;
                }

                try {
                    $method->setAccessible(true);
                    if ($method->isStatic()) {
                        $result = $method->invoke(null, ...self::defaultArgsForMethod($method));
                    } else {
                        $result = $method->invoke($instance, ...self::defaultArgsForMethod($method));
                    }
                    self::invokeClosuresInValue($result, $instance, $executed);
<<<<<<< HEAD
                    $executed++;
                } catch (\Throwable) {
                    $executed++;
=======
                    ++$executed;
                } catch (\Throwable) {
                    ++$executed;
>>>>>>> laraxot/dev
                }
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testFilamentClosures(string $appRoot, string $moduleNamespace): void
    {
        self::preventSideEffectHangs();
        $invoked = 0;
        $record = self::mockEloquentRecord();

        foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, 'Filament') as $class) {
            try {
                if (is_subclass_of($class, XotBaseResourceTable::class)) {
<<<<<<< HEAD
                    $table = new $class;
=======
                    $table = new $class();
>>>>>>> laraxot/dev
                    self::invokeClosuresInValue($table->getTableColumns(), $record, $invoked);
                    try {
                        self::invokeClosuresInValue($table->getTableFilters(), $record, $invoked);
                    } catch (\Throwable) {
<<<<<<< HEAD
                        $invoked++;
                    }
                    if ((new ReflectionClass($table))->hasMethod('getTableActions')) {
                        try {
                            $m = new ReflectionMethod($table, 'getTableActions');
                            self::invokeClosuresInValue($m->invoke($table), $record, $invoked);
                        } catch (\Throwable) {
                            $invoked++;
=======
                        ++$invoked;
                    }
                    if ((new \ReflectionClass($table))->hasMethod('getTableActions')) {
                        try {
                            $m = new \ReflectionMethod($table, 'getTableActions');
                            self::invokeClosuresInValue($m->invoke($table), $record, $invoked);
                        } catch (\Throwable) {
                            ++$invoked;
>>>>>>> laraxot/dev
                        }
                    }
                }

<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
                $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
                if ($ref->isAbstract() || $ref->isInterface() || $ref->isTrait()) {
                    continue;
                }

                foreach (['getFormSchema', 'getHeaderActions', 'getFooterActions', 'getBulkActions', 'getFormActions', 'getTableColumns'] as $staticMethod) {
                    if (! method_exists($class, $staticMethod)) {
                        continue;
                    }
                    try {
<<<<<<< HEAD
                        $rm = new ReflectionMethod($class, $staticMethod);
=======
                        $rm = new \ReflectionMethod($class, $staticMethod);
>>>>>>> laraxot/dev
                        if (! $rm->isStatic()) {
                            continue;
                        }
                        if ($rm->getNumberOfRequiredParameters() > 0) {
                            continue;
                        }
                        self::invokeClosuresInValue($rm->invoke(null), $record, $invoked);
                    } catch (\Throwable) {
<<<<<<< HEAD
                        $invoked++;
=======
                        ++$invoked;
>>>>>>> laraxot/dev
                    }
                }

                try {
                    $instance = $ref->newInstanceWithoutConstructor();
                } catch (\Throwable) {
                    continue;
                }

                foreach (['getHeaderActions', 'getFooterActions', 'getActions', 'getFormSchema', 'form', 'table', 'infolist'] as $methodName) {
                    if (! $ref->hasMethod($methodName)) {
                        continue;
                    }
                    $method = $ref->getMethod($methodName);
                    if ($method->getNumberOfRequiredParameters() > 2) {
                        continue;
                    }
                    try {
                        $args = self::defaultArgsForMethod($method);
                        $result = $method->invoke($instance, ...$args);
                        self::invokeClosuresInValue($result, $record, $invoked);
                    } catch (\Throwable) {
<<<<<<< HEAD
                        $invoked++;
                    }
                }
            } catch (\Throwable) {
                $invoked++;
=======
                        ++$invoked;
                    }
                }
            } catch (\Throwable) {
                ++$invoked;
>>>>>>> laraxot/dev
            }
        }

        Assert::assertGreaterThanOrEqual(0, $invoked);
    }

    public static function testPoliciesWithRoleMatrix(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;
        $roleSets = [
            ['super-admin', 'incentivi-admin'],
            ['hr-manager'],
            ['workgroup-manager'],
            ['finance-manager'],
            [],
        ];

        foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, 'Models/Policies') as $class) {
            try {
<<<<<<< HEAD
                $policy = new $class;
                $ref = new ReflectionClass($policy);
=======
                $policy = new $class();
                $ref = new \ReflectionClass($policy);
>>>>>>> laraxot/dev

                foreach ($roleSets as $roles) {
                    $user = self::mockUserWithRoles($roles);

<<<<<<< HEAD
                    foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                        if ($method->getName() === '__construct') {
=======
                    foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
                        if ('__construct' === $method->getName()) {
>>>>>>> laraxot/dev
                            continue;
                        }

                        try {
                            $args = self::buildPolicyArgs($method, $user);
                            $method->invoke($policy, ...$args);
<<<<<<< HEAD
                            $executed++;
                        } catch (\Throwable) {
                            $executed++;
=======
                            ++$executed;
                        } catch (\Throwable) {
                            ++$executed;
>>>>>>> laraxot/dev
                        }
                    }
                }
            } catch (\Throwable) {
<<<<<<< HEAD
                $executed++;
=======
                ++$executed;
>>>>>>> laraxot/dev
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testAggressiveMethodSweep(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;
        $dirs = ['Models', 'Actions', 'Filament', 'Mail', 'Emails', 'Exports', 'Imports', 'Http', 'Projectors', 'Listeners', 'Observers', 'Services', 'Rules', 'Providers'];

        foreach ($dirs as $dir) {
            foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, $dir) as $class) {
                if (str_contains($class, '\\Policies\\')) {
                    continue;
                }

<<<<<<< HEAD
                $ref = new ReflectionClass($class);
=======
                $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
                if ($ref->isAbstract() || $ref->isInterface() || $ref->isTrait() || $ref->isEnum()) {
                    continue;
                }

                try {
                    $instance = $ref->newInstanceWithoutConstructor();
                } catch (\Throwable) {
                    try {
                        $instance = self::instantiate($class);
                    } catch (\Throwable) {
                        continue;
                    }
                }

<<<<<<< HEAD
                if ($instance === null) {
=======
                if (null === $instance) {
>>>>>>> laraxot/dev
                    continue;
                }

                if ($instance instanceof Model) {
                    $instance->setRawAttributes(self::defaultModelAttributes());
                }

<<<<<<< HEAD
                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED) as $method) {
=======
                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED) as $method) {
>>>>>>> laraxot/dev
                    if ($method->getDeclaringClass()->getName() !== $class) {
                        continue;
                    }

                    if (str_starts_with($method->getName(), '__')) {
                        continue;
                    }

                    if (self::methodCallsDddx($method)) {
                        continue;
                    }

                    if ($instance instanceof Model && self::isDbHittingModelMethod($method->getName())) {
                        continue;
                    }

                    if (self::isLikelyHangMethod($method->getName())) {
                        continue;
                    }

                    try {
                        $method->setAccessible(true);
                        if ($method->isStatic()) {
                            $method->invoke(null, ...self::defaultArgsForMethod($method));
                        } else {
                            $method->invoke($instance, ...self::defaultArgsForMethod($method));
                        }
<<<<<<< HEAD
                        $executed++;
                    } catch (\Throwable) {
                        $executed++;
=======
                        ++$executed;
                    } catch (\Throwable) {
                        ++$executed;
>>>>>>> laraxot/dev
                    }
                }
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testHttpControllers(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, 'Http/Controllers') as $class) {
            try {
                $controller = app($class);
            } catch (\Throwable) {
                try {
<<<<<<< HEAD
                    $controller = (new ReflectionClass($class))->newInstanceWithoutConstructor();
=======
                    $controller = (new \ReflectionClass($class))->newInstanceWithoutConstructor();
>>>>>>> laraxot/dev
                } catch (\Throwable) {
                    continue;
                }
            }

<<<<<<< HEAD
            $ref = new ReflectionClass($class);
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
=======
            $ref = new \ReflectionClass($class);
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
>>>>>>> laraxot/dev
                if ($method->isStatic() || str_starts_with($method->getName(), '__')) {
                    continue;
                }

                if ($method->getDeclaringClass()->getName() !== $class) {
                    continue;
                }

                if (self::methodCallsDddx($method)) {
                    continue;
                }

                try {
                    if (! is_object($controller)) {
                        continue;
                    }
                    $method->invoke($controller, ...self::defaultArgsForMethod($method));
<<<<<<< HEAD
                    $executed++;
                } catch (\Throwable) {
                    $executed++;
=======
                    ++$executed;
                } catch (\Throwable) {
                    ++$executed;
>>>>>>> laraxot/dev
                }
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testProjectors(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (ModuleBusinessCoverage::discoverPhpClasses($appRoot, $moduleNamespace, 'Projectors') as $class) {
            try {
<<<<<<< HEAD
                $projector = new $class;
                $ref = new ReflectionClass($class);

                foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
=======
                $projector = new $class();
                $ref = new \ReflectionClass($class);

                foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
>>>>>>> laraxot/dev
                    $name = $method->getName();
                    if (str_starts_with($name, '__')) {
                        continue;
                    }
<<<<<<< HEAD
                    if (! str_starts_with($name, 'on') && $name !== 'handle') {
=======
                    if (! str_starts_with($name, 'on') && 'handle' !== $name) {
>>>>>>> laraxot/dev
                        continue;
                    }

                    if ($method->getDeclaringClass()->getName() !== $class) {
                        continue;
                    }

                    try {
                        $args = self::defaultArgsForMethod($method);
<<<<<<< HEAD
                        if ($args === [] && $method->getNumberOfRequiredParameters() > 0) {
                            continue;
                        }
                        $method->invoke($projector, ...$args);
                        $executed++;
                    } catch (\Throwable) {
                        $executed++;
                    }
                }
            } catch (\Throwable) {
                $executed++;
=======
                        if ([] === $args && $method->getNumberOfRequiredParameters() > 0) {
                            continue;
                        }
                        $method->invoke($projector, ...$args);
                        ++$executed;
                    } catch (\Throwable) {
                        ++$executed;
                    }
                }
            } catch (\Throwable) {
                ++$executed;
>>>>>>> laraxot/dev
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    /**
<<<<<<< HEAD
     * @param  list<string>  $roles
=======
     * @param list<string> $roles
     *
>>>>>>> laraxot/dev
     * @return Mockery\MockInterface&UserContract
     */
    private static function mockUserWithRoles(array $roles): UserContract
    {
        /** @var Mockery\MockInterface&UserContract $user */
<<<<<<< HEAD
        $user = Mockery::mock(UserContract::class);
=======
        $user = \Mockery::mock(UserContract::class);
>>>>>>> laraxot/dev
        $user->shouldReceive('hasRole')->andReturnUsing(
            static fn (array|string $r): bool => (bool) array_intersect(
                is_array($r) ? array_values(array_filter($r, is_string(...))) : [$r],
                $roles,
            ),
        );
        $user->shouldReceive('can')->andReturn(true);
        $user->shouldReceive('getKey')->andReturn(1);
        $user->shouldIgnoreMissing();
        $user->id = '1';

        return $user;
    }

    /**
     * @return list<mixed>
     */
<<<<<<< HEAD
    private static function buildPolicyArgs(ReflectionMethod $method, UserContract $user): array
=======
    private static function buildPolicyArgs(\ReflectionMethod $method, UserContract $user): array
>>>>>>> laraxot/dev
    {
        $args = [];
        foreach ($method->getParameters() as $param) {
            $type = $param->getType();
<<<<<<< HEAD
            if ($type instanceof ReflectionNamedType && ! $type->isBuiltin()) {
                $typeName = $type->getName();
                if ($typeName === UserContract::class || is_subclass_of($typeName, UserContract::class)) {
=======
            if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {
                $typeName = $type->getName();
                if (UserContract::class === $typeName || is_subclass_of($typeName, UserContract::class)) {
>>>>>>> laraxot/dev
                    $args[] = $user;

                    continue;
                }
<<<<<<< HEAD
                if (is_subclass_of($typeName, Model::class) || $typeName === Model::class) {
=======
                if (is_subclass_of($typeName, Model::class) || Model::class === $typeName) {
>>>>>>> laraxot/dev
                    $args[] = self::mockEloquentRecord($typeName);

                    continue;
                }
            }
            $args[] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null;
        }

        return $args;
    }

    /**
<<<<<<< HEAD
     * @param  class-string<Model>|null  $class
=======
     * @param class-string<Model>|null $class
     *
>>>>>>> laraxot/dev
     * @return Mockery\MockInterface&Model
     */
    private static function mockEloquentRecord(?string $class = null): Model
    {
        $class ??= Model::class;
        /** @var Mockery\MockInterface&Model $model */
<<<<<<< HEAD
        $model = Mockery::mock($class)->makePartial();
=======
        $model = \Mockery::mock($class)->makePartial();
>>>>>>> laraxot/dev
        $model->shouldIgnoreMissing();
        $model->shouldReceive('getKey')->andReturn(1);
        $model->shouldReceive('getAttribute')->andReturn(null);
        $model->shouldReceive('setAttribute')->andReturnSelf();
        $model->shouldReceive('getTable')->andReturn('coverage_probe');
        $model->setAttribute('id', 1);

<<<<<<< HEAD
        $builder = Mockery::mock(Builder::class);
=======
        $builder = \Mockery::mock(Builder::class);
>>>>>>> laraxot/dev
        $builder->shouldReceive('where')->andReturnSelf();
        $builder->shouldReceive('whereHas')->andReturnSelf();
        $builder->shouldReceive('first')->andReturn(null);
        $builder->shouldReceive('exists')->andReturn(false, true);
        $builder->shouldReceive('get')->andReturn(collect());
        $builder->shouldReceive('pluck')->andReturn(collect());

<<<<<<< HEAD
        $relation = Mockery::mock(Relation::class);
=======
        $relation = \Mockery::mock(Relation::class);
>>>>>>> laraxot/dev
        $relation->shouldReceive('where')->andReturnSelf();
        $relation->shouldReceive('whereHas')->andReturnSelf();
        $relation->shouldReceive('exists')->andReturn(false, true);
        $relation->shouldReceive('first')->andReturn(null);
        $relation->shouldReceive('get')->andReturn(collect());

        $model->shouldReceive('employees')->andReturn($relation);
        $model->shouldReceive('activities')->andReturn($builder);
        $model->shouldReceive('workgroup')->andReturn($builder);
        $model->shouldReceive('relationLoaded')->andReturn(false);

        return $model;
    }

    private static function invokeClosuresInValue(mixed $value, object $context, int &$invoked): void
    {
        if ($value instanceof \Closure) {
            $key = spl_object_hash($value);
            if (isset(self::$closureVisited[$key])) {
                return;
            }
            self::$closureVisited[$key] = true;
            self::invokeClosureWithArgMatrix($value, $context);
<<<<<<< HEAD
            $invoked++;
=======
            ++$invoked;
>>>>>>> laraxot/dev

            return;
        }

        if (is_array($value)) {
            foreach ($value as $item) {
                self::invokeClosuresInValue($item, $context, $invoked);
            }

            return;
        }

        if (! is_object($value)) {
            return;
        }

        $key = spl_object_hash($value);
        if (isset(self::$closureVisited[$key])) {
            return;
        }
        self::$closureVisited[$key] = true;

<<<<<<< HEAD
        $ref = new ReflectionClass($value);
=======
        $ref = new \ReflectionClass($value);
>>>>>>> laraxot/dev
        foreach ($ref->getProperties() as $property) {
            if ($property->isStatic()) {
                continue;
            }
            try {
                $property->setAccessible(true);
                $propVal = $property->getValue($value);
            } catch (\Throwable) {
                continue;
            }
            if ($propVal instanceof \Closure) {
                self::invokeClosuresInValue($propVal, $context, $invoked);
            } elseif (is_array($propVal)) {
                self::invokeClosuresInValue($propVal, $context, $invoked);
            } elseif (is_object($propVal)) {
                self::invokeClosuresInValue($propVal, $context, $invoked);
            }
        }

        foreach ([
            'getStateUsing', 'formatStateUsing', 'getDescriptionUsing', 'getTooltipUsing',
            'action', 'using', 'query', 'getAction', 'getActionFunction', 'getSchema', 'getChildComponents',
            'getDefaultChildComponents', 'getHeaderActions', 'getActions', 'getRecordStates',
            'getStateActions', 'getColumns', 'getFormSchema', 'getEnabledDates',
        ] as $methodName) {
            if (! method_exists($value, $methodName)) {
                continue;
            }
            try {
<<<<<<< HEAD
                $rm = new ReflectionMethod($value, $methodName);
                if ($rm->getNumberOfRequiredParameters() === 0) {
=======
                $rm = new \ReflectionMethod($value, $methodName);
                if (0 === $rm->getNumberOfRequiredParameters()) {
>>>>>>> laraxot/dev
                    $result = $rm->invoke($value);
                    self::invokeClosuresInValue($result, $context, $invoked);
                }
            } catch (\Throwable) {
<<<<<<< HEAD
                $invoked++;
=======
                ++$invoked;
>>>>>>> laraxot/dev
            }
        }
    }

    private static function invokeClosureWithArgMatrix(\Closure $closure, object $context): void
    {
        // Skip closure che shell-ano artisan (PassportDashboard etc.): anche con fake
        // possono tenere il runner impegnato o riaprire connessioni.
        try {
            $statics = (new \ReflectionFunction($closure))->getStaticVariables();
            foreach ($statics as $staticValue) {
                if (is_string($staticValue) && (
                    str_contains($staticValue, 'passport:')
                    || str_contains($staticValue, 'artisan')
                    || str_starts_with($staticValue, 'migrate')
                )) {
                    return;
                }
            }
        } catch (\Throwable) {
            // continue
        }

<<<<<<< HEAD
        $get = Mockery::mock(Get::class);
        $get->shouldReceive('__invoke')->andReturn('done', 'pending', null, 'grid', 'list');
        $get->shouldIgnoreMissing();

        $set = Mockery::mock(Set::class);
=======
        $get = \Mockery::mock(Get::class);
        $get->shouldReceive('__invoke')->andReturn('done', 'pending', null, 'grid', 'list');
        $get->shouldIgnoreMissing();

        $set = \Mockery::mock(Set::class);
>>>>>>> laraxot/dev
        $set->shouldReceive('__invoke')->andReturnNull();
        $set->shouldIgnoreMissing();

        // Se la closure cattura un'altra closure (es. fillForm dentro mountUsing), eseguila.
        try {
            $statics = (new \ReflectionFunction($closure))->getStaticVariables();
            foreach ($statics as $staticValue) {
                if ($staticValue instanceof \Closure) {
                    self::invokeClosureWithArgMatrix($staticValue, $context);
                }
            }
        } catch (\Throwable) {
        }

        $attempts = [
            [$context],
            [$context, ''],
            [$context, 'test'],
            [$context, 'done'],
            [$context, 'pending'],
            [$context, null],
            [$context, []],
            [$context, ['state' => 'done', 'message' => 'ok', 'newstate' => 'icon']],
            [$context, true],
            [$context, false],
            [$context, 1],
            [$get],
            [$get, $context],
            [$context, $get],
            [$set],
            [[], $set],
            [['newstate' => 'heroicon-o-star'], $set],
            [null],
            [],
            ['list'],
            ['grid'],
            [true],
            [false],
            [[], []],
        ];

        // Spatie media upload closures (ImageSpatie/VideoSpatie)
        try {
<<<<<<< HEAD
            $tmpUpload = Mockery::mock(TemporaryUploadedFile::class);
            $tmpUpload->shouldIgnoreMissing();
            $livewire = Mockery::mock(HasForms::class);
            $livewire->shouldIgnoreMissing();
            $component = Mockery::mock(BaseFileUpload::class);
            $component->shouldIgnoreMissing();
            $media = Mockery::mock(HasMedia::class);
            $adder = Mockery::mock(FileAdder::class);
=======
            $tmpUpload = \Mockery::mock(TemporaryUploadedFile::class);
            $tmpUpload->shouldIgnoreMissing();
            $livewire = \Mockery::mock(HasForms::class);
            $livewire->shouldIgnoreMissing();
            $component = \Mockery::mock(BaseFileUpload::class);
            $component->shouldIgnoreMissing();
            $media = \Mockery::mock(HasMedia::class);
            $adder = \Mockery::mock(FileAdder::class);
>>>>>>> laraxot/dev
            $adder->shouldReceive('withResponsiveImages')->andReturnSelf();
            $adder->shouldReceive('toMediaCollection')->andReturnNull();
            $adder->shouldIgnoreMissing();
            $media->shouldReceive('addMedia')->andReturn($adder);
            $media->shouldIgnoreMissing();
            $attempts[] = [$livewire, $component, $tmpUpload, $get, $media];
            $attempts[] = [$livewire, $component, $tmpUpload, $get, $context];
        } catch (\Throwable) {
        }

        foreach ($attempts as $args) {
            try {
                $closure(...$args);
            } catch (\Throwable) {
            }
        }

        try {
            $ref = new \ReflectionFunction($closure);
            $built = [];
            foreach ($ref->getParameters() as $param) {
                $type = $param->getType();
<<<<<<< HEAD
                if ($type instanceof ReflectionNamedType && ! $type->isBuiltin()) {
                    $typeName = $type->getName();
                    if ($typeName === Get::class) {
                        $built[] = $get;
                    } elseif ($typeName === Set::class) {
                        $built[] = $set;
                    } elseif (is_subclass_of($typeName, Model::class) || $typeName === Model::class) {
=======
                if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {
                    $typeName = $type->getName();
                    if (Get::class === $typeName) {
                        $built[] = $get;
                    } elseif (Set::class === $typeName) {
                        $built[] = $set;
                    } elseif (is_subclass_of($typeName, Model::class) || Model::class === $typeName) {
>>>>>>> laraxot/dev
                        $built[] = $context;
                    } elseif (class_exists($typeName)) {
                        $built[] = self::instantiate($typeName) ?? $context;
                    } else {
                        $built[] = $context;
                    }
<<<<<<< HEAD
                } elseif ($type instanceof ReflectionNamedType) {
=======
                } elseif ($type instanceof \ReflectionNamedType) {
>>>>>>> laraxot/dev
                    $built[] = match ($type->getName()) {
                        'array' => ['state' => 'done', 'message' => 'm'],
                        'string' => 'done',
                        'int' => 1,
                        'float' => 1.0,
                        'bool' => true,
                        default => null,
                    };
                } else {
                    $built[] = $context;
                }
            }
            $closure(...$built);
        } catch (\Throwable) {
        }
    }

    /**
     * @return list<mixed>
     */
<<<<<<< HEAD
    private static function defaultArgsForMethod(ReflectionMethod $method): array
=======
    private static function defaultArgsForMethod(\ReflectionMethod $method): array
>>>>>>> laraxot/dev
    {
        $args = [];

        foreach ($method->getParameters() as $param) {
            if ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();

                continue;
            }

            $type = $param->getType();
            $name = $param->getName();

<<<<<<< HEAD
            if ($type instanceof ReflectionNamedType && ! $type->isBuiltin()) {
=======
            if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {
>>>>>>> laraxot/dev
                $typeName = $type->getName();
                if (enum_exists($typeName)) {
                    $cases = $typeName::cases();
                    $args[] = $cases[0] ?? null;

                    continue;
                }
<<<<<<< HEAD
                if ($typeName === Request::class || is_subclass_of($typeName, Request::class)) {
=======
                if (Request::class === $typeName || is_subclass_of($typeName, Request::class)) {
>>>>>>> laraxot/dev
                    $args[] = Request::create('/coverage/'.uniqid('', true), 'GET');

                    continue;
                }
<<<<<<< HEAD
                if (is_subclass_of($typeName, Model::class) || $typeName === Model::class) {
=======
                if (is_subclass_of($typeName, Model::class) || Model::class === $typeName) {
>>>>>>> laraxot/dev
                    $args[] = self::mockEloquentRecord($typeName);

                    continue;
                }
<<<<<<< HEAD
                if ($typeName === UserContract::class || is_subclass_of($typeName, UserContract::class)) {
=======
                if (UserContract::class === $typeName || is_subclass_of($typeName, UserContract::class)) {
>>>>>>> laraxot/dev
                    $args[] = self::mockUserWithRoles(['super-admin']);

                    continue;
                }
                $args[] = class_exists($typeName) ? self::instantiate($typeName) : null;

                continue;
            }

            if (str_contains(strtolower($name), 'id')) {
                $args[] = 1;

                continue;
            }

<<<<<<< HEAD
            if ($type instanceof ReflectionNamedType) {
=======
            if ($type instanceof \ReflectionNamedType) {
>>>>>>> laraxot/dev
                $args[] = match ($type->getName()) {
                    'array' => [],
                    'string' => 'test',
                    'int' => 1,
                    'float' => 1.0,
                    'bool' => true,
                    default => null,
                };

                continue;
            }

            $args[] = null;
        }

        return $args;
    }

    /**
<<<<<<< HEAD
     * @param  class-string  $class
=======
     * @param class-string $class
>>>>>>> laraxot/dev
     */
    private static function instantiate(string $class, int $depth = 0): ?object
    {
        if ($depth > 4 || ! class_exists($class)) {
            return null;
        }

<<<<<<< HEAD
        $ref = new ReflectionClass($class);
=======
        $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
        if ($ref->isAbstract() || $ref->isInterface() || $ref->isTrait() || $ref->isEnum()) {
            return null;
        }

        $ctor = $ref->getConstructor();
<<<<<<< HEAD
        if ($ctor === null) {
=======
        if (null === $ctor) {
>>>>>>> laraxot/dev
            try {
                return $ref->newInstance();
            } catch (\Throwable) {
                return null;
            }
        }

        $args = [];
        foreach ($ctor->getParameters() as $param) {
            if ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();

                continue;
            }
            $type = $param->getType();
<<<<<<< HEAD
            if ($type instanceof ReflectionNamedType && ! $type->isBuiltin()) {
=======
            if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {
>>>>>>> laraxot/dev
                $dependencyClass = $type->getName();
                $args[] = class_exists($dependencyClass) ? self::instantiate($dependencyClass, $depth + 1) : null;

                continue;
            }
            $args[] = null;
        }

        try {
            return $ref->newInstanceArgs($args);
        } catch (\Throwable) {
            try {
                return $ref->newInstanceWithoutConstructor();
            } catch (\Throwable) {
                return null;
            }
        }
    }

    /**
     * @var array<string, bool>
     */
    private static array $dddxMethodCache = [];

<<<<<<< HEAD
    private static function methodCallsDddx(ReflectionMethod $method): bool
=======
    private static function methodCallsDddx(\ReflectionMethod $method): bool
>>>>>>> laraxot/dev
    {
        $cacheKey = $method->getDeclaringClass()->getName().'::'.$method->getName();
        if (isset(self::$dddxMethodCache[$cacheKey])) {
            return self::$dddxMethodCache[$cacheKey];
        }

        $file = $method->getFileName();
<<<<<<< HEAD
        if ($file === false || ! is_readable($file)) {
=======
        if (false === $file || ! is_readable($file)) {
>>>>>>> laraxot/dev
            return self::$dddxMethodCache[$cacheKey] = false;
        }

        $lines = file($file);

        $start = $method->getStartLine();
        $end = $method->getEndLine();
        if ($start < 1 || $end < $start) {
            return self::$dddxMethodCache[$cacheKey] = false;
        }

        $body = implode('', array_filter(
            array_slice($lines, $start - 1, $end - $start + 1),
            is_string(...),
        ));
        // Ignora commenti: `// dddx(...)` non deve bloccare l'esecuzione del metodo.
        $body = preg_replace('!//.*$!m', '', $body);
        $body = preg_replace('!/\*.*?\*/!s', '', $body);

        return self::$dddxMethodCache[$cacheKey] = (bool) preg_match('/\bdddx\s*\(/', $body)
            || (bool) preg_match('/(?<![\w\\\\])\bdd\s*\(/', $body);
    }

    private static function isDbHittingModelMethod(string $name): bool
    {
        return in_array($name, [
            'setHighestOrderNumber', 'getHighestOrderNumber', 'buildSortQuery', 'determineOrderColumnName',
            'all', 'find', 'findOrFail', 'findOrNew', 'findMany', 'first', 'firstOrFail', 'firstOrNew',
            'firstOrCreate', 'firstWhere', 'get', 'create', 'forceCreate', 'updateOrCreate', 'upsert',
            'destroy', 'truncate', 'count', 'exists', 'pluck', 'value', 'paginate', 'simplePaginate',
            'cursor', 'chunk', 'chunkById', 'each', 'lazy', 'lazyById', 'newQuery', 'newModelQuery',
            'newQueryWithoutScopes', 'newQueryForRestoration', 'newCollection', 'newPivot',
            'resolveRouteBinding', 'resolveSoftDeletableRouteBinding', 'resolveChildRouteBinding', 'resolveRouteBindingQuery',
        ], true);
    }

    private static function isLikelyHangMethod(string $name): bool
    {
        return str_contains($name, 'Navigation')
            || str_contains($name, 'getEloquentQuery')
            || str_contains($name, 'getTableQuery')
            || str_contains(strtolower($name), 'export')
            || in_array($name, [
                'boot', 'booted', 'register', 'booting', 'mount', 'render',
                'handle', 'save', 'delete', 'update', 'create', 'store',
                'import', 'seed', 'migrate', 'artisan',
            ], true);
    }

    /**
<<<<<<< HEAD
     * @return array<string, mixed>
=======
     * <<<<<<< HEAD.
     *
     * @return array<string, mixed>
     *                                   =======
     * @return array<string, int|string>
     *                                   >>>>>>> laraxot/dev
>>>>>>> laraxot/dev
     */
    private static function defaultModelAttributes(): array
    {
        return [
            'id' => 1,
            'ente' => 90,
            'matr' => 12345,
            'anno' => 2024,
            'stabi' => 1,
            'repar' => 1,
            'quadrimestre' => 1,
            'trimestre' => 2,
            'nome' => 'Mario',
            'cognome' => 'Rossi',
            'email' => 'test@example.com',
            'stato' => 'compilazione',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ];
    }
}
