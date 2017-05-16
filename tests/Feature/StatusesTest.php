<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function statuses_table_is_configured()
  {
    $status = create('App\Status');

    $this->assertDatabaseHas('statuses', [
      'id' => $status->id,
      'name' => $status->name,
      'deleted_at' => null,
    ]);
  }
}
