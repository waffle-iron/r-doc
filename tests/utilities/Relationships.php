<?php

namespace Tests\Utilities;

use function strtolower;

trait Relationships
{
  public function manyToOne($many, $one)
  {
    $lowerMany = strtolower($many);
    $lowerOne = strtolower($one);
    $pluralMany = "{$lowerMany}s";

    $first = create("App\\$one");
    $second = create("App\\$many", ["{$lowerOne}_id" => $first->id], 10);

    $this->assertCount(10, $first->$pluralMany);
  }
}