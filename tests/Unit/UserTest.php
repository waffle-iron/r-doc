<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Utilities\Relationships;

class UserTest extends TestCase
{
  use DatabaseMigrations, Relationships;

  /** @test */
  public function a_user_has_an_image()
  {
    $this->oneToOne('User', 'Image');
  }

  /** @test */
  public function a_user_can_have_many_notifications()
  {
    $this->manyToOne('Notification', 'User');
  }

}
