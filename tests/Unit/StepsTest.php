<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StepsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_step_has_many_revisions()
  {
    $this->relationship->testOneToMany('Step', 'Revision');
  }
}