<?php

declare(strict_types=1);
<<<<<<< .merge_file_qstDjn
<<<<<<< HEAD
<<<<<<< HEAD
=======

/** @var \ReflectionClass $reflection */
/** @var array<string, string> $properties */
>>>>>>> laraxot/dev
=======

/** @var \ReflectionClass $reflection */
/** @var array<string, string> $properties */
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_ptoaMj
?>
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
@isset($properties['remember_token'])
<<<<<<< HEAD
    use Illuminate\Support\Str;
=======
use Illuminate\Support\Str;
>>>>>>> 8d801bbe (Check & fix styling)
@endisset
use {{ $reflection->getName() }};

class {{ $reflection->getShortName() }}Factory extends Factory
{
<<<<<<< .merge_file_qstDjn
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_ptoaMj
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
<<<<<<< .merge_file_qstDjn
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_ptoaMj
}
