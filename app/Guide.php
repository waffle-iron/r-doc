<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
  protected $fillable = [
    'url'
  ];

  protected $hidden = [
    'deleted_at',
    'revised_at',
    'datatype_id',
    'category_id',
    'obsolete',
    'type_id',
    'device_id',
  ];

  protected $appends = [
    'datatype',
    'category',
    'type',
    'device',
  ];

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

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function getDatatypeAttribute()
  {
    $datatype = $this->datatype()->get();
    return $datatype[0]->name;
  }

  public function getCategoryAttribute()
  {
    $category = $this->category()->get();
    return $category[0]->name;
  }

  public function getTypeAttribute()
  {
    $type = $this->type()->get();
    return $type[0]->name;
  }

  public function getDeviceAttribute()
  {

    $device = $this->device()->get();
    return $device[0]->name;
  }
}
