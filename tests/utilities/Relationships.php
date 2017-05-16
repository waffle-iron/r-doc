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
  }

  public function manyToOne($many, $one)
  {
    $lowerMany = $this->lower($many);
    $lowerOne = $this->lower($one);
    $pluralMany = $this->plural($lowerMany);

    $first = create("App\\$one");
    $second = create("App\\$many", ["{$lowerOne}_id" => $first->id], 10);

    $this->assertCount(10, $first->$pluralMany);
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