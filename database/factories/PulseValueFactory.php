<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

<<<<<<< HEAD
use Modules\Xot\Models\PulseValue;
use Illuminate\Database\Eloquent\Factories\Factory;

=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Xot\Models\PulseValue;

/**
 * @extends Factory<PulseValue>
 */
>>>>>>> c7fd73eb (.)
class PulseValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<PulseValue>
>>>>>>> c7fd73eb (.)
     */
    protected $model = PulseValue::class;

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
        return [];
    }
}
