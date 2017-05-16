<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ImageTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function an_image_can_have_one_user()
  {
    $this->relationship->testBelongsTo('Image', 'User');
  }

  /** @test */
  public function an_image_can_have_many_teams()
  {
    $this->relationship->testBelongsTo('Image', 'Team');
  }

  /** @test */
  public function an_image_belongs_to_guides()
  {
    $this->relationship->testBelongsTo('Image', 'Guide');
  }
}
