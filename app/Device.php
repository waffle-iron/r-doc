<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
  public function guides()
  {
    return $this->hasMany(Guide::class);
  }
}
