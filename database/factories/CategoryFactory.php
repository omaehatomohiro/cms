<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $articleTypes = App\ArticleType::all();
    $ids = count($articleTypes);
    $str = $faker->word();
    return [
        'article_type_id' => mt_rand(1,$ids),
        'name' => strtoupper($str),
        'slug' => strtolower($str),
        'description' => $faker->sentence()
    ];
});