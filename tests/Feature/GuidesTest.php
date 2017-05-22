<?php

namespace Tests\Feature;

use App\Guide;
use GuidesTestSeeder;
use StepsTestSeeder;
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
    $this->withExceptionHandling();
    $response = $this->getAGuide();
    $response->assertStatus(200);
  }

  /** @test */
  public function an_unauthenticated_user_can_retrieve_a_list_of_guides()
  {
    $response = $this->get('/api/v1/guides');
    $response->assertStatus(200);
  }

  // WHEN VIEWING A GUIDE AN UNAUTHENTICATED USER CAN...

  /** @test */
  public function see_the_guideid()
  {
    $this->guideHas(['guideid' => 1]);
  }

  /** @test */
  public function see_a_particular_guide_based_on_its_id()
  {
    $this->guideHas(['guideid' => 2], 2, 2);
  }

  /** @test */
  public function editable_is_true()
  {
    $this->guideHas(['editable' => true]);
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
  public function has_correct_revision()
  {
    $this->hasCorrect('revision');
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

  /** @test */
  public function has_correct_title()
  {
    $this->hasCorrect('title');
  }

  /** @test */
  public function has_correct_summary()
  {
    $this->hasCorrect('summary');
  }

  /** @test */
  public function has_correct_introduction()
  {
    $this->hasCorrect('introduction');
  }

  /** @test */
  public function has_correct_previous_text()
  {
    $this->hasCorrect('previous_text');
  }

  /** @test */
  public function has_correct_conclusion()
  {
    $this->hasCorrect('conclusion');
  }

  /** @test */
  public function has_correct_created_date()
  {
    $this->hasCorrect('created_date');
  }

  /** @test */
  public function has_correct_modified_date()
  {
    $this->hasCorrect('modified_date');
  }

  /** @test */
  public function has_correct_published_date()
  {
    $this->hasCorrect('published_date');
  }

  /** @test */
  public function has_correct_author_attributes()
  {
    $this->createGuide();
    $guide = Guide::find(1);
    $response = $this->get('/api/v1/guides/1');
    $response->assertJson(['author' => [
        [
            'id' => $guide->author[0]->id,
            'username' => $guide->author[0]->username,
            'url' => $guide->author[0]->url,
            'join_date' => $guide->author[0]->join_date,
            'image' => [
                [
                    'id' => $guide->author[0]->image[0]->id,
                    'original' => $guide->author[0]->image[0]->original,
                ],
            ],
            'teams' => [
                [
                    'id' => $guide->author[0]->teams[0]->id,
                    'name' => $guide->author[0]->teams[0]->name,
                ],
            ],
        ],
    ]]);
  }

  /** @test */
  public function has_correct_steps_attributes()
  {
    $this->createGuide();
    $guide = Guide::find(1);
    $response = $this->get('/api/v1/guides/1');
    $response->assertJson(['steps' => [
        [
            'id' => $guide->steps[0]->id,
            'title' => $guide->steps[0]->title,
            'guide_id' => $guide->steps[0]->guide_id,
            'revision_id' => $guide->steps[0]->revision_id,
            'lines' => [
                [
                    'text' => $guide->steps[0]->lines[0]->text,
                    'bullet' => $guide->steps[0]->lines[0]->bullet,
                    'level' => $guide->steps[0]->lines[0]->level,
                    'orderby' => $guide->steps[0]->lines[0]->orderby,
                ]
            ],
            'media' => [
                [
                    'id' => $guide->steps[0]->media[0]->id,
                    'original' => $guide->steps[0]->media[0]->original,
                    'orderby' => $guide->steps[0]->media[0]->orderby,
                ]
            ],
        ]
    ]]);
  }

  /** @test */
  public function has_correct_guide_image_data()
  {
    $guide = $this->createCompleteGuide();
    $response = $this->get('/api/v1/guides/1');
    $response->assertJson(['image' => [
        [
            'id' => $guide[0]->image[0]->id,
            'original' => $guide[0]->image[0]->original,
        ],
    ]]);
  }

//  GUIDE LISTS '/API/V1/GUIDES'

  /** @test */
  public function a_list_of_guides_outputs_correct_data()
  {
    $guides = $this->createCompleteGuide(2);
    $response = $this->get('/api/v1/guides');
    $response->assertExactJson([
        'total' => count($guides),
        'per_page' => 25,
        'current_page' => 1,
        'last_page' => 1,
        'next_page_url' => null,
        'prev_page_url' => null,
        'from' => 1,
        'to' => 2,
        'data' => [
            [
                'id' => (string)$guides[0]->id,
                'title' => $guides[0]->title,
                'url' => $guides[0]->url,
                'image' => $guides[0]->image[0]->original,
                'modified_date' => $guides[0]->updated_at->toFormattedDateString(),
                'category' => $guides[0]->category,
            ],
            [
                'id' => (string)$guides[1]->id,
                'title' => $guides[1]->title,
                'url' => $guides[1]->url,
                'image' => $guides[1]->image[0]->original,
                'modified_date' => $guides[1]->updated_at->toFormattedDateString(),
                'category' => $guides[1]->category,
            ],
        ],
    ]);

  }

  /**
   * @param int $qty
   * @param int $guideid
   * @return \Illuminate\Foundation\Testing\TestResponse
   */
  private function getAGuide($qty = 1, $guideid = 1)
  {
    $this->guides = $this->createCompleteGuide($qty);
    $response = $this->get(env('APP_URL') . "/api/v1/guides/$guideid");
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
    if ($createGuide) $this->response = $this->getAGuide($qty, $guideid);
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

  private function createGuide(): void
  {
    $this->seed(GuidesTestSeeder::class);
    $this->seed(StepsTestSeeder::class);
  }

}
