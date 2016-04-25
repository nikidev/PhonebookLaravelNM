<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
   public function __construct()
   {
   	 $this->middleware('auth');
   }

   public function viewProfileEdit($id)
   {
   		 $user = User::find($id);
          $this->authorize('viewProfileEdit',$user);

        return view('profile.edit')
            ->with('user',$user);
   }

   public function profileUpdate($id)
   {
      $user = User::where('id',$id)->update([
                'name'=> Input::get('name'),
                'email'=>Input::get('email'),
                'password'=>bcrypt(Input::get('password')),
            ]);

      \Session::flash('flash_message','Profile updated successfully !');
        
         return redirect('profile/edit/'.Auth::user()->id);
   }
}
