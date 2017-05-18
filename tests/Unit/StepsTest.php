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

  /** @test */
  public function a_step_has_many_images()
  {
    $this->relationship->testOneToMany('Step', 'Image');
  }

  /** @test */
  public function a_step_can_have_many_lines()
  {
    $this->relationship->testOneToMany('Step', 'Line');
  }

  /** @test */
  public function a_step_belongs_to_a_guide()
  {
    $this->relationship->testBelongsTo('Step', 'Guide');
  }
}