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
      'email' => $faker->unique()->safeEmail,
      'password' => $password ?: $password = bcrypt('secret'),
      'url' => $faker->url,
  ];
});

$factory->define(App\Guide::class, function (Faker\Generator $faker) {

  return [
      'datatype_id' => 1,
      'url' => $faker->url(),
      'revision_id' => 1,
      'type_id' => 1,
  ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
  return [
      'original' => $faker->imageUrl(),
  ];
});

$factory->define(App\Notification::class, function (Faker\Generator $faker) {
  return [
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
      'body' => $faker->paragraphs(1, true),
      'action_text' => $faker->words(4, true),
      'action_url' => $faker->url,
  ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
  $name = $faker->name;
  return [
      'owner_id' => 1,
      'name' => $name,
      'slug' => str_slug($name),
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

$factory->define(App\Revision::class, function (Faker\Generator $faker) {
  return [
      'description' => $faker->sentence,
      'editor_id' => function () {
        return factory('App\User')->create()->id;
      },
      'owner_id' => function () {
        return factory('App\User')->create()->id;
      },
      'status_id' => function () {
        return factory('App\Status')->create()->id;
      },
  ];
});

$factory->define(App\Type::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->word,
  ];
});

$factory->define(App\Device::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->words(2, true),
  ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->word,
  ];
});

$factory->define(App\Datatype::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->word,
  ];
});

$factory->define(App\Step::class, function (Faker\Generator $faker) {
  return [
      'guide_id' => function () {
        return factory('App\Guide')->create()->id;
      },
      'title' => $faker->sentence(1, true),
      'orderby' => 1,
  ];
});

$factory->define(App\Line::class, function (Faker\Generator $faker) {
  return [
      'text' => $faker->paragraph(1, true),
      'bullet' => $faker->word,
      'level' => 0,
      'orderby' => 1,
  ];
});