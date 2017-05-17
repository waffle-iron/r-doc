<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvitationsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function invitations_table_is_configured()
  {
    $invitations = create('App\Invitation');

    $this->assertDatabaseHas('invitations', [
      'id' => $invitations->id,
      'team_id' => $invitations->team_id,
      'user_id' => $invitations->user_id,
      'email' => $invitations->email,
      'token' => $invitations->token,
      'deleted_at' => null,
    ]);
  }
}
