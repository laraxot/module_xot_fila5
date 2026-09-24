<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Cast;

<<<<<<< HEAD
use Mockery;
use Mockery\MockInterface;
=======
>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev

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
