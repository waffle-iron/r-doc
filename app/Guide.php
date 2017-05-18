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
    return $this->belongsTo(Datatype::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function type()
  {
    return $this->belongsTo(Type::class);
  }

  public function device()
  {
    return $this->belongsTo(Device::class);
  }

  public function revision()
  {
    return $this->belongsTo(Revision::class);
  }

  public function steps()
  {
    return $this->hasMany(Step::class);
  }
}
