<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Cast;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Mockery;
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
use Mockery\MockInterface;
use Modules\Activity\Models\Activity;
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use PHPUnit\Framework\Assert;

describe('Safe Array By Model Cast Action', function (): void {
    test('converts model attributes to array correctly', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
        $model = new Activity();
=======
        $model = new Activity;
>>>>>>> laraxot/dev
=======
        $model = new Activity();
>>>>>>> laraxot/dev
        $model->setRawAttributes(['name' => 'Test']);

        $action = app(SafeArrayByModelCastAction::class);
        $result = $action->execute($model);

        Assert::assertIsArray($result);
        Assert::assertArrayHasKey('name', $result);
    });

    test('falls back to safe execute on error', function (): void {
        /** @var Model&MockInterface $model */
<<<<<<< HEAD
<<<<<<< HEAD
        $model = \Mockery::mock(Model::class);
=======
        $model = Mockery::mock(Model::class);
>>>>>>> laraxot/dev
=======
        $model = \Mockery::mock(Model::class);
>>>>>>> laraxot/dev
        $model->shouldReceive('attributesToArray')->andThrow(new \Exception('Mock error'));
        $model->shouldReceive('getAttributes')->andReturn(['name' => 'Fallback']);
        $model->shouldReceive('getAttribute')->andReturn('Fallback');

        $action = app(SafeArrayByModelCastAction::class);
        $result = $action->execute($model);

        Assert::assertIsArray($result);
        Assert::assertArrayHasKey('name', $result);
        Assert::assertSame('Fallback', $result['name']);
    });
});
