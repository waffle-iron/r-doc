<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function tests_table_is_configured()
  {
    $type = create('App\Type');

    $this->assertDatabaseHas('types', [
        'id' => $type->id,
        'name' => $type->name,
        'deleted_at' => null,
    ]);
  }
}
