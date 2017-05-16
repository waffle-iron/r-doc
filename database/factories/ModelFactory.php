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
        return factory('App\Image')->create()->id;
      },
      'email' => $faker->unique()->safeEmail,
      'team_id' => function () {
//        return factory('App\Team')->create()->owner_id;
      },
      'password' => $password ?: $password = bcrypt('secret'),
      'remember_token' => str_random(10),
      'url' => $faker->url,
  ];
});

$factory->define(App\Guide::class, function (Faker\Generator $faker) {

  return [
      'datatype' => function () {
        return factory('App\Datatype')->create()->id;
      },
      'url' => $faker->url(),
      'category_id' => function () {
        return factory('App\Category')->create()->id;
      },
      'revision_id' => function () {
        return factory('App\Revision')->create()->id;
      },
      'type_id' => function () {
        return factory('App\Type')->create()->id;
      },
      'device_id' => function () {
        return factory('App\Device')->create()->id;
      },
      'title' => $faker->words(5, true),
      'summary' => $faker->paragraph(1, true),
      'introduction' => $faker->paragraph(1, true),
      'image_id' => function () {
        return factory('App\Image')->create()->id;
      },
      'previous_text' => $faker->sentence(1, true),
      'conclusion' => $faker->paragraph(1, true),
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
      'name' => $faker->name,
  ];
});

$factory->define(App\Device::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->name,
  ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->name,
  ];
});

$factory->define(App\Datatype::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->name,
  ];
});

$factory->define(App\Step::class, function (Faker\Generator $faker) {
  return [
      'guide_id' => function () {
        return factory('App\Guide')->create()->id;
      },
      'title' => $faker->sentence(1, true),
      'orderby' => 1,
      'revision_id' => function () {
        return factory('App\Revision')->create()->id;
      },
  ];
});

$factory->define(App\Line::class, function (Faker\Generator $faker) {
  return [
      'steps_id' => function () {
        return factory('App\Step')->create()->id;
      },
      'text' => $faker->paragraph(1, true),
      'bullet' => $faker->word,
      'level' => 0,
      'orderby' => 1,
  ];
});