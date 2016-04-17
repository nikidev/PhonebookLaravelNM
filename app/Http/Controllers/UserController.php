<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function viewUsersList()
    {
    	return view('users.index');
    }
}
