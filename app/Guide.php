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
    'can_edit',
    'user_id',
  ];

  protected $appends = [
    'datatype',
    'category',
    'type',
    'device',
    'editable',
    'author'
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
    return $this->datatype()->get()[0]->name;
  }

  public function getCategoryAttribute()
  {
    return $this->category()->get()[0]->name;
  }

  public function getTypeAttribute()
  {
    return $this->type()->get()[0]->name;
  }

  public function getDeviceAttribute()
  {

    return $this->device()->get()[0]->name;
  }

  public function getEditableAttribute()
  {
    return !! $this->can_edit;
  }

  public function getAuthorAttribute()
  {
    $userid = $this->user()->get()->first()->id;
    $user = User::where('id', $userid)->first(['id', 'username', 'url', 'created_at']);
    return $user;
  }
}
