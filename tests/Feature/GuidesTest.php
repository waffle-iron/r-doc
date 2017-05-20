<?php

namespace Tests\Feature;

use const false;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GuidesTest extends TestCase
{
  use DatabaseMigrations;

  private $guides;
  private $response;

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
    $this->guideHas(['id' => 1]);
  }

  /** @test */
  public function see_a_particular_guide_based_on_its_id()
  {
    $this->guideHas(['id' => 2], 2, 2);
  }

  /** @test */
  public function can_edit_is_true()
  {
    $this->guideHas(['can_edit' => true]);
  }
  
  /** @test */
  public function has_the_correct_guide_url()
  {
    $this->guideHas(['url' => 'http://r-doc.dev/guide/1']);
  }
  
  /** @test */
  public function has_the_correct_datatype()
  {
    $this->hasCorrect('datatype');
  }

  /** @test */
  public function has_the_correct_category()
  {
    $this->hasCorrect('category');
  }

  /** @test */
  public function has_a_revision_id()
  {
    $this->hasCorrect('revision_id');
  }

  /** @test */
  public function has_the_correct_type()
  {
    $this->hasCorrect('type');
  }

  /** @test */
  public function has_the_correct_device()
  {
    $this->hasCorrect('device');
  }

  /**
   * @param int $qty
   * @param int $guideid
   * @return \Illuminate\Foundation\Testing\TestResponse
   */
  private function getAGuide($qty = 1, $guideid = 1)
  {
    $this->guides = $this->createCompleteGuide($qty);
    $response = $this->get("/api/v1/guides/$guideid");
    return $response;
  }

  /**
   * @param $attribute
   * @param int $qty
   * @param int $guideid
   * @param bool $createGuide
   */
  private function guideHas($attribute, $qty = 1, $guideid = 1, $createGuide = true)
  {
    if($createGuide) $this->response = $this->getAGuide($qty, $guideid);
    $this->response->assertJson($attribute);
  }

  /**
   * @param $attribute
   */
  private function hasCorrect($attribute)
  {
    $this->response = $this->getAGuide();
    $x = $this->guides[0]->$attribute;
    $this->guideHas([$attribute => $x], 1, 1, false);
  }

}
