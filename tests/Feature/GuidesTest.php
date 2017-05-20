<?php

namespace Tests\Feature;

use GuidesSeeder;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GuidesTest extends TestCase
{
  use DatabaseMigrations;

  private $guides;

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
      'datatype_id' => $guide->datatype_id,
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
      'previous_text' => $guide->previous_text,
      'conclusion' => $guide->conclusion,
      'obsolete' => false,
      'revised_at' => null,
      'deleted_at' => null,
    ]);
  }

  /** @test */
  public function my_test_guide_algorithm_is_generating_data_for_the_correct_tables()
  {
    $this->createCompleteGuide();

    $this->assertDatabaseHas('categories', ['id' => 1]);
    $this->assertDatabaseHas('datatypes', ['id' => 1]);
    $this->assertDatabaseHas('devices', ['id' => 1]);
    $this->assertDatabaseHas('guides', ['id' => 1]);
    $this->assertDatabaseHas('images', ['guide_id' => 1]);
    $this->assertDatabaseHas('images', ['step_id' => 1]);
    $this->assertDatabaseHas('steps', ['guide_id' => 1]);
    $this->assertDatabaseHas('lines', ['step_id' => 1]);
    $this->assertDatabaseHas('revisions', ['id' => 1]);
    $this->assertDatabaseHas('statuses', ['id' => 1]);
    $this->assertDatabaseHas('types', ['id' => 1]);
  }

  /** @test */
  public function an_unauthenticated_user_can_retrieve_a_guides_data()
  {
    $response = $this->getAGuide();

    $response->assertStatus(200);
  }

  // WHEN VIEWING A GUIDE AN UNAUTHENTICATED USER CAN...

  /** @test */
  public function see_the_guide_id()
  {
    $response = $this->getAGuide();
    $response->assertJson([
        'id' => $this->guides[0]->id,
    ]);
  }

  /** @test */
  public function see_a_particular_guide_based_on_its_id()
  {
    $response = $this->getAGuide(2, 2);
    $response->assertJson([
        'id' => 2,
    ]);
  }

  /**
   * @param int $qty
   * @return \Illuminate\Foundation\Testing\TestResponse
   */
  private function getAGuide($qty = 1, $guideid = 1): \Illuminate\Foundation\Testing\TestResponse
  {
    $this->guides = $this->createCompleteGuide($qty);
    $response = $this->get("/api/v1/guides/$guideid");
    return $response;
  }

}
