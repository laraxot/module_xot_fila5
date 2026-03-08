<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Log;

/**
 * @extends Factory<Log>
 */
class LogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Log>
     */
    protected $model = Log::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            // 'key' => // @var mixed faker->word,
            // 'value' => // @var mixed faker->text,
            // 'expiration' => // @var mixed faker->randomNumber(5
        ];
    }
}
