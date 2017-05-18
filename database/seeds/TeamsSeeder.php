<?php

use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 15)->create([
            'owner_id' => random_int(1, 50)
        ])->each(function ($t) {
          $t->image()->save(factory(App\Image::class)->make());
        });
    }
}
