<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Cast;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Mockery;
use Mockery\MockInterface;
=======
>>>>>>> laraxot/dev
use Modules\Activity\Models\Activity;
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use PHPUnit\Framework\Assert;

describe('Safe Array By Model Cast Action', function (): void {
    test('converts model attributes to array correctly', function (): void {
<<<<<<< HEAD
        $model = new Activity;
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
<<<<<<< HEAD
        /** @var Model&MockInterface $model */
        $model = Mockery::mock(Model::class);
        $model->shouldReceive('attributesToArray')->andThrow(new \Exception('Mock error'));
        $model->shouldReceive('getAttributes')->andReturn(['name' => 'Fallback']);
        $model->shouldReceive('getAttribute')->andReturn('Fallback');
=======
        $model = new class extends Model {
            public function attributesToArray(): array
            {
                throw new \Exception('Mock error');
            }

            public function getAttributes(): array
            {
                return ['name' => 'Fallback'];
            }

            public function getAttribute($key): mixed
            {
                return 'Fallback';
            }
        };
>>>>>>> laraxot/dev

        $action = app(SafeArrayByModelCastAction::class);
        $result = $action->execute($model);

        Assert::assertIsArray($result);
        Assert::assertArrayHasKey('name', $result);
        Assert::assertSame('Fallback', $result['name']);
    });
});
