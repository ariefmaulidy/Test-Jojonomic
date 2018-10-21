<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company_budget extends Model
{
  protected $table = 'company_budget';

  protected $fillable = [
      'id','company_id','amount'
  ];
  public $timestamps = false;

  public function company(){
    return $this->belongsTo('App\Model\company','company_id');
  }
}
