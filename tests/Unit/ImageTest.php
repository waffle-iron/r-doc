<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImageTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function an_image_can_have_one_user()
  {
    $this->relationship->testBelongsTo('Image', 'User');
  }
}
