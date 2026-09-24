<?php

declare(strict_types=1);
<<<<<<< .merge_file_sgUNcA
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_BoIYPv
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======

>>>>>>> .merge_file_ThZOWw
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_vF8WEZ
?>
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
@isset($properties['remember_token'])
    use Illuminate\Support\Str;
@endisset
use {{ $reflection->getName() }};

class {{ $reflection->getShortName() }}Factory extends Factory
{
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
}
