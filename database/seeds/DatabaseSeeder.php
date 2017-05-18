<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call(TeamsSeeder::class);
    $this->call(UsersSeeder::class);
    $this->call(TypesSeeder::class);
    $this->call(StatusesSeeder::class);
    $this->call(DevicesSeeder::class);
    $this->call(CategoriesSeeder::class);
    $this->call(DatatypesSeeder::class);
    $this->call(GuidesSeeder::class);
  }
}
