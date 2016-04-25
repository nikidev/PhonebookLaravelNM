<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['user_id','name'];


	public function user() 
	{
		return $this->belongsTo('App\User');
	}

	public function phone()
	{
		return $this->belongsToMany('App\Phone','group_phone');
	}
}