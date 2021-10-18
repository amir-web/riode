<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,9),
        'name' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->text(10),
        'content' => $faker->text(40),
        'price' => $faker->numberBetween(50,487),
        'old_price' => $faker->numberBetween(50,487),
        'img' => $faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg','19.jpg','20.jpg',])
    ];
});
