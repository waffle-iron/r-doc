<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datatype extends Model
{
  public function guide()
  {
    return $this->belongsTo(Guide::class);
  }
}
