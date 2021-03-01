<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\ArticleType::class, function (Faker $faker) {
    $str = $faker->word();
    return [
        'name' => strtoupper($str),
        'slug' => strtolower($str),
        'description' => $faker->sentence()
    ];
});
