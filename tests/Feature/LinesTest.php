<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LinesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function lines_table_is_configured()
  {
    $line = create('App\Line');

    $this->assertDatabaseHas('lines', [
      'id' => $line->id,
      'text' => $line->text,
      'deleted_at' => null,
    ]);
  }

}
