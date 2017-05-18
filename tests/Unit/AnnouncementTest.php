<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnnouncementTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function is_true()
  {
    $this->assertTrue(true);
  }

//  /** @test */
//  public function an_announcement_has_many_users()
//  {
//    $this->relationship->testManyToMany('Announcement', 'User');
//  }

}
