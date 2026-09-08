<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Log;

<<<<<<< HEAD
=======
/**
 * @extends Factory<Log>
 */
>>>>>>> c7fd73eb (.)
class LogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var class-string<Model>
=======
     * @var class-string<Log>
>>>>>>> c7fd73eb (.)
     */
    protected $model = Log::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> c7fd73eb (.)
    public function definition(): array
    {
        return [
            // 'key' => $this->faker->word,
            // 'value' => $this->faker->text,
            // 'expiration' => $this->faker->randomNumber(5),
        ];
    }
}
