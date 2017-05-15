<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  protected function user() {
      return $this->belongsTo('App\User');
    }
}
