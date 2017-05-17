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

  /** @test */
  public function a_guide_has_one_category()
  {
    $this->relationship->testHasOne('Guide', 'Category');
  }

  /** @test */
  public function a_guide_has_one_type()
  {
    $this->relationship->testHasOne('Guide', 'Type');
  }

  /** @test */
  public function a_guide_has_one_device()
  {
    $this->relationship->testHasOne('Guide', 'Device');
  }

  /** @test */
  public function a_guide_has_many_revisions()
  {
    $this->relationship->testManyToMany('Guide', 'Revision');
  }
}