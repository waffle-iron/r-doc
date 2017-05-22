<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
  protected $fillable = [
    'orderby'
  ];

  protected $appends = [
      'lines',
      'media',
  ];

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

  public function getLinesAttribute()
  {
    return $this->lines()->get(['text', 'bullet', 'level', 'orderby']);
  }

  public function getMediaAttribute()
  {
    return $this->images()->get(['id', 'original', 'orderby']);
  }
}
