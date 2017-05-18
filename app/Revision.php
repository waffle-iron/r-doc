<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
  public function guides()
  {
    return $this->hasMany(Guide::class);
  }

  public function steps()
  {
    return $this->hasMany(Step::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }
}
