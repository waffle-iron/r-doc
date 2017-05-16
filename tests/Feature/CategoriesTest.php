<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoriesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function categories_table_is_configured()
  {
    $category = create('App\Category');

    $this->assertDatabaseHas('categories', [
      'id' => $category->id,
      'name' => $category->name,
      'deleted_at' => null,
    ]);
  }

}
