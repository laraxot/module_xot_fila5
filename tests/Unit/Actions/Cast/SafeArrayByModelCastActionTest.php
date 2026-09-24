<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Cast;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< .merge_file_B2hzqR
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_VH9su9
use Mockery;
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
use Mockery\MockInterface;
=======
>>>>>>> 3792da0d (Check & fix styling)
use Modules\Activity\Models\Activity;
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use PHPUnit\Framework\Assert;

=======
use Modules\Activity\Models\Activity;
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

>>>>>>> 930f8146 (Check & fix styling)
describe('Safe Array By Model Cast Action', function (): void {
    test('converts model attributes to array correctly', function (): void {
<<<<<<< .merge_file_B2hzqR
<<<<<<< HEAD
<<<<<<< HEAD
        $model = new Activity;
=======
        $model = new Activity();
>>>>>>> laraxot/dev
=======
        $model = new Activity();
>>>>>>> 3792da0d (Check & fix styling)
=======
        $model = new Activity;
>>>>>>> .merge_file_VH9su9
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
<<<<<<< HEAD
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
>>>>>>> 3792da0d (Check & fix styling)
=======
        $model = $this->createUnitMock(Model::class);
        $model->method('attributesToArray')->willThrowException(new \Exception('Mock error'));
        $model->method('getAttributes')->willReturn(['name' => 'Fallback']);
        $model->method('getAttribute')->willReturn('Fallback');
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        $action = app(SafeArrayByModelCastAction::class);
        $result = $action->execute($model);

        Assert::assertIsArray($result);
        Assert::assertArrayHasKey('name', $result);
        Assert::assertSame('Fallback', $result['name']);
    });
});
