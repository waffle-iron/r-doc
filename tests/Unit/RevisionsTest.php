<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RevisionsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_revision_has_one_guide()
  {
  }
}