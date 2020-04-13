<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'people_id' => function () {
            return factory(App\People::class)->create()->id;
        },
        'name' => $faker->name,
        'desc' => $faker->text,
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});
