<?php

namespace Tests\Feature;

use App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GuidesTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function can_view_a_list_of_guides()
  {
    $response = $this->get('/mockups/guide/0');

    $response->assertStatus(200);
  }

  /** @test */
  public function will_redirect_to_mockup_when_visiting_the_homepage()
  {
    $response = $this->get('/');

    $response->assertRedirect('/mockups/guide/0');
  }

  /** @test */
  public function redirects_to_login_page_when_trying_to_visit_non_mockup_related_urls()
  {
    $response1 = $this->get('/mockups');
    $response2 = $this->get('/mockups/guide');
    $response3 = $this->get('/mockups/guide/1');
    $response4 = $this->get('/adfasdfasd');

    $response1->withExceptionHandling()->assertRedirect('/login');
    $response2->withExceptionHandling()->assertRedirect('/login');
    $response3->withExceptionHandling()->assertRedirect('/login');
    $response4->withExceptionHandling()->assertRedirect('/login');
  }
}
