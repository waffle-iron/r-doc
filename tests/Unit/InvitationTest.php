<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvitationTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function an_invitation_has_many_users()
  {
    $this->relationship->testManyToMany('Invitation', 'User');
  }
}
