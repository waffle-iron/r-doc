<?php

namespace Tests;

use Exception;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
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
      public function __construct() {}

      public function report(Exception $e) {}

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
}