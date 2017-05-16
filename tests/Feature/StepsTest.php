<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StepsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function steps_table_is_configured()
  {
    $step = create('App\Step');

    $this->assertDatabaseHas('steps', [
      'id' => $step->id,
    'guide_id' => $step->guide_id,
      'title' => $step->title,
      'orderby' => $step->orderby,
      'revision_id' => $step->revision_id,
      'revised_at' => null,
      'deleted_at' => null,
    ]);
  }

}
