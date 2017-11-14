<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
  /*
   * The attributes that are mass assignable
   *
   * @var array
   */
  protected $fillable = [
    'naziv', 'adresa', 'mesto', 'telefon',
    'tip', 'status', 'matbr', 'pib',
    'sifdel', 'ziro_racun', 'naziv_banke'
  ];

  /*
   * Svaka firma ima jednog ili vise zaposlenih (ili nula na pocetku)
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function zaposlenis()
  {
    return $this->hasMany('App\Zaposleni');
  }
}
