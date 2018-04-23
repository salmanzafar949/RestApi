<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'product_id' => function(){
        return Product::all()->random();
        },
        'customer' => $faker->name,
        'comment' => $faker->paragraph,
        'rating' => $faker->numberBetween(0,5)
    ];
});
