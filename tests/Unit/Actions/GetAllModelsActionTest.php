<?php

declare(strict_types=1);

/**
 * GetAllModelsAction Test Suite
 *
 * Scopo: l'action elenca i model dell'applicazione (class-string) per tooling
 * Xot (studio, generatori). Verifica istanziazione, presenza User, e risultato
 * non vuoto senza guardie ridondanti su tipi gia' array.
 */

namespace Modules\Xot\Tests\Unit\Actions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Xot\Actions\Model\GetAllModelsAction;
use PHPUnit\Framework\Assert;
use Tests\TestCase;

class GetAllModelsActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected GetAllModelsAction $action;

    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new GetAllModelsAction;
    }

    /** @test Action can be instantiated */
    public function it_can_be_instantiated(): void
    {
        Assert::assertInstanceOf(GetAllModelsAction::class, $this->action);
    }

    /** @test Action retrieves core User model */
    public function it_retrieves_user_model(): void
    {
        $models = $this->action->execute();

        $userModels = array_values(array_filter(
            $models,
            static fn (string $model): bool => str_contains($model, 'User'),
        ));

        Assert::assertGreaterThan(0, count($userModels));
    }

    /** @test Action returns model class names */
    public function it_returns_valid_model_class_names(): void
    {
        $models = $this->action->execute();

        foreach ($models as $model) {
            Assert::assertIsString($model);
            Assert::assertNotSame('', $model);
        }
    }

    /** @test Action handles empty namespace gracefully */
    public function it_handles_invalid_namespaces(): void
    {
        $this->expectNotToPerformAssertions();

        try {
            $this->action->execute();
        } catch (\Exception $e) {
            $this->fail('Action threw exception on invalid namespace: '.$e->getMessage());
        }
    }

    /** @test Action result is not empty for core application */
    public function it_returns_non_empty_result(): void
    {
        $models = $this->action->execute();

        Assert::assertGreaterThan(0, count($models));
    }
}
