<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
  protected $fillable = [
    'bullet',
    'orderby',
    'level'
  ];

  public function step()
  {
    return $this->belongsTo(Step::class);
  }
}
