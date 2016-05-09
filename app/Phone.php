<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model 
{

	protected $fillable = ['user_id', 'name', 'phone'];

	public function user() 
	{
		return $this->belongsTo('App\User');
	}


	public function group()
	{
		return $this->belongsToMany('App\Group','group_phone');
	}

	public function photo()
	{
		return $this->hasOne('App\Photo');
	}

	public function otherContact()
	{
		return $this->hasMany('App\OtherContact');
	}
}
