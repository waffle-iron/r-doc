<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
  public function revision()
  {
    return $this->belongsTo(Revision::class);
  }

  public function images()
  {
    return $this->hasMany(Image::class);
  }

  public function lines()
  {
    return $this->hasMany(Line::class);
  }

  public function guide()
  {
    return $this->belongsTo(Guide::class);
  }
}
