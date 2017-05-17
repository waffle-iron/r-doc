<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotificationsTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function notifications_table_is_configured_correctly()
    {
      $notification = create('App\Notification');

      $this->assertDatabaseHas('notifications', [
         'id' => 1,
        'created_by' => $notification->created_by,
        'icon' => $notification->icon,
        'body' => $notification->body,
        'action_text' => $notification->action_text,
        'action_url' => $notification->action_url,
        'read' => false,
      ]);
    }

}
