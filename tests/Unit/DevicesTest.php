<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DevicesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_device_belongs_to_many_guides()
  {
    $this->relationship->testBelongsTo('Device', 'Guide');
  }
}