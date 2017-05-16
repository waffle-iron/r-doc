<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_user_has_an_image()
  {
    $this->relationship->testHasOne('User', 'Image');
  }

  /** @test */
  public function a_user_can_have_many_notifications()
  {
    $this->relationship->testManyToOne('Notification', 'User');
  }

  /** @test */
  public function a_user_can_have_many_announcements()
  {
      $this->relationship->testManyToMany('User', 'Announcement');
  }

  /** @test */
  public function a_user_has_many_invitations()
  {
    $this->relationship->testManyToMany('User', 'Invitation');
  }

}
