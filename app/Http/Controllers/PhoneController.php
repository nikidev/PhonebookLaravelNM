<?php

namespace App\Http\Controllers;

use App\User;
use App\Phone;
use App\Photo;
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

		$file = Input::file('photoName');
		

		if(file_exists($file))
		{
			$filename = uniqid() . $file->getClientOriginalName();
			$file->move('photos',$filename);
		

			$phone->photo()->create([

				'phone_id'=> $phone->id,
				'filename'=> $filename,
				'file_size'=> $file->getClientSize(),
				'file_mime'=> $file->getClientMimeType(),
				'file_path'=> 'photos/'. $filename,
				
			]);

		}

		$ids = Input::get('group');

		if(is_array($ids) || is_object($ids))
		{
			foreach ($ids as $value) {
				$phone->group()->attach(array(

		    		'group_id' => (int)$value

		    	));
			}
		}
		

		 return redirect('/home');
		 
	}

	public function viewEditPhone($id)
	{
		
        $phone = Phone::find($id);
        $this->authorize('viewEditPhone',$phone);
        $selectedGroups = [];

        foreach ($phone->group()->getResults() as $key => $value) 
        {
        	$selectedGroups[] = $value->id;
        }


   		return view('phone.edit', compact('phone', 'selectedGroups'));
	}

	public function phoneUpdate($id)
	{
		$phone = Phone::find($id);
		$ids = Input::get('group');

       	$phone->group()->detach();

       if(is_array($ids) || is_object($ids))
       {
	       	foreach ($ids as $value) {
				$phone->group()->attach(array(

		    		'group_id' => (int)$value

		    	));
			}
       }
		
		
		$file = Input::file('photoName');

		if(file_exists($file))
		{
			if(isset($phone->photo->file_path))
			{
				unlink(public_path($phone->photo->file_path));
				$phone->photo()->delete();
			}

			$filename = uniqid() . $file->getClientOriginalName();
			$file->move('photos',$filename);
						
			$phone->photo()->create([

				'phone_id'=> $phone->id,
				'filename'=> $filename,
				'file_size'=> $file->getClientSize(),
				'file_mime'=> $file->getClientMimeType(),
				'file_path'=> 'photos/'. $filename,
				
			]);
		
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

		if(isset($currentPhone->photo->file_path))
		{
		
			unlink(public_path($currentPhone->photo->file_path));
			$currentPhone->photo()->delete();
		}

		$currentPhone->delete();

		return redirect()->back();

	}
}
