<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function users_table_is_correctly_configured()
  {
    $user = create('App\User');

    $this->assertDatabaseHas('users', [
        'id' => 1,
        'name' => $user->name,
        'username' => $user->username,
        'email' => $user->email,
//      //'team_id'
        'image_id' => $user->id,
        'url' => $user->url,
        'last_read_announcement_at' => null,
        'deleted_at' => null,
    ]);
  }
}
