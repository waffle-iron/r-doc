<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RevisionsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_revision_can_belong_to_one_guide()
  {
    $this->relationship->testBelongsTo('Revision', 'Guide');
  }

  /** @test */
  public function a_revision_can_belong_to_one_step()
  {
    $this->relationship->testBelongsTo('Revision', 'Step');
  }

  /** @test */
  public function a_revision_has_one_status()
  {
    $this->relationship->testHasOne('Revision', 'Status');
  }
}