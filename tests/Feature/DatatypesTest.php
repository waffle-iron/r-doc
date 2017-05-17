<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatatypesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function datatypes_table_is_configured()
  {
    $datatype = create('App\Datatype');

    $this->assertDatabaseHas('datatypes', [
        'id' => $datatype->id,
        'name' => $datatype->name,
        'deleted_at' => null,
    ]);
  }
}
