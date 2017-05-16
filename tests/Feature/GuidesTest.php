<?php

namespace Tests\Feature;

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
    $this->withExceptionHandling();
    $response1 = $this->get('/mockups');
    $response1->assertRedirect('/login');
    $response2 = $this->get('/mockups/guide');
    $response2->assertRedirect('/login');
    $response3 = $this->get('/mockups/guide/1');
    $response3->assertRedirect('/login');
    $response4 = $this->get('/adfasdfasd');
    $response4->assertRedirect('/login');
  }

  /** @test */
  public function guides_table_is_configured()
  {
    $guide = create('App\Guide');

    $this->assertDatabaseHas('guides', [
      'id' => $guide->id,
      'datatype' => $guide->datatype,
      'can_edit' => true,
      'url' => $guide->url,
      'category_id' => $guide->category_id,
      'revision' => '-',
      'revision_id' => $guide->revision_id,
      'type_id' => $guide->type_id,
      'device_id' => $guide->device_id,
      'title' => $guide->title,
      'summary' => $guide->summary,
      'introduction' => $guide->introduction,
      'image_id' => $guide->image_id,
      'previous_text' => $guide->previous_text,
      'conclusion' => $guide->conclusion,
      'obsolete' => false,
      'revised_at' => null,
      'deleted_at' => null,
    ]);
  }
}
