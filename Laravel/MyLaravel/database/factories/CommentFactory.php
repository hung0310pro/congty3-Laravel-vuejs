<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
   return [
       'product_id' => function () {
           return factory(App\Product::class)->create()->id;
       },
       'people_id' => function () {
           return factory(App\People::class)->create()->id;
       },
       'body' => $faker->realText($maxNbChars = 200, $indexSize = 2),
   ];
});
