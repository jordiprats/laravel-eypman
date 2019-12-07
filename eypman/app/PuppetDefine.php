<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuppetDefine extends Model
{
  public function variables()
  {
    return $this->hasMany(PuppetVariable::class);
  }
}
