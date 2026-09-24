<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Session;

/**
 * @extends Factory<Session>
 */
class SessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Session>
     */
    protected $model = Session::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
=======
>>>>>>> laraxot/dev
    public function definition(): array
    {
        return [
            // 'id' => $this->faker->word,
        ];
    }
}
