<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Session;

<<<<<<< HEAD
=======
/**
 * @extends Factory<Session>
 */
>>>>>>> c7fd73eb (.)
class SessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var class-string<Model>
=======
     * @var class-string<Session>
>>>>>>> c7fd73eb (.)
     */
    protected $model = Session::class;

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
            // 'id' => $this->faker->word,
        ];
    }
}
