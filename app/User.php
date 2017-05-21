<?php

namespace App;

use App\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function image() {
    return $this->hasOne(Image::class);
  }

  public function notifications() {
    return $this->hasMany(Notification::class);
  }

  public function announcements() {
    return $this->belongsToMany(Announcement::class);
  }

  public function invitations() {
    return $this->belongsToMany(Invitation::class);
  }

  public function teams()
  {
    return $this->belongsToMany(Team::class);
  }

  public function guides()
  {
    return $this->hasMany(Guide::class);
  }
}
