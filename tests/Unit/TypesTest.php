<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TypesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_type_belongs_to_many_guides()
  {
    $this->relationship->testOneToMany('Type', 'Guide');
  }
}