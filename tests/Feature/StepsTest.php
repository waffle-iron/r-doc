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

  }

}
