<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  public function users()
  {
    return $this->belongsToMany(User::class);
  }

  public function image()
  {
    return $this->hasOne(Image::class);
  }
}
