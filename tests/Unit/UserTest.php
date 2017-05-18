<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_user_has_an_image()
  {
    $this->relationship->testHasOne('User', 'Image');
  }

  /** @test */
  public function a_user_can_belong_to_many_teams()
  {
    $this->relationship->testManyToMany('User', 'Team');
  }
}
