<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

  protected $fillable = [
     'owner_id'
  ];

  protected $hidden = [
    'pivot',
  ];

  public function users()
  {
    return $this->belongsToMany(User::class);
  }

  public function image()
  {
    return $this->hasOne(Image::class);
  }
}
