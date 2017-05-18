<?php

use Illuminate\Database\Seeder;

class GuidesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker\Generator $faker)
  {
    factory(App\Guide::class, 200)->create()->each(function ($g) use ($faker) {
      $datatype = App\Datatype::find($faker->numberBetween(1,5));
      $datatype->guides()->save($g);
      $g->update(['url' => '/guide/' . $g->id]);
      $category = App\Category::find($faker->numberBetween(1, 25));
      $category->guides()->save($g);
      $type = App\Type::find($faker->numberBetween(1, 10));
      $type->guides()->save($g);
      $device = App\Device::find($faker->numberBetween(1, 50));
      $device->guides()->save($g);
      $g->image()->save(factory(App\Image::class)->make());
      $g->update([
          'title' => $faker->title,
          'summary' => $faker->paragraph,
          'introduction' => $faker->paragraph,
          'previous_text' => $faker->title,
          'conclusion' => $faker->paragraph,
      ]);
    });
  }
}
