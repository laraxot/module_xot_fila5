<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Cast;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Assert;

class SafeArrayByModelCastActionTest extends TestCase
{
    #[Test]
    public function converts_model_attributes_to_array_correctly(): void
    {
        $model = new Activity();
        $model->setRawAttributes(['name' => 'Test']);

        $action = app(SafeArrayByModelCastAction::class);
        $result = $action->execute($model);

        Assert::assertIsArray($result);
        Assert::assertArrayHasKey('name', $result);
    }

    #[Test]
    public function falls_back_to_safeExecute_on_error(): void
    {
        $model = $this->createUnitMock(Model::class);
        $model->method('attributesToArray')->willThrowException(new \Exception('Mock error'));
        $model->method('getAttributes')->willReturn(['name' => 'Fallback']);
        $model->method('getAttribute')->willReturn('Fallback');

        $action = app(SafeArrayByModelCastAction::class);
        $result = $action->execute($model);

        Assert::assertIsArray($result);
        Assert::assertArrayHasKey('name', $result);
        Assert::assertSame('Fallback', $result['name']);
    }
}
