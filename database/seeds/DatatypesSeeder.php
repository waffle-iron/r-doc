<?php

use Illuminate\Database\Seeder;

class DatatypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Datatype::class, 2)->create();
    }
}
