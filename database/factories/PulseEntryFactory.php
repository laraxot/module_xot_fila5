<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

<<<<<<< HEAD
use Modules\Xot\Models\PulseEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Xot\Models\PulseEntry;

/**
 * @extends Factory<PulseEntry>
 */
>>>>>>> c7fd73eb (.)
class PulseEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<PulseEntry>
>>>>>>> c7fd73eb (.)
     */
    protected $model = PulseEntry::class;

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
