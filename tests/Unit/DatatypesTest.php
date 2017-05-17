<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DatatypesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_datatype_belongs_to_many_guides()
  {
    $this->relationship->testBelongsTo('Datatype', 'Guide');
  }
}