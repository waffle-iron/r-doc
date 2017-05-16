<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotificationTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function a_notification_can_have_one_user()
  {
    $notification = create('App\Notification');
    $user = create('App\User', ['notification_id' => $notification->id]);

//    ddjson($notification->user);

    $this->assertInstanceOf('App\User', $notification->user);
    $this->assertEquals(count($notification->user), 1);
  }
}
