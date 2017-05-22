<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = [
    'orderby'
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function team()
  {
    return $this->belongsTo(Team::class);
  }

  public function guide()
  {
    return $this->belongsTo(Guide::class);
  }

  public function step()
  {
    return $this->belongsTo(Step::class);
  }
}
