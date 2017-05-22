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
    $this->relationship->testBelongsTo('Guide', 'Datatype');
  }

  /** @test */
  public function a_guide_has_one_category()
  {
    $this->relationship->testBelongsTo('Guide', 'Category');
  }

  /** @test */
  public function a_guide_has_one_type()
  {
    $this->relationship->testBelongsTo('Guide', 'Type');
  }

  /** @test */
  public function a_guide_has_one_device()
  {
    $this->relationship->testBelongsTo('Guide', 'Device');
  }

  /** @test */
  public function a_guide_belongs_to_revisions()
  {
    $this->relationship->testBelongsTo('Guide', 'Revision');
  }
  
  /** @test */
  public function a_guide_has_many_steps()
  {
    $this->relationship->testOneToMany('Guide', 'Step');
  }

  /** @test */
  public function a_guide_belongs_to_a_user()
  {
    $this->relationship->testBelongsTo('Guide', 'User');
  }
}