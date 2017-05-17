<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
  public function revisions()
  {
    return $this->hasMany(Revision::class);
  }

  public function images()
  {
    return $this->hasMany(Image::class);
  }

  public function lines()
  {
    return $this->hasMany(Line::class);
  }
}
