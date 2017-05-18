<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnnouncementsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function is_true()
  {
    $this->assertTrue(true);
  }

//  /** @test */
//  public function announcements_table_is_configured()
//  {
//    $announcements = create('App\Announcement');
//
//    $this->assertDatabaseHas('announcements', [
//      'id' => $announcements->id,
//      'user_id' => $announcements->user_id,
//      'body' => $announcements->body,
//      'action_text' => $announcements->action_text,
//      'action_url' => $announcements->action_url,
//    ]);
//  }
}
