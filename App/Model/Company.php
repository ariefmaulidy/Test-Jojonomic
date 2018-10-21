<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $table = 'company';

  protected $fillable = [
      'id','name','address'
  ];
  public $timestamps = false;

  public function user(){
    return $this->hasMany('App\Model\user');
  }
  public function budget(){
    return $this->hasOne('App\Model\company_budget');
  }
}
