<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Phone;
use App\OtherContact;
use Illuminate\Support\Facades\Input;
use App\Service;

class OtherContactsController extends Controller
{
   	public function __construct()
	{
		$this->middleware('auth');
	}

	public function viewContactsList($id)
	{
		$otherContacts = Phone::find($id)->otherContact;
		
		return view('otherContacts.index')
			->with(['phone_id' => $id, 'otherContacts' => $otherContacts])
			->with('services', Service::all());
			
	}

	public function viewCreateContact($id)
	{
		return view('otherContacts.create')
		->with(['phone_id' => $id])->with('services', Service::all());
	}

	public function contactStore()
	{
		$phone_id = Input::get('phone_id');
		$contact = OtherContact::create([

				'phone_id' => $phone_id,
				'service_id' => Input::get('service'),
				'contact' =>Input::get('contact'),

			]);
		return redirect('/contacts/' . $phone_id);
		
		
	}

	public function deleteContact($id)
	{
		$otherContact = OtherContact::findOrfail($id);
    	$otherContact->delete();	
    	return redirect()->back();
	}

	public function viewEditContact($id, $phone_id)
	{
		$otherContact = OtherContact::find($id);
		

        return view('otherContacts.edit')
            ->with('otherContact',$otherContact)
            ->with(['phone_id' => $phone_id])
            ->with('services', Service::all());
            
	}

	public function contactUpdate($id)
	{
		$phone_id = Input::get('phone_id');

		$otherContact = OtherContact::where('id',$id)->update([
				'service_id' => Input::get('service'),
				'contact' =>Input::get('contact'),
			]);

		return redirect('/contacts/' . $phone_id);
	}

}
