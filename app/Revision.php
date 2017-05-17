<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
  public function guide()
  {
    return $this->belongsTo(Guide::class);
  }
}
