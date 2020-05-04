<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'price' => random_int(100000, 5000000),
        'bedrooms' => random_int(1, 5),
        'bathrooms' => random_int(1, 3),
        'storeys' => random_int(1, 2),
        'garages' => random_int(1, 3),
    ];
});
