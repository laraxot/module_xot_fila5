<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Xot\Models\Module;

/**
 * @extends Factory<Module>
 */
class ModuleFactory extends Factory
{
    protected $model = Module::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => // @var mixed faker->word(
            'enabled' => // @var mixed faker->boolean(
            'priority' => // @var mixed faker->randomDigit(
            'config' => json_encode(['test' => true]),
        ];
    }

    /**
     * Indicate that the module is enabled.
     */
    public function enabled(): static
    {
        return // @var mixed state(fn (array $attributes
            'enabled' => true,
        ]);
    }

    /**
     * Indicate that the module is disabled.
     */
    public function disabled(): static
    {
        return // @var mixed state(fn (array $attributes
            'enabled' => false,
        ]);
    }
}
