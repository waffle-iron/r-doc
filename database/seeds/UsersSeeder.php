<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @param \Faker\Generator $faker
   * @return void
   */
    public function run(Faker\Generator $faker)
    {
        factory(App\User::class, 50)->create()->each(function ($u) use ($faker) {
          $u->image()->save(factory(App\Image::class)->make());
        });
    }
}
