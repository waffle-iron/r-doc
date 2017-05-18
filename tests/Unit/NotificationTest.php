<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotificationTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function is_true()
  {
    $this->assertTrue(true);
  }

//  /** @test */
//  public function a_notification_can_have_one_user()
//  {
//    $this->relationship->testBelongsTo('Notification', 'User');
//  }
}
