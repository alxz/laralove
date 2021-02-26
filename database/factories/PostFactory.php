<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->realText(rand(10,40));

    $short_title = mb_strlen($title)>30 ? mb_substr($title, 0, 30) . '...' : $title; // could also user: \Illuminate\Support\Str::length($title)>30
    $created = $faker->dateTimeBetween('-30 days','-1 days'); //randomly create post date from 30-to 1 days ago

    return [
        'title' => $title,
        'short_title' => $short_title,
        'author_id' => rand(1,4),
        'descr' => $faker->realText(rand(100,500)),
        'created_at' => $created,
        'updated_at' => $created
    ];
});
