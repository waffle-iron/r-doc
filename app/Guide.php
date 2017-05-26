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
      'created_at',
      'id',
      'updated_at',
      'published_at',
  ];

  protected $appends = [
      'author',
      'category',
      'created_date',
      'datatype',
      'device',
      'editable',
      'guideid',
      'image',
      'modified_date',
      'published_date',
      'steps',
      'type',
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
    return !!$this->can_edit;
  }

  public function getAuthorAttribute()
  {
    $user = $this->user()->get(['id', 'username', 'url', 'created_at']);
    return $user;
  }

  public function getImageAttribute()
  {
    $image = $this->image()->get(['original']);
    return $image[0];
  }

  public function getCreatedDateAttribute()
  {
    return $this->created_at->toFormattedDateString();
  }

  public function getGuideidAttribute()
  {
    return $this->id;
  }

  public function getModifiedDateAttribute()
  {
    return $this->updated_at->toFormattedDateString();
  }

  public function getPublishedDateAttribute()
  {
    if ($this->published_at) return $this->published_at->toFormattedDateString();
    return $this->published_at;
  }

  public function getStepsAttribute()
  {
    $steps = $this->steps()->get(['id', 'guide_id', 'title', 'revision_id']);
    return $steps;
  }
}
