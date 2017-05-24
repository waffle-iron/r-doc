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
        factory(App\User::class, 5)->create()->each(function ($u) use ($faker) {
          $team = App\Team::find($faker->numberBetween(1, 2));
          $u->teams()->save($team);
          $u->image()->save(factory(App\Image::class)->make());
        });
    }
}
