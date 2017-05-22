<?php

use App\Category;
use App\Datatype;
use App\Device;
use App\Guide;
use App\Image;
use App\Revision;
use App\Status;
use App\Team;
use App\Type;
use App\User;
use Illuminate\Database\Seeder;

class GuidesTestSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @param \Faker\Generator $faker
   * @return void
   */
    public function run(Faker\Generator $faker)
    {
      $g = factory(Guide::class)->create();
      $datatype = factory(Datatype::class)->create();
      $datatype->guides()->save($g);
      $g->update(['url' => env('APP_URL') . '/guide/' . $g->id]);
      $category = factory(Category::class)->create();
      $category->guides()->save($g);
      $type = factory(Type::class)->create();
      $type->guides()->save($g);
      $device = factory(Device::class)->create();
      $device->guides()->save($g);
      $user = factory(User::class)->create();
      $user->image()->save(factory(Image::class)->create());
      $team = factory(Team::class)->create();
      $user->teams()->save($team);
      $user->guides()->save($g);
      $g->image()->save(factory(Image::class)->make());
      $g->update([
          'title' => $faker->sentence,
          'summary' => $faker->paragraph,
          'introduction' => $faker->paragraph,
          'previous_text' => $faker->sentence,
          'conclusion' => $faker->paragraph,
      ]);
      $revision = factory(Revision::class)->create([
          'owner_id' => $faker->numberBetween(1, 50),
      ]);
      $status = factory(Status::class)->create();
      $revision->status()->associate($status);
      $revision->guides()->save($g);
    }
}
