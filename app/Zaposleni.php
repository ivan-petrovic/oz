<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zaposleni extends Model
{
  /*
  * Svaki zaposleni pripada jednoj firmi
  *
  * @return Illuminate\Database\Eloquent\Relations\HasMany
  */
  public function firma()
  {
    return $this->belongsTo('App\Firma');
  }
}
