<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoriesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_category_belongs_to_many_guides()
  {
    $this->relationship->testOneToMany('Category', 'Guide');
  }
}