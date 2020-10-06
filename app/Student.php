<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'phone_number', 'email','roll','reg_id','department_id','father_name','mother_name','cgpa', 'user_id'];




    public function department(){
    	return $this-> belongsTo('App\Department');
    }

     public function classes(){
    	return $this-> belongsTo('App\Classes');
    }

    public function user(){
      return $this-> belongsTo('App\User');
    }

    public function getId()
	{
  		return $this->id;
	}
}

