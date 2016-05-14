<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherContact extends Model
{
    protected $fillable = ['phone_id', 'service_id', 'contact'];

    public function phone() 
	{
		return $this->belongsTo('App\Phone');
	}

	public function service()
	{
		return $this->belongsTo('App\Service');
	}
}
