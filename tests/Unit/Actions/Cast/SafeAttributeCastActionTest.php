<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Cast;

use Modules\Activity\Models\Activity;
use Modules\Xot\Actions\Cast\SafeAttributeCastAction;
use PHPUnit\Framework\Assert;

describe('Safe Attribute Cast Action', function (): void {
    test('manages eloquent attributes safely', function (): void {
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
=======
        $model = $this->createUnitMock(Activity::class);
        $model->method('getAttribute')->willReturnMap([
            ['name', 'Test User'],
            ['email', ''],
            ['id', 123],
            ['active', 1],
            ['missing', null],
        ]);
>>>>>>> 2353ccee (.)

    // hasAttribute
    expect($action->hasAttribute($model, 'name'))->toBeTrue();
    expect($action->hasAttribute($model, 'missing'))->toBeFalse();

    // hasNonEmptyAttribute
    expect($action->hasNonEmptyAttribute($model, 'name'))->toBeTrue();
    expect($action->hasNonEmptyAttribute($model, 'email'))->toBeFalse();

    // getStringAttribute
    expect($action->getStringAttribute($model, 'name'))->toBe('Test User');

    // getIntAttribute
    expect($action->getIntAttribute($model, 'id'))->toBe(123);

    // getBooleanAttribute
    expect($action->getBooleanAttribute($model, 'active'))->toBeTrue();

    // hasAttributeValue
    expect($action->hasAttributeValue($model, 'id', 123))->toBeTrue();

    \Mockery::close();
});
