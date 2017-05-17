<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
  public function guide()
  {
    return $this->belongsTo(Guide::class);
  }

  public function step()
  {
    return $this->belongsTo(Step::class);
  }

  public function status()
  {
    return $this->hasOne(Status::class);
  }
}
