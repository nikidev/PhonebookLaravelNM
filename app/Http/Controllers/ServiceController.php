<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Service;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
    	$this->middleware('isAdmin');
    }

    public function viewServicesList()
    {
    	return view ('services.index')
    		->with('services', Service::all());
    }


    public function viewCreateService()
	{
		return view('services.create');
	}

	public function serviceStore()
	{
		$service = Auth::user()->service()->create([

			'user_id'=> Auth::user()->id,
			'name'=> Input::get('name'),
		]);


		 return redirect('/services');
	}

	public function deleteService($id)
	{
		$currentService = Service::findOrfail($id);
    	$currentService->delete();	
    	return redirect()->back();
	}

	public function viewEditService($id)
	{
		$service = Service::find($id);
		

        return view('services.edit')
            ->with('service',$service);
	}

	public function serviceUpdate($id)
	{
		 $service = Service::where('id',$id)->update([
                'name'=> Input::get('name'),
            ]);
        
         return redirect('/services');
	}
}
