<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Phone;
use App\OtherContact;

class OtherContactsController extends Controller
{
   	public function __construct()
	{
		$this->middleware('auth');
	}

	public function viewContactsList($id)
	{
		$phone = Phone::find($id);

		return view('otherContacts.index')
			->with('otheContacts', OtherContact::all());
	}

	public function viewCreateContact()
	{
		return view('otherContacts.create');
	}

	public function contactStore($id)
	{
		$phone = Phone::find($id);
		
	}

	public function deleteContact()
	{
		
	}

	public function viewEditContact()
	{
		
	}

	public function contactUpdate()
	{
		
	}

}
