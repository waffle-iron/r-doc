<?php

use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        factory(App\Team::class, 15)->create()->each(function ($t) use ($faker) {
          $t->image()->save(factory(App\Image::class)->make());
          $t->update(['owner_id' => $faker->numberBetween(1, 50)]);
        });
    }
}
