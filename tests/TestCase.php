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
      public function __construct()
      {
      }

      public function report(Exception $e)
      {
      }

      public function render($request, Exception $e)
      {
        throw $e;
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
      $g->update(['url' => "{env('APP_URL')}/guide/{$g->id}"]);
      $category = create('App\Category');
      $category->guides()->save($g);
      $type = create('App\Type');
      $type->guides()->save($g);
      $g->image()->save(create('App\Image'));
      $revision = create('App\Revision', ['owner_id' => $g->id]);
      $status = create('App\Status');
      $revision->status()->associate($status);
      $revision->guides()->save($g);
      $g->steps()->saveMany($this->createSteps($g));
    });
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
    $bullets = [
        'black',
        'red',
        'orange',
        'yellow',
        'green',
        'light-blue',
        'blue',
        'violet',
        'caution',
        'info',
        'reminder'
    ];

    $steps = factory('App\Step', random_int(7, 15))->create();
    $status = make('App\Status');
    $steps->each(function ($s, $key) use ($guide, $bullets, $status) {
      $s->update(['orderby' => $key + 1]);
      $images = factory('App\Image', random_int(2, 3))->create();
      $images->each(function ($img, $key) use ($s) {
        $img->update(['orderby' => $key + 1]);
        $s->images()->save($img);
      });
      $lines = factory('App\Line', random_int(3, 8))->create();
      $lines->each(function ($l, $key) use ($bullets) {
            if ($key === 0) {
              $l->update([
                  'bullet' => 'black',
                  'orderby' => $key + 1,
                  'level' => 0
              ]);
            } else {
              $key - 1 === 1 ? $level = random_int(0, 2) : $level = random_int(1, 2);
              $l->update([
                  'bullet' => $bullets[random_int(8, 10)],
                  'orderby' => $key + 1,
                  'level' => $level,
              ]);
            }
          });
      $s->lines()->saveMany($lines);
      $revision = factory('App\Revision')->create([
          'owner_id' => random_int(1, 50),
      ]);
      $revision->status()->associate($status);
      $revision->steps()->save($s);
    });
    return $steps;
  }
}