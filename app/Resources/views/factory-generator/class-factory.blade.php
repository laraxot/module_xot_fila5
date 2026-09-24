<?php

declare(strict_types=1);
<<<<<<< .merge_file_g4AAWI
<<<<<<< HEAD
<<<<<<< HEAD
=======

/** @var \ReflectionClass $reflection */
/** @var array<string, string> $properties */
>>>>>>> laraxot/dev
=======

/** @var \ReflectionClass $reflection */
/** @var array<string, string> $properties */
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_8A9h3v
?>
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
@isset($properties['remember_token'])
<<<<<<< HEAD
    use Illuminate\Support\Str;
=======
use Illuminate\Support\Str;
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
@endisset
use {{ $reflection->getName() }};

class {{ $reflection->getShortName() }}Factory extends Factory
{
<<<<<<< .merge_file_g4AAWI
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_8A9h3v
/**
* The name of the factory's corresponding model.
*
* @var string
*/
protected $model = {{ $reflection->getShortName() }}::class;

/**
* Define the model's default state.
*
* @return array
*/
public function definition(): array
{
return [
@foreach ($properties as $name => $property)
    '{{ $name }}' => {!! $property !!},
@endforeach
];
}
<<<<<<< .merge_file_g4AAWI
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = {{ $reflection->getShortName() }}::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
@foreach ($properties as $name => $property)
            '{{ $name }}' => {!! $property !!},
@endforeach
        ];
    }
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_8A9h3v
}
