<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_status_has_many_revisions()
  {
    $this->relationship->testOneToMany('Status', 'Revision');
  }
}