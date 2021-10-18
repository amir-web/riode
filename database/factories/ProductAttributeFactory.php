<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\model\ProductAttribute;
use Faker\Generator as Faker;

$factory->define(ProductAttribute::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,160),
        'attribute_id' => $faker->numberBetween(1,11),
    ];
});
