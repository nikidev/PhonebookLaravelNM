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
		
		$phone = Phone::find($id);

		$otherContacts = $phone->otherContact;

		$this->authorize('viewContactsList',$phone);
		
		return view('otherContacts.index')
			->with(['phone_id' => $id, 'otherContacts' => $otherContacts])
			->with('services', Service::all())
			->with('phone',$phone);
			
	}

	public function viewCreateContact($id)
	{
		return view('otherContacts.create')
		->with(['phone_id' => $id])->with('services', Service::all());
	}

	public function contactStore(Request $request)
	{

		$this->validate($request,[
				'service'  => 'numeric',
				'contact' => 'required|Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/',
				
			]);

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
		//$this->authorize('deleteContact',$otherContact);
    	$otherContact->delete();	
    	return redirect()->back();
	}

	public function viewEditContact($id, $phone_id)
	{
		$otherContact = OtherContact::find($id);

		//$this->authorize('viewEditContact',$otherContact,$phone_id);

        return view('otherContacts.edit')
            ->with('otherContact',$otherContact)
            ->with(['phone_id' => $phone_id])
            ->with('services', Service::all());
            
	}

	public function contactUpdate($id,Request $request)
	{
		$this->validate($request,[
				'service'  => 'numeric',
				'contact' => 'required|Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/',
				
		]);

		$phone_id = Input::get('phone_id');

		$otherContact = OtherContact::where('id',$id)->update([
				'service_id' => Input::get('service'),
				'contact' =>Input::get('contact'),
			]);

		return redirect('/contacts/' . $phone_id);
	}

}
