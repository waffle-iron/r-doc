<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GuideTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_guide_has_one_image()
  {
    $this->relationship->testHasOne('Guide', 'Image');
  }

  /** @test */
  public function a_guide_has_one_datatype()
  {
    $this->relationship->testHasOne('Guide', 'Datatype');
  }
}