<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Group;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function viewGroupsList()
	{
		return view('groups.index')
			->with('groups', Group::all());
	}

	public function viewCreateGroup()
	{
		return view('groups.create');
	}

	public function groupStore(Request $request)
	{
		$this->validate($request,[
				'name'  => 'required|Unique:groups',
				
			]);

		$group = Auth::user()->group()->create([

			'user_id'=> Auth::user()->id,
			'name'=> Input::get('name'),
		]);


		 return redirect('/groups');
	}

	public function deleteGroup($id)
	{
		$currentGroup = Group::findOrfail($id);
		$this->authorize('deleteGroup',$currentGroup);
    	$currentGroup->delete();	
    	return redirect()->back();
	}

	public function viewEditGroup($id)
	{
		$group = Group::find($id);
		$this->authorize('viewEditGroup',$group);

        return view('groups.edit')
            ->with('group',$group);
	}

	public function groupUpdate($id,Request $request)
	{

		$this->validate($request,[
				'name'  => 'required',
				
			]);
		 $group = Group::where('id',$id)->update([
                'name'=> Input::get('name'),
            ]);
        
         return redirect('/groups');
	}

}
