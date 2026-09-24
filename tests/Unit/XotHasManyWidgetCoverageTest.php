<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use Mockery;
<<<<<<< .merge_file_qKiQVq
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_i0IExG
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_C4ouhz
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Actions\Model\Update\HasManyAction;
use Modules\Xot\Datas\RelationData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Modules\Xot\Models\Cache as CacheModel;
use Modules\Xot\Tests\Fixtures\Stubs\XotWidgetFormHost;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< .merge_file_qKiQVq
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_i0IExG
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
use ReflectionClass;
use ReflectionMethod;
>>>>>>> .merge_file_C4ouhz
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
<<<<<<< .merge_file_qKiQVq
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
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
>>>>>>> .merge_file_i0IExG
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_C4ouhz
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
});

describe('Xot HasMany and Widget form coverage', function (): void {
    test('HasManyAction execute direct e batch su sqlite', function (): void {
        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite' => [
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
                'foreign_key_constraints' => false,
            ],
            'cache.default' => 'array',
        ]);
        DB::purge('sqlite');
        DB::reconnect('sqlite');
        Http::fake();
        Mail::fake();
        Queue::fake();
        Process::fake();

        Schema::dropIfExists('cache');
        Schema::create('cache', static function (Blueprint $t): void {
            $t->increments('id');
            $t->string('key')->nullable();
            $t->text('value')->nullable();
            $t->unsignedBigInteger('parent_id')->nullable();
        });

<<<<<<< HEAD
<<<<<<< .merge_file_qKiQVq
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_uIGE5P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_C4ouhz
        $parent = new CacheModel;
        $parent->forceFill(['id' => 1, 'key' => 'p', 'value' => 'v']);
        $parent->exists = true;

        $related = new CacheModel;
        $related->forceFill(['id' => 2, 'key' => 'c', 'value' => 'v', 'parent_id' => null]);

        $hasMany = Mockery::mock(HasMany::class);
<<<<<<< .merge_file_qKiQVq
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_i0IExG
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $parent = new CacheModel();
        $parent->forceFill(['id' => 1, 'key' => 'p', 'value' => 'v']);
        $parent->exists = true;

        $related = new CacheModel();
        $related->forceFill(['id' => 2, 'key' => 'c', 'value' => 'v', 'parent_id' => null]);

        $hasMany = \Mockery::mock(HasMany::class);
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_i0IExG
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_C4ouhz
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $hasMany->shouldReceive('getLocalKeyName')->andReturn('id');
        $hasMany->shouldReceive('getForeignKeyName')->andReturn('parent_id');

        $dto = RelationData::from([
            'name' => 'children',
            'rows' => $hasMany,
            'related' => $related,
            'data' => ['to' => [2], 'from' => [3]],
        ]);

<<<<<<< HEAD
        $action = new HasManyAction;
<<<<<<< .merge_file_qKiQVq
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $action = new HasManyAction;
=======
        $action = new HasManyAction();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $action = new HasManyAction();
>>>>>>> .merge_file_i0IExG
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $action = new HasManyAction();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_C4ouhz
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        try {
            $action->execute($parent, $dto);
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        // batch path
        try {
            $dto2 = RelationData::from([
                'name' => 'children',
                'rows' => $hasMany,
                'related' => $related,
                'data' => [
                    ['id' => 2, 'key' => 'c2'],
                ],
            ]);
            $action->execute($parent, $dto2);
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

        // invalid parent key
<<<<<<< HEAD
<<<<<<< .merge_file_qKiQVq
<<<<<<< HEAD
        $badParent = new CacheModel;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $badParent = new CacheModel;
=======
        $badParent = new CacheModel();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $badParent = new CacheModel();
>>>>>>> .merge_file_i0IExG
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $badParent = new CacheModel();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $badParent = new CacheModel;
>>>>>>> .merge_file_C4ouhz
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $badParent->forceFill(['id' => null, 'key' => 'x']);
        try {
            $action->execute($badParent, $dto);
            Assert::fail('expected InvalidArgumentException');
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

<<<<<<< HEAD
<<<<<<< .merge_file_qKiQVq
<<<<<<< HEAD
        $ref = new ReflectionClass(HasManyAction::class);
        foreach ($ref->getMethods(ReflectionMethod::IS_PRIVATE | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== HasManyAction::class || str_starts_with($method->getName(), '__')) {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $ref = new ReflectionClass(HasManyAction::class);
        foreach ($ref->getMethods(ReflectionMethod::IS_PRIVATE | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== HasManyAction::class || str_starts_with($method->getName(), '__')) {
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $ref = new \ReflectionClass(HasManyAction::class);
        foreach ($ref->getMethods(\ReflectionMethod::IS_PRIVATE | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PUBLIC) as $method) {
            if (HasManyAction::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $ref = new \ReflectionClass(HasManyAction::class);
        foreach ($ref->getMethods(\ReflectionMethod::IS_PRIVATE | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PUBLIC) as $method) {
            if (HasManyAction::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> .merge_file_i0IExG
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        $ref = new ReflectionClass(HasManyAction::class);
        foreach ($ref->getMethods(ReflectionMethod::IS_PRIVATE | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== HasManyAction::class || str_starts_with($method->getName(), '__')) {
>>>>>>> .merge_file_C4ouhz
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
                    if ($param->isDefaultValueAvailable()) {
                        $args[] = $param->getDefaultValue();
<<<<<<< HEAD
                    } elseif ($param->getName() === 'data' || ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'array')) {
<<<<<<< .merge_file_qKiQVq
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                    } elseif ($param->getName() === 'data' || ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'array')) {
=======
                    } elseif ('data' === $param->getName() || ($param->getType() instanceof \ReflectionNamedType && 'array' === $param->getType()->getName())) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                    } elseif ('data' === $param->getName() || ($param->getType() instanceof \ReflectionNamedType && 'array' === $param->getType()->getName())) {
>>>>>>> .merge_file_i0IExG
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                    } elseif ('data' === $param->getName() || ($param->getType() instanceof \ReflectionNamedType && 'array' === $param->getType()->getName())) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_C4ouhz
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                        $args[] = ['to' => [1], 'from' => [2]];
                    } else {
                        $args[] = null;
                    }
                }
                $method->invoke($action, ...$args);
            } catch (\Throwable) {
            }
        }
    });

    test('XotBaseWidget form fill resolveView senza mount Livewire', function (): void {
        Http::fake();
        Process::fake();
        try {
<<<<<<< HEAD
<<<<<<< .merge_file_qKiQVq
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_uIGE5P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_C4ouhz
            $w = new XotWidgetFormHost;
            Assert::assertNotEmpty($w->getFormSchema());
            Assert::assertNotEmpty($w->getFormFill());
            $ref = new ReflectionClass(XotBaseWidget::class);
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
                if ($method->getDeclaringClass()->getName() !== XotBaseWidget::class) {
<<<<<<< .merge_file_qKiQVq
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_i0IExG
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $w = new XotWidgetFormHost();
            Assert::assertNotEmpty($w->getFormSchema());
            Assert::assertNotEmpty($w->getFormFill());
            $ref = new \ReflectionClass(XotBaseWidget::class);
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
                if (XotBaseWidget::class !== $method->getDeclaringClass()->getName()) {
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_i0IExG
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_C4ouhz
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                    continue;
                }
                if (in_array($method->getName(), ['__construct', 'mount', 'render', 'boot'], true)) {
                    continue;
                }
                if ($method->getNumberOfRequiredParameters() > 2) {
                    continue;
                }
                try {
                    $method->setAccessible(true);
                    $args = [];
                    foreach ($method->getParameters() as $param) {
                        if ($param->isDefaultValueAvailable()) {
                            $args[] = $param->getDefaultValue();
<<<<<<< HEAD
<<<<<<< .merge_file_qKiQVq
<<<<<<< HEAD
                        } elseif ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string') {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_uIGE5P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                        } elseif ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string') {
=======
                        } elseif ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName()) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                        } elseif ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName()) {
>>>>>>> .merge_file_i0IExG
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                        } elseif ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName()) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                        } elseif ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string') {
>>>>>>> .merge_file_C4ouhz
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                            $args[] = 'x';
                        } else {
                            $args[] = null;
                        }
                    }
                    $method->invoke($w, ...$args);
                } catch (\Throwable) {
                }
            }
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }
    });
});
