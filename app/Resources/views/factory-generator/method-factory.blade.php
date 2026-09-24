<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
?>
use Faker\Generator as Faker;
@isset($properties['remember_token'])
    use Illuminate\Support\Str;
@endisset

/* @var $factory \Illuminate\Database\Eloquent\Factory */
$factory->define({{ $reflection->getName() }}::class, function (Faker $faker) {
return [
@foreach ($properties as $name => $property)
    '{{ $name }}' => {!! $property !!},
@endforeach
];
});
