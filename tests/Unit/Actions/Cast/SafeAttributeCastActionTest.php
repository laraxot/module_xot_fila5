<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Cast;

<<<<<<< HEAD
<<<<<<< .merge_file_sobVYl
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_3Lztzj
use Mockery;
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
use Mockery\MockInterface;
=======
>>>>>>> 3792da0d (Check & fix styling)
use Modules\Activity\Models\Activity;
use Modules\Xot\Actions\Cast\SafeAttributeCastAction;
use PHPUnit\Framework\Assert;

describe('Safe Attribute Cast Action', function (): void {
    test('manages eloquent attributes safely', function (): void {
<<<<<<< HEAD
        /** @var Activity&MockInterface $model */
        $model = Mockery::mock(Activity::class);
        $model->shouldReceive('getAttribute')->with('name')->andReturn('Test User');
        $model->shouldReceive('getAttribute')->with('email')->andReturn('');
        $model->shouldReceive('getAttribute')->with('id')->andReturn(123);
        $model->shouldReceive('getAttribute')->with('active')->andReturn(1);
        $model->shouldReceive('getAttribute')->with('missing')->andReturn(null);
=======
<<<<<<< HEAD
        $model = new class extends Activity {
            public function getAttribute($key): mixed
            {
                return match ($key) {
                    'name' => 'Test User',
                    'email' => '',
                    'id' => 123,
                    'active' => 1,
                    'missing' => null,
                    default => null,
                };
            }
        };
>>>>>>> 3792da0d (Check & fix styling)
=======
use Modules\Activity\Models\Activity;
use Modules\Xot\Actions\Cast\SafeAttributeCastAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Safe Attribute Cast Action', function (): void {
    test('manages eloquent attributes safely', function (): void {
        $model = $this->createUnitMock(Activity::class);
        $model->method('getAttribute')->willReturnMap([
            ['name', 'Test User'],
            ['email', ''],
            ['id', 123],
            ['active', 1],
            ['missing', null],
        ]);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        $action = app(SafeAttributeCastAction::class);

        Assert::assertTrue($action->hasAttribute($model, 'name'));
        Assert::assertFalse($action->hasAttribute($model, 'missing'));
        Assert::assertTrue($action->hasNonEmptyAttribute($model, 'name'));
        Assert::assertFalse($action->hasNonEmptyAttribute($model, 'email'));
        Assert::assertSame('Test User', $action->getStringAttribute($model, 'name'));
        Assert::assertSame(123, $action->getIntAttribute($model, 'id'));
        Assert::assertTrue($action->getBooleanAttribute($model, 'active'));
        Assert::assertTrue($action->hasAttributeValue($model, 'id', 123));
    });
});
