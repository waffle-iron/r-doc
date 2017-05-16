<?php

namespace Tests\Utilities;

use function strtolower;

trait Relationships
{
  public function oneToOne($first, $second)
  {
    $lowerFirst = $this->lower($first);
    $lowerSecond = $this->lower($second);

    $one = create("App\\$first", ["{$lowerSecond}_id" => null]);
    $two = create("App\\$second", ["{$lowerFirst}_id" => 1]);

    $this->assertInstanceOf("App\\$second", $one->$lowerSecond);
    $this->assertCount(count($first->$lowerSecond), 1);
  }

  public function manyToOne($many, $one)
  {
    $lowerMany = $this->lower($many);
    $lowerOne = $this->lower($one);
    $pluralMany = $this->plural($lowerMany);

    $first = create("App\\$one");
    $second = create("App\\$many", ["{$lowerOne}_id" => $first->id], 10);

    $second->each(function($s, $key) use ($lowerMany, $lowerOne, $one, $second) {
      $this->assertInstanceOf("App\\$one", $s->$lowerOne);
    });
    $this->assertEquals(count($first->$pluralMany), 10);
  }

  private function lower($string)
  {
    return strtolower($string);
  }

  private function plural($string, $suffix = 's')
  {
    return "$string$suffix";
  }
}