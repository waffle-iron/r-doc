<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImagesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function images_table_is_cofigured_correctly()
  {
    $image = factory(\App\Image::class)->create();

    $this->assertDatabaseHas('images', [
        'id' => 1,
        'original' => $image->original,
        'deleted_at' => null,
    ]);
  }
}
