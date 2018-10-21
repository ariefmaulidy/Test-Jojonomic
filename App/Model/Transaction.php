<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $table = 'transaction';

  protected $fillable = [
      'id','type','user_id','amount','date'
  ];
  public $timestamps = false;

  public function user(){
    return $this->belongsTo('App\Model\user','user_id');
  }
}
