<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['user_id','other_contact_id','name'];


	public function user() 
	{
		return $this->belongsTo('App\User');
	}

	public function otherContact()
	{
		return $this->belongsTo('App\OtherContact');
	}
}
