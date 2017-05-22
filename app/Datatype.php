<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datatype extends Model
{

  protected $hidden = [
    'id',
    'deleted_at',
    'created_at',
    'updated_at',
  ];

  public function guides()
  {
    return $this->hasMany(Guide::class);
  }
}
