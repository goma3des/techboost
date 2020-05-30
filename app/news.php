<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
  protected $guarded = array('id');
    //
  public static $rules = array(
    'title' => 'required',
    'body' => 'required',
  );

  public function histories()
  {
    return $this->hasMany('App\History');
  }
}
