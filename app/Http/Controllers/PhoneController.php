<?php

namespace App\Http\Controllers;

use App\User;
use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;
use Validator;

class PhoneController extends Controller 
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function viewPhoneList() 
	{
		return view("home");
	}

	public function viewCreatePhone()
	{
		return view('phone.create');
	}

	public function phoneStore()
	{
		$phone = Auth::user()->phone()->create([

			'user_id'=> Auth::user()->id,
			'name'=> Input::get('name'),
			'phone'=> Input::get('phone'),

		]);

		$ids = Input::get('group');

	

		foreach ($ids as $value) {
			$phone->group()->attach(array(

	    		'group_id' => (int)$value

	    	));
		}

		 return redirect('/home');
	}

	public function viewEditPhone($id)
	{
		
        $phone = Phone::find($id);
        $this->authorize('viewEditPhone',$phone);
        $selectedGroups = [];

        foreach ($phone->group()->getResults() as $key => $value) {
        	$selectedGroups[] = $value->id;
        }

   		return view('phone.edit', compact('phone', 'selectedGroups'));
	}

	public function phoneUpdate($id)
	{
		$phone = Phone::find($id);
		$ids = Input::get('group');

		foreach ($ids as $value) {
			$phone->group()->attach(array(

	    		'group_id' => (int)$value

	    	));
		}

		$phone = Phone::where('id',$id)->update([
				'name'=> Input::get('name'),
				'phone'=> Input::get('phone'),

			]);
				
		 return redirect('/home');
	}

	

	public function deletePhone($id)
	{
		$currentPhone = Phone::findOrFail($id);
		$this->authorize('deletePhone',$currentPhone);
		$currentPhone->group()->detach();
		$currentPhone->delete();

		return redirect()->back();

	}
}
