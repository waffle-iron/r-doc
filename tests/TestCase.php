<?php

namespace Tests;

use Exception;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use function random_int;
use Tests\Utilities\TestsRelationships;

/**
 * @property ExceptionHandler|mixed oldExceptionHandler
 */
abstract class TestCase extends BaseTestCase
{
  use CreatesApplication;

  protected $relationship;

  public function __construct($name = null, array $data = [], $dataName = '')
  {
    parent::__construct($name, $data, $dataName);
    $this->relationship = new TestsRelationships($this);
  }

  protected function setUp()
  {
    parent::setUp();
    $this->disableExceptionHandling();
  }

  protected function signIn($user = null)
  {
    $user = $user ?: create('App\User');
    $this->actingAs($user);
    return $this;
  }

  protected function disableExceptionHandling()
  {
    $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

    $this->app->instance(ExceptionHandler::class, new class extends Handler
    {
      public function __construct() { }
      public function report(Exception $e) { }
      public function render($request, Exception $e) { throw $e;
      }
    });
  }

  protected function withExceptionHandling()
  {
    $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);
    return $this;
  }

  /**
   * @param int $qty
   * @return mixed
   */
  protected function createCompleteGuide($qty = 1)
  {
    $guide = factory('App\Guide', $qty)->states('complete')->create();
    $guide->each(function ($g) {
      $datatype = factory('App\Datatype')->create();
      $datatype->guides()->save($g);
      $g->update(['url' => "/guide/{$g->id}"]);
      $category = create('App\Category');
      $category->guides()->save($g);
      $type = create('App\Type');
      $type->guides()->save($g);
      $g->image()->save(create('App\Image'));
      $revision = create('App\Revision', ['owner_id' => $g->id]);
      $status = create('App\Status');
      $revision->status()->associate($status);
      $revision->guides()->save($g);
//      $this->createSteps($g);
      $g->steps()->saveMany($this->createSteps($g));
    });
//    dd($guide->steps);
    return $guide;
  }

  /**
   * @param $guide
   * @param \Faker\Generator $faker
   * @internal param int $qty
   * @return mixed
   */
  private function createSteps($guide)
  {
    $steps = factory('App\Step', random_int(7, 15))->create();
    $steps->each(function ($s, $key) use ($guide) {
      $s->update(['orderby' => $key + 1]);
      $this->createAndSaveImages($s);
      $this->saveLines($s);
      $this->createAndSaveRevision($s);
    });
    return $steps;
  }

  /**
   * @param $s
   * @internal param $bullets
   */
  private function saveLines($s)
  {
    $bullets = ['black', 'red', 'orange', 'yellow', 'green', 'light-blue', 'blue', 'violet', 'caution', 'info', 'reminder'];

    $lines = factory('App\Line', random_int(3, 8))
        ->create()
        ->each(function ($l, $key) use ($bullets) {
          $this->determineBulletLevelAndOrderby($l, $key, $bullets);
        });

    $s->lines()->saveMany($lines);
  }

  /**
   * @param $l
   * @param $key
   * @param $bullets
   */
  private function determineBulletLevelAndOrderby($l, $key, $bullets)
  {
    if ($key === 0) {
      $l->update([
          'bullet' => 'black',
          'orderby' => $key + 1,
          'level' => 0
      ]);
    } else {
      $level = 1;
      $key - 1 === 1 ? $level = random_int(0, 2) : random_int(1, 2);
      $l->update([
          'bullet' => random_int(0, count($bullets)),
          'orderby' => $key + 1,
          'level' => $level,
      ]);
    }
  }

  /**
   * @param $s
   */
  private function createAndSaveRevision($s)
  {
    $revision = factory('App\Revision')->create([
        'owner_id' => random_int(1, 50),
    ]);
    $status = create('App\Status');
    $revision->status()->associate($status);
    $revision->steps()->save($s);
  }

  /**
   * @param $s
   */
  private function createAndSaveImages($s)
  {
    $images = factory('App\Image', random_int(2, 3))->create();
    $images->each(function ($img, $key) use ($s) {
      $img->update(['orderby' => $key + 1]);
      $s->images()->save($img);
    });
  }
}