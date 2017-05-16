<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TeamTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_team_has_many_users()
  {
    $this->relationship->testManyToMany('Team', 'User');
  }
}