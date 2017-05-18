<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  public function revisions()
  {
    return $this->HasMany(Revision::class);
  }
}
