<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function viewUsersList()
    {
    	return view('users.index')
			->with('users', User::all());
    }

    public function deleteUser($id)
    {
    	$currentUser = User::findOrfail($id);
    	$currentUser->phone()->delete();
        $currentUser->group()->delete();
    	$currentUser->delete();	
    	return redirect()->back();
    }

    public function viewEditUser($id)
    {
        $user = User::find($id);

        $selectedRole = [];

        /*foreach ($user->getResults() as $key => $value) 
        {
            $selectedRole[] = $value->id;
        }*/

        return view('users.edit',compact('selectedRole'))
            ->with('user',$user);
    }

    public function userUpdate($id)
    {
        $user = User::where('id',$id)->update([
                'name'=> Input::get('name'),
                'isAdmin'=>Input::get('isAdmin'),
            ]);
        
         return redirect('/users');
    }

    public function viewCreateUser()
    {
        return view('users.create');
    }

    public function userStore()
    {
        $user = User::create([

            'name'=> Input::get('name'),
            'email'=>Input::get('email'),
            'password'=>bcrypt(Input::get('password')),
            'isAdmin'=>Input::get('isAdmin'),

        ]);


         return redirect('/users');
    }
}
