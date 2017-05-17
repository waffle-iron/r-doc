<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_status_belongs_to_a_revision()
  {
    $this->relationship->testBelongsTo('Status', 'Revision');
  }
}