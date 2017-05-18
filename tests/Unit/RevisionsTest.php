<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RevisionsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_revision_has_many_guides()
  {
    $this->relationship->testOneToMany('Revision', 'Guide');
  }

  /** @test */
  public function a_revision_has_many_steps()
  {
    $this->relationship->testOneToMany('Revision', 'Step');
  }

  /** @test */
  public function a_revision_belongs_to_status()
  {
    $this->relationship->testBelongsTo('Revision', 'Status');
  }
}