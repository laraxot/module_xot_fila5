<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Cast;

<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
use Mockery\MockInterface;
use Modules\Activity\Models\Activity;
use Modules\Xot\Actions\Cast\SafeAttributeCastAction;
use PHPUnit\Framework\Assert;

describe('Safe Attribute Cast Action', function (): void {
    test('manages eloquent attributes safely', function (): void {
        /** @var Activity&MockInterface $model */
<<<<<<< HEAD
        $model = Mockery::mock(Activity::class);
=======
        $model = \Mockery::mock(Activity::class);
>>>>>>> laraxot/dev
        $model->shouldReceive('getAttribute')->with('name')->andReturn('Test User');
        $model->shouldReceive('getAttribute')->with('email')->andReturn('');
        $model->shouldReceive('getAttribute')->with('id')->andReturn(123);
        $model->shouldReceive('getAttribute')->with('active')->andReturn(1);
        $model->shouldReceive('getAttribute')->with('missing')->andReturn(null);

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
