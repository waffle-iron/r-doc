<?php

namespace Tests\Utilities;

class TestsRelationships
{
  private $test;

  public function __construct($test)
  {
    $this->test = $test;
  }

  public function testHasOne($first, $second)
  {
    $lowerSecond = $this->lower($second);

    $one = create("App\\$first");
    $two = create("App\\$second");

    $one->$lowerSecond()->save($two);

    $this->test->assertInstanceOf("App\\$second", $one->$lowerSecond);
    $this->test->assertEquals(count($one->$lowerSecond), 1);
  }

  public function testBelongsTo($first, $second)
  {
    $lowerSecond = $this->lower($second);

    $one = create("App\\$first");
    $two = create("App\\$second");

    $one->$lowerSecond()->associate($two);

    $this->test->assertInstanceOf("App\\$second", $one->$lowerSecond);
    $this->test->assertEquals(count($one->$lowerSecond), 1);
  }

  public function testManyToOne($many, $one)
  {
    $lowerMany = $this->lower($many);
    $lowerOne = $this->lower($one);
    $pluralMany = $this->plural($lowerMany);

    $first = create("App\\$one");
    $second = create("App\\$many", [], 10);

    $first->$pluralMany()->saveMany($second);

    $second->each(function($s, $key) use ($lowerMany, $lowerOne, $one, $second) {
      $this->test->assertInstanceOf("App\\$one", $s->$lowerOne);
    });
    $this->test->assertEquals(count($first->$pluralMany), 10);
  }

  public function testManyToMany($first, $second) {
    $lowerFirst = $this->lower($first);
    $lowerSecond = $this->lower($second);
    $secondPlural = $this->plural($lowerSecond);

    $one = create("App\\$first");
    $two = create("App\\$second", [], 10);

    $this->test->assertEquals(count($two), 10);

    $one->$secondPlural()->saveMany($two);

    $this->test->assertDatabaseHas($this->alphebetize($lowerFirst, $lowerSecond), ["{$lowerFirst}_id" => $one->id]);
    $two->each(function($t) use ($lowerFirst, $lowerSecond) {
      $this->test->assertDatabaseHas($this->alphebetize($lowerFirst, $lowerSecond), ["{$lowerSecond}_id" => $t->id]);
    });
    $this->test->assertInstanceOf("App\\$second", $one->$secondPlural->first());
    $this->test->assertEquals(count($one->$secondPlural), 10);
  }

  private function lower($string)
  {
    return strtolower($string);
  }

  private function plural($string, $suffix = 's')
  {
    return "$string$suffix";
  }

  private function alphebetize($first, $second)
  {
    $arr = [$first, $second];

    sort($arr);

    return "$arr[0]_$arr[1]";
  }


}