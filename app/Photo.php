<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['phone_id','file_name','file_size','file_mime','file_path'];
	
	public function phone()
	{
		return $this->belongsTo('App\Phone');
	}
}
