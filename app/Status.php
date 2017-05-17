<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  public function revision()
  {
    return $this->belongsTo(Revision::class);
  }
}
