<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
  static $password;

  return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'password' => $password ?: $password = bcrypt('secret'),
      'remember_token' => str_random(10),
  ];
});

$factory->define(App\Guide::class, function (Faker\Generator $faker) {

  return [
      'dataType' => 'guide',
      'url' => $faker->url(),
      //category_id
      //type_id
      //device_id
      'title' => $faker->sentence(),
      'summary' => $faker->paragraph(),
      'introduction' => $faker->paragraph(),
      //image_id
      'previous_text' => $faker->sentence(),
      'conclusion' => $faker->paragraph(),
  ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
  return [
      'original' => $faker->imageUrl(),
  ];
});