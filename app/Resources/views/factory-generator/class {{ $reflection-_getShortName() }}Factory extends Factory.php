<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_UmFyBt

=======
>>>>>>> laraxot/dev
=======
=======
<<<<<<< .merge_file_sLx40b
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_XWkrpi
>>>>>>> laraxot/dev
>>>>>>> .merge_file_s7dpJo
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
