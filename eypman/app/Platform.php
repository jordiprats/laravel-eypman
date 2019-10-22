<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function platforms()
  {
    return $this->hasMany(Platform::class);
  }
}
