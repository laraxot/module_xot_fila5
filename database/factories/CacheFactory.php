<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Cache;

/**
 * @extends Factory<Cache>
 */
class CacheFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Cache>
     */
    protected $model = Cache::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'key' => // @var mixed faker->word,
            'value' => // @var mixed faker->text,
            'expiration' => // @var mixed faker->randomNumber(5
        ];
    }
}
