<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_user_has_an_image()
  {
    $user = create('App\User', ['image_id' => null]);
    $image = create('App\Image', ['user_id' => 1]);

    $this->assertInstanceOf('App\Image', $user->image);
  }

}
