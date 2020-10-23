<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['title'];


     public function student(){
    	return $this-> hasMany('App\Student');
    }
    public function registration(){
      return $this-> belongsTo(Registration::class);
    }
}
