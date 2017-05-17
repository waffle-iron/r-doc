<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RevisionsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function revisions_table_is_configured()
  {
    $revision = create('App\Revision');

    $this->assertDatabaseHas('revisions', [
      'id' => $revision->id,
      'description' => $revision->description,
      'editor_id' => $revision->editor_id,
      'owner_id' => $revision->owner_id,
      'status_id' => $revision->status_id,
    ]);
  }
}
