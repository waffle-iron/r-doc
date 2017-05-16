<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function teams_table_is_configured()
  {
    $team = create('App\Team');

    $this->assertDatabaseHas('teams', [
      'id' => $team->id,
      'owner_id' => $team->owner_id,
      'name' => $team->name,
      'slug' => $team->slug,
      'image_id' => $team->image_id,
      'deleted_at' => null,
    ]);
  }
}
