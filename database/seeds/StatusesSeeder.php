<?php

use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;

        factory(App\Status::class, 7)->create()->each(function ($s) use (&$i) {
          $s->update(['orderby' => $i]);
          $i++;
        });
    }
}
