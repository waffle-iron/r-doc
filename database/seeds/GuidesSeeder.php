<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class GuidesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker\Generator $faker)
  {
    factory(App\Guide::class, 50)->create()->each(function ($g) use ($faker) {
      $user = App\User::find($faker->numberBetween(1, 5));
      $g->user()->associate($user);
      $datatype = App\Datatype::find($faker->numberBetween(1, 2));
      $datatype->guides()->save($g);
      $g->update(['url' => '/guide/' . $g->id]);
      $category = App\Category::find($faker->numberBetween(1, 3));
      $category->guides()->save($g);
      $type = App\Type::find($faker->numberBetween(1, 3));
      $type->guides()->save($g);
      $device = App\Device::find($faker->numberBetween(1, 2));
      $device->guides()->save($g);
      $g->image()->save(factory(App\Image::class)->make());
      $g->update([
          'title' => $faker->sentence,
          'summary' => $faker->paragraph,
          'introduction' => $faker->paragraph,
          'previous_text' => $faker->sentence,
          'conclusion' => $faker->paragraph,
      ]);
      $revision = factory(App\Revision::class)->create([
          'owner_id' => $faker->numberBetween(1, 5),
      ]);
      $status = App\Status::find(1);
      $revision->status()->associate($status);
      $revision->guides()->save($g);
    });
  }
}
