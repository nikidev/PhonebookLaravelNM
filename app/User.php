<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password','isAdmin'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function phone() {
		return $this->hasMany('App\Phone');
	}

	public function group() {
		return $this->hasMany('App\Group');
	}

	public function service()
	{
		return $this->hasMany('App\Service');
	}
}
