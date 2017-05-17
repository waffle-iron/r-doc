<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DevicesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function devices_table_is_configured()
  {
    $device = create('App\Device');

    $this->assertDatabaseHas('devices', [
      'id' => $device->id,
      'name' => $device->name,
      'deleted_at' => null,
    ]);
  }
}
