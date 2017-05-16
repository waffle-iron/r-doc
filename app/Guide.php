<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
  public function image()
  {
    return $this->hasOne(Image::class);
  }

  public function datatype()
  {
    return $this->hasOne(Datatype::class);
  }
}
