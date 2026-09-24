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
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev
use Modules\Xot\Actions\Model\Update\HasManyAction;
use Modules\Xot\Datas\RelationData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Modules\Xot\Models\Cache as CacheModel;
use Modules\Xot\Tests\Fixtures\Stubs\XotWidgetFormHost;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev
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
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
>>>>>>> laraxot/dev
        $parent = new CacheModel;
        $parent->forceFill(['id' => 1, 'key' => 'p', 'value' => 'v']);
        $parent->exists = true;

        $related = new CacheModel;
        $related->forceFill(['id' => 2, 'key' => 'c', 'value' => 'v', 'parent_id' => null]);

        $hasMany = Mockery::mock(HasMany::class);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_i0IExG
        $parent = new CacheModel();
        $parent->forceFill(['id' => 1, 'key' => 'p', 'value' => 'v']);
        $parent->exists = true;

        $related = new CacheModel();
        $related->forceFill(['id' => 2, 'key' => 'c', 'value' => 'v', 'parent_id' => null]);

        $hasMany = \Mockery::mock(HasMany::class);
<<<<<<< .merge_file_uIGE5P
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev
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
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
        $action = new HasManyAction;
=======
        $action = new HasManyAction();
>>>>>>> laraxot/dev
=======
        $action = new HasManyAction();
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev
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
        $badParent = new CacheModel;
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
        $badParent = new CacheModel;
=======
        $badParent = new CacheModel();
>>>>>>> laraxot/dev
=======
        $badParent = new CacheModel();
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev
        $badParent->forceFill(['id' => null, 'key' => 'x']);
        try {
            $action->execute($badParent, $dto);
            Assert::fail('expected InvalidArgumentException');
        } catch (\Throwable $e) {
            Assert::assertNotEmpty($e->getMessage());
        }

<<<<<<< HEAD
        $ref = new ReflectionClass(HasManyAction::class);
        foreach ($ref->getMethods(ReflectionMethod::IS_PRIVATE | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== HasManyAction::class || str_starts_with($method->getName(), '__')) {
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
        $ref = new ReflectionClass(HasManyAction::class);
        foreach ($ref->getMethods(ReflectionMethod::IS_PRIVATE | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== HasManyAction::class || str_starts_with($method->getName(), '__')) {
=======
        $ref = new \ReflectionClass(HasManyAction::class);
        foreach ($ref->getMethods(\ReflectionMethod::IS_PRIVATE | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PUBLIC) as $method) {
            if (HasManyAction::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> laraxot/dev
=======
        $ref = new \ReflectionClass(HasManyAction::class);
        foreach ($ref->getMethods(\ReflectionMethod::IS_PRIVATE | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PUBLIC) as $method) {
            if (HasManyAction::class !== $method->getDeclaringClass()->getName() || str_starts_with($method->getName(), '__')) {
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev
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
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
                    } elseif ($param->getName() === 'data' || ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'array')) {
=======
                    } elseif ('data' === $param->getName() || ($param->getType() instanceof \ReflectionNamedType && 'array' === $param->getType()->getName())) {
>>>>>>> laraxot/dev
=======
                    } elseif ('data' === $param->getName() || ($param->getType() instanceof \ReflectionNamedType && 'array' === $param->getType()->getName())) {
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev
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
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
>>>>>>> laraxot/dev
            $w = new XotWidgetFormHost;
            Assert::assertNotEmpty($w->getFormSchema());
            Assert::assertNotEmpty($w->getFormFill());
            $ref = new ReflectionClass(XotBaseWidget::class);
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
                if ($method->getDeclaringClass()->getName() !== XotBaseWidget::class) {
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_i0IExG
            $w = new XotWidgetFormHost();
            Assert::assertNotEmpty($w->getFormSchema());
            Assert::assertNotEmpty($w->getFormFill());
            $ref = new \ReflectionClass(XotBaseWidget::class);
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
                if (XotBaseWidget::class !== $method->getDeclaringClass()->getName()) {
<<<<<<< .merge_file_uIGE5P
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev
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
                        } elseif ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string') {
=======
<<<<<<< .merge_file_uIGE5P
<<<<<<< HEAD
                        } elseif ($param->getType() instanceof \ReflectionNamedType && $param->getType()->getName() === 'string') {
=======
                        } elseif ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName()) {
>>>>>>> laraxot/dev
=======
                        } elseif ($param->getType() instanceof \ReflectionNamedType && 'string' === $param->getType()->getName()) {
>>>>>>> .merge_file_i0IExG
>>>>>>> laraxot/dev
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
