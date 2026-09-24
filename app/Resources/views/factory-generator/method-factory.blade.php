<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 8d801bbe (Check & fix styling)
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
