<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table = 'user';

  protected $fillable = [
      'id','first_name','last_name','email','account', 'company_id'
  ];
  public $timestamps = false;

  public function company(){
    return $this->belongsTo('App\Model\company','company_id');
  }
}
