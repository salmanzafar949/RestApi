<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [

        'name' => $faker->word,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(10,1000),
        'stock' => $faker->numberBetween(1,100),
        'discount' => $faker->numberBetween(10,600)
    ];
});
