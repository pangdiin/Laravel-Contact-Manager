<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;
use App\Group;

class ContactsController extends Controller
{
	public function index(Request $request)
	{
		if ($group_id = $request->get('group_id')) {
			$contacts = Contact::where('group_id', $group_id)->orderBy('id','desc')->paginate(5);
		} else {
			$contacts = Contact::orderBy('id','desc')->paginate(5);
		}

		return view('contacts.index',[
			'contacts' => $contacts
		]);
	}

	public function getGroups()
	{
		$groups = [];

		foreach (Group::all() as $group)
		{
			$groups[$group->id] = $group->name;
		}

		return $groups;
	}

	public function create()
	{
		$groups = $this->getGroups();

		return view('contacts.create',compact('groups'));
	}

	public function store(Request $request)
	{
		$this->validate($request,[
				'name'=>'required|min:5',
				'email'=>'required|email',
				'company'=>'required'
			]);

		Contact::create( $request->all() );

		return redirect()->route('contacts.index')->with('message','Contact save!');
	}

	public function edit($id)
	{
		$groups = $this->getGroups();

		$contact = Contact::find($id);

		return view('contacts.edit',compact('groups','contact'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request,[
				'name'=>'required|min:5',
				'email'=>'required|email',
				'company'=>'required'
			]);

		$contact = Contact::find($id);

		$contact->update($request->all());

		return redirect()->route('contacts.index')->with('message','Contact Updated');	
	}

	public function destroy($id)
	{
		$contact = Contact::find($id);
		$contact->delete();

		return redirect()->route('contacts.index')->with('message','Contact Deleted!');
	}
}
