<?php

use Illuminate\Database\Seeder;

class StepsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker\Generator $faker)
  {
    $bullets = [
        'black',
        'red',
        'orange',
        'yellow',
        'green',
        'light-blue',
        'blue',
        'violet',
        'caution',
        'info',
        'reminder',
    ];

    for ($i = 1; $i <= 200; $i++) {
      $steps = factory(App\Step::class, $faker->numberBetween(7, 15))->create();
      $steps->each(function ($s, $key) use ($i, $faker, $bullets) {
        $s->update(['orderby' => $key+1]);
        $images = factory(App\Image::class, $faker->numberBetween(2, 3))->create();
        $images->each(function ($img, $key) use ($s) {
          $img->update(['orderby' => $key + 1]);
          $s->images()->save($img);
        });
        $guide = App\Guide::find($i);
        $guide->steps()->save($s);
        $lines = factory(App\Line::class, $faker->numberBetween(3, 8))->create()->each(function ($l, $key) use ($faker, $bullets) {
          if($key === 0) {
            $l->update([
                'bullet' => 'black',
                'orderby' => $key+1,
                'level' => 0
            ]);
          } else {
            $level = 1;
            $key-1 === 1 ? $level = $faker->numberBetween(0,2) : $faker->numberBetween(1, 2);
            $l->update([
                'bullet' => $faker->randomElement($bullets),
                'orderby' => $key+1,
                'level' => $level,
            ]);
          }
        });
        $s->lines()->saveMany($lines);
        $revision = factory(App\Revision::class)->create([
            'owner_id' => $faker->numberBetween(1, 50),
        ]);
        $status = App\Status::find(1);
        $revision->status()->associate($status);
        $revision->steps()->save($s);
      });

    }
  }
}
