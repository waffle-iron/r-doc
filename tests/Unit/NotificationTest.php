<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Utilities\Relationships;

class NotificationTest extends TestCase
{
  use DatabaseMigrations, Relationships;

  /** @test */
  public function a_notification_can_have_one_user()
  {
    $this->oneToOne('Notification', 'User');
  }
}
