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
    $response = $this->get('/guides');

    $response->assertStatus(200);
  }

  /** @test */
  public function will_redirect_to_guides_when_visiting_the_homepage()
  {
    $response = $this->get('/');

    $response->assertRedirect('/guides');
  }

  /** @test */
  public function the_database_should_have_the_correct_data()
  {
    $guide = factory(App\Guide::class)->create();

    $this->assertDatabaseHas('guides', [
      'id' => $guide->id,
      'dataType' => 'guide',
      'url' => $guide->url,
      'title' => $guide->title,
      'summary' => $guide->summary,
      'introduction' => $guide->introduction,
      'previous_text' => $guide->previous_text,
      'conclusion' => $guide->conclusion,
      'revised_at' => null,
      'revision' => '-',
    ]);     
  }

  private function getGuide()
  {
    return $this->get('/guides');
  }
}
