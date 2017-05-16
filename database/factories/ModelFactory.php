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
      'username' => $faker->userName,
      'image_id' => function () {
        return factory(App\Image::class)->create()->id;
      },
      'email' => $faker->unique()->safeEmail,
      'password' => $password ?: $password = bcrypt('secret'),
      'remember_token' => str_random(10),
      'url' => $faker->url,
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

$factory->define(App\Notification::class, function (Faker\Generator $faker) {
  return [
      'user_id' => function () {
        return factory('App\User')->create()->id;
      },
      'created_by' => function () {
        return factory('App\User')->create()->id;
      },
      'icon' => $faker->word,
      'body' => $faker->paragraphs(1, true),
      'action_text' => $faker->words(4, true),
      'action_url' => $faker->url,
  ];
});

$factory->define(App\Announcement::class, function (Faker\Generator $faker) {
  return [
      'user_id' => function () {
        return factory('App\User')->create()->id;
      },
      'body' => $faker->paragraphs(1, true),
      'action_text' => $faker->words(4, true),
      'action_url' => $faker->url,
  ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
  $name = $faker->words(2, true);
  return [
      'owner_id' => function () {
        return factory('App\User')->create()->id;
      },
      'name' => $name,
      'slug' => str_slug($name),
      'image_id' => function () {
        return factory('App\Image')->create()->id;
      },
  ];
});

$factory->define(App\Invitation::class, function (Faker\Generator $faker) {
  return [
      'team_id' => function () {
        return factory('App\Team')->create()->id;
      },
      'user_id' => function () {
        return factory('App\User')->create()->id;
      },
      'email' => $faker->email,
      'token' => str_random(10),
  ];
});

$factory->define(App\Status::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->word,
  ];
});