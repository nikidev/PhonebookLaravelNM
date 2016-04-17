<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model {

	protected $fillable = ['user_id', 'name', 'phone'];

	public function user() {
		return $this->belongsTo('App\User');
	}
}
