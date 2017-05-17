<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LinesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_line_belongs_to_one_step()
  {
    $this->relationship->testBelongsTo('Line', 'Step');
  }
}